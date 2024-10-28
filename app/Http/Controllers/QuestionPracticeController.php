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
        dd($request);
        $data = $request->validate([
            'question' => 'nullable|string',
            'corect_answer' => 'required|string',
            'explanation' => 'required|string',
            'class_bimbel_id' => 'required|exists:class_bimbels,id',
            'image' => 'nullable|image|max:2048',
        ]);
        
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('assets', 'public');
            $data['image'] = $image;
        } else {
            return redirect()->back()->with('error', 'File gambar tidak ditemukan');
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
                return redirect($request->input('back'))->with('success', 'Tryout berhasil ditambahkan.');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QuestionPractice $questionPractice)
    {
        //
    }
}
