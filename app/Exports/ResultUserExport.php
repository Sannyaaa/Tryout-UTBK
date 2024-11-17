<?php

namespace App\Exports;

use App\Models\Question;
use App\Models\Result;
use App\Models\sub_categories;
use App\Models\Tryout;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ResultUserExport implements FromCollection, WithHeadings, ShouldAutoSize, WithTitle
{
    protected $tryout;
    protected $sub_categories;
    protected $user;

    public function __construct(Tryout $tryout, sub_categories $sub_categories, User $user)
    {
        $this->tryout = $tryout;
        $this->sub_categories = $sub_categories;
        $this->user = $user;
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

        $data->push(['']);
        $data->push(['RESULT']);


        $results = Result::with(['user','tryout', 'sub_category'])
            ->where('user_id', $this->user->id)
            ->get();

        // Participant Results
        $data->push([
            'Tryout Name',
            'Sub Category',
            'Correct Answers',
            'Incorrect Answers',
            'Score',
            'Completed At',
        ]);

        foreach ($results as $result) {
            $data->push([
                $result->tryout->name,
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
            'DETAIL HASIL TRYOUT',
        ];
    }

    public function title(): string
    {
        return 'Detail Hasil Tryout - ' . $this->tryout->name . ' - ' . $this->sub_categories->name;
    }
}
