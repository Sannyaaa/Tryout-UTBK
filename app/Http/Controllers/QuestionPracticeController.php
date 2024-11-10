<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnswerPractice;
use App\Models\QuestionPractice;
use Illuminate\Support\Facades\Log;

class QuestionPracticeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // question
        // dd($request);
        
        $data = $request->validate([
            'question' => 'required|string',
            'correct_answer' => 'required|string',
            'explanation' => 'required|string',
            'class_bimbel_id' => 'required|exists:class_bimbels,id',
            'image' => 'nullable|image|max:2048',
        ]);
        
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('assets', 'public');
            $data['image'] = $image;
        }

        try{
            $question = QuestionPractice::create($data);

            // answer
            $answer = $request->validate([
                'a' => 'required|string',
                'b' => 'required|string',
                'c' => 'required|string',
                'd' => 'required|string',
                'e' => 'required|string',
            ]);

            $answer['question_practice_id'] = $question->id;

            AnswerPractice::create($answer);

            if($request->input('back')){
                return redirect()->route('admin.class-bimbel.show', $request->input('back'))->with('success', 'Tryout berhasil ditambahkan.');
            }

            Log::info("berhasil");
            return redirect()->route('admin.question.index')->with('success', 'question created successfully.');
        } catch (\Exception $e) {
            Log::error('Error in create question: ' . $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(QuestionPractice $questionPractice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(QuestionPractice $questionPractice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, QuestionPractice $questionPractice)
    {
        // Validasi data pertanyaan
        $data = $request->validate([
            'question' => 'required|string',
            'correct_answer' => 'required|string',
            'explanation' => 'required|string',
            'class_bimbel_id' => 'required|exists:class_bimbels,id',
            'image' => 'nullable|image|max:2048',
        ]);

        // Jika ada file gambar, simpan
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('assets', 'public');
            $data['image'] = $image;
        }

        try {
            // Update data pertanyaan
            $questionPractice->update($data);

            // Validasi input
            $request->validate([
                'a' => 'required|string|max:255',
                'b' => 'required|string|max:255',
                'c' => 'required|string|max:255',
                'd' => 'required|string|max:255',
                'e' => 'required|string|max:255',
            ]);

            // Ambil jawaban yang terkait dengan pertanyaan
            $answer = AnswerPractice::where('question_practice_id', $questionPractice->id)->first();

            // dd($questionPractice);

            // Jika jawaban belum ada, buat jawaban baru
            if (!$answer) {
                $answer = new AnswerPractice();
                $answer->question_id = $questionPractice->id; // Set id pertanyaan
            }

            // Update data jawaban
            $answer->a = $request->input('a');
            $answer->b = $request->input('b');
            $answer->c = $request->input('c');
            $answer->d = $request->input('d');
            $answer->e = $request->input('e');
            
            // Simpan jawaban ke database
            $answer->save();

            if($request->input('back')){
                return redirect( $request->input('back'))->with('success', 'Tryout berhasil ditambahkan.');
            }

            return redirect()->route('admin.question.index')->with('success', 'Question and answers updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error in update question: ' . $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, QuestionPractice $questionPractice)
    {
        //
        try {
            $questionPractice->delete();
            AnswerPractice::where('question_practice_id', $questionPractice->id)->delete();

            if($request->input('back')){
                return redirect( $request->input('back'))->with('success', 'Question and answers deleted successfully.');
            }

            return redirect()->route('admin.question.index')->with('success', 'Question and answers deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error in delete question: '. $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
