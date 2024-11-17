<?php

namespace App\Exports;

use App\Models\Question;
use App\Models\Result;
use App\Models\tryout;
use App\Models\sub_categories;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;
use Illuminate\Support\Collection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class DetailTryoutExport implements FromCollection, WithHeadings, ShouldAutoSize, WithTitle
{
    protected $tryout;
    protected $sub_categories;

    public function __construct(tryout $tryout, sub_categories $sub_categories)
    {
        $this->tryout = $tryout;
        $this->sub_categories = $sub_categories;
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

        // Tryout Summary
        $participantCount = Result::where('tryout_id', $this->tryout->id)
            ->where('sub_category_id', $this->sub_categories->id)
            ->count();

        $question_count = Question::where('tryout_id', $this->tryout->id)
            ->where('sub_categories_id', $this->sub_categories->id)
            ->count();
        
        $data->push(['']);
        $data->push(['TOTAL QUESTION DAN PESERTA']);
        $data->push([
            'Tryout Name',
            'Sub Category',
            'Total Questions',
            'Total Peserta',
        ]);
        $data->push([
            'Tryout Name' => $this->tryout->name,
            'Sub Category' => $this->sub_categories->name,
            'Total Questions' => $question_count,
            'Total Participants' => $participantCount,
        ]);

        $data->push(['']);
        $data->push(['']);
        $data->push(['DETAIL QUESTION']);

        // Questions
        $questions = Question::with(['answer'])
            ->where('tryout_id', $this->tryout->id)
            ->where('sub_categories_id', $this->sub_categories->id)
            ->get();

        $data->push([
            'Sub Category',
            'Question',
            'Option A',
            'Option B',
            'Option C',
            'Option D',
            'Option E',
            'Correct Answer',
            'Explanation',
        ]);

        foreach ($questions as $question) {
            $explanation = strip_tags($question->explanation); // Menghapus HTML dan menambahkan break line
            $question_decription = strip_tags($question->question); // Menghapus HTML dan menambahkan break line

            $data->push([
                $this->sub_categories->name,
                $question_decription,
                $question->answer->a ?? '',
                $question->answer->b ?? '',
                $question->answer->c ?? '',
                $question->answer->d ?? '',
                $question->answer->e ?? '',
                $question->correct_answer,
                $explanation,
            ]);
        }

        $data->push(['']);
        $data->push(['']);
        $data->push(['RESULT']);

        // Participant Results
        $data->push([
            'Participant Name',
            'Sub Category',
            'Correct Answers',
            'Incorrect Answers',
            'Score',
            'Completed At',
        ]);

        $results = Result::with(['user', 'sub_category'])
            ->where('tryout_id', $this->tryout->id)
            ->where('sub_category_id', $this->sub_categories->id)
            ->get();

        foreach ($results as $result) {
            $data->push([
                $result->user->name,
                $result->sub_category->name,
                $result->correct_answer,
                $result->incorrect_answers,
                $result->score,
                $result->created_at->format('Y-m-d H:i:s'),
            ]);
        }

        return $data;
    }

    public function headings(): array
    {
        return [
            'INFOMASI TRYOUT',
        ];
    }

    public function title(): string
    {
        return 'Tryout Report - ' . $this->tryout->name . ' - ' . $this->sub_categories->name;
    }
}