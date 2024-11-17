<?php

namespace App\Exports;

use App\Models\AnswerQuestion;
use App\Models\Result;
use App\Models\sub_categories;
use App\Models\Tryout;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UserAnswerExport implements FromCollection
{
    protected $tryout;
    protected $sub_categories;
    protected $user;
    protected $result;

    public function __construct(Tryout $tryout, sub_categories $sub_categories, User $user, Result $result)
    {
        $this->tryout = $tryout;
        $this->sub_categories = $sub_categories;
        $this->user = $user;
        $this->result = $result;
    }

    public function styles(Worksheet $sheet)
    {
        // Mengatur seluruh sel teks menjadi tebal dan rata tengah pada sel A1
        $$sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal('center');
    }

    public function collection()
    {
        $data = new Collection();

        $results = AnswerQuestion::with(['question','result'])->where('result_id', $this->result->id)->get();


        $data->push(['']);
        $data->push(['DETAIL USER DAN TOTAL SCORE']);
        $data->push([
            'Name Peserta',
            'Email Peserta',
            'Name Tryout',
            'Materi',
            'Total Skor',
            'Jawaban Benar',
            'Jawaban Salah',
            'Tidak Dijawab',
        ]);
        $data->push([
            'Name Peserta' => $this->result->user->name,
            'Email Peserta' => $this->result->user->email,
            'Name Tryout' => $this->result->tryout->name,
            'Materi' => $this->result->sub_category->name,
            'Total Skor' => $this->result->score . ' Poin',
            'Jawaban Benar' => $this->result->correct_answers . ' Soal',
            'Jawaban Salah' => $this->result->incorrect_answers . ' Soal',
            'Tidak Dijawab' => $this->result->unanswered . ' Soal',
        ]);

        $data->push(['']);
        $data->push(['DETAIL JAWABAN']);

        // Participant Results
        $data->push([
            'Pertanyaan',
            'Jawaban',
            'Jawaban',
            'Jawaban Benar',
            'Keterangan',
            'Score',
            'Completed At',
        ]);

        foreach ($results as $result) {

            $question = strip_tags($result->question->question,);
            $isCorrect = $result->answer == $result->question->correct_answer ? 'Benar' : 'Salah';
            $score = $result->answer == $result->question->correct_answer ? '4 Poin' : '-1 Poin';

            $data->push([
                $question,
                $result->question->correct_answer,
                $result->correct_answer,
                $result->answer,
                $isCorrect,
                $score,
                $result->created_at->format('Y-m-d H:i:s'),
            ]);
        }

        return $data;
    }

    public function headings(): array
    {
        return [
            'DAFTAR HASIL JAWABAN USER',
        ];
    }

    public function title(): string
    {
        return 'Daftar Hasil Jawaban User - ' . $this->user->name . ' - ' . $this->sub_categories->name;
    }
}
