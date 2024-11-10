<?php

namespace App\Exports;

use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class QuestionExport implements FromCollection, WithHeadings, WithMapping
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return $this->data;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Tryout',
            'Mapel',
            'image',
            'Question',
            'Jawaban A',
            'Jawaban B',
            'Jawaban C',
            'Jawaban D',
            'Jawaban E',
            'Jawaban Benar',
            'Penjelasan',
            'Created At',
            'Updated At',
        ];
    }

    public function map($question): array
    {
        Log::info('Exporting question: ', [$question]); // Log data question
        return [
            $question->id ?? 'N/A',
            $question->tryout->name ?? 'N/A',
            $question->sub_categories->name ?? 'N/A',
            $question->image ?? 'N/A',
            $question->question ?? 'N/A',
            $question->answer->a ?? 'N/A',
            $question->answer->b ?? 'N/A',
            $question->answer->c ?? 'N/A',
            $question->answer->d ?? 'N/A',
            $question->answer->e ?? 'N/A',
            $question->corect_answer ?? 'N/A',
            $question->explanation ?? 'N/A',
            $question->created_at->format('j F Y H:i:s') ?? 'N/A',
            $question->updated_at->format('j F Y H:i:s') ?? 'N/A',
        ];
    }
}
