<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnswerPractice;
use App\Models\ClassBimbel;
use App\Models\Question;
use App\Models\QuestionPractice;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Log;

class QuestionPracticeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                $query = QuestionPractice::with('class_bimbel')->get();

                return DataTables::of($query)
                    ->addIndexColumn()
                    ->addColumn('checkbox', function($question) {
                        return '<input type="checkbox" class="question-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" value="' . $question->id . '">';
                    })
                    ->addColumn('created_at', function($class) {
                        return date('j F Y', strtotime($class->created_at));
                    })
                    ->addColumn('action', function ($question) {
                        $editBtn = '<a href="' . route('admin.question-practice.edit', $question->id) . '" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg  bg-gradient-to-tr from-sky-400 to-sky-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Update
                        </a>';
                        
                        $deleteBtn = '<form action="' . route('admin.question-practice.destroy', $question->id) . '" method="POST" class="inline-block ml-2">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white  bg-gradient-to-tr from-rose-400 to-rose-500 rounded-lg hover:bg-red-600 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                Delete
                            </button>
                        </form>';
                        
                        return $editBtn . $deleteBtn;
                    })
                    ->rawColumns(['action', 'checkbox', 'created_at'])
                    ->make(true);
            }

            return view('admin.question-practice.index');
        } catch (\Exception $e) {
            Log::error('Error in index method: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());

            if ($request->ajax()) {
                return response()->json(['error' => 'An error occurred while processing your request.'], 500);
            }
            return back()->with('error', 'An error occurred while loading the page. Please try again.');
        }
    }

    public function bulkDelete(Request $request)
    {
        try {
            $ids = $request->ids;
            
            if (!is_array($ids)) {
                return response()->json([
                    'success' => false,
                    'message' => 'No items selected'
                ], 400);
            }

            Question::whereIn('id', $ids)->delete();

            return response()->json([
                'success' => true,
                'message' => 'Selected items have been deleted'
            ]);

        } catch (\Exception $e) {
            Log::error('Error in bulk delete: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error deleting selected items'
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $classes = ClassBimbel::all();

        $back = null;

        if(Gate::allows('admin')){
            return view('admin.question-practice.create',compact('classes', 'back'));
        }elseif(Gate::allows('mentor')){
            return view('mentor.question-practice.create',compact('classes'));
        }
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

            if(Gate::allows('admin')){
                if($request->input('back')){
                    return redirect()->route('admin.class-bimbel.show', $request->input('back'))->with('success', 'Pertanyaan berhasil ditambahkan.');
                }

                Log::info("berhasil");
                return redirect()->route('admin.question-practice.index')->with('success', 'Pertanyaan berhasil ditambahkan');
            
            }elseif(Gate::allows('mentor')){
                if($request->input('back')){
                    return redirect()->route('mentor.class-bimbel.show', $request->input('back'))->with('success', 'Pertanyaan berhasil ditambahkan.');
                }

                Log::info("berhasil");
                return redirect()->route('mentor.question-practice.index')->with('success', 'Pertanyaan berhasil ditambahkan.');
            }

            
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

        $classes = ClassBimbel::all();

        $question = $questionPractice;

        $back = null;
        
        // Pastikan bahwa question dan relasi answers ada
        if (!$question) {
            return redirect()->back()->with('error', 'Pertanyaan tidak ditemukan.');
        }
        $answer = AnswerPractice::where('question_practice_id', $question->id)->first(); // Ambil jawaban yang terkait dengan pertanyaan
        // dd($answer);

        if(Gate::allows('admin')){
            return view('admin.question-practice.edit', compact('question', 'back', 'answer', 'classes'));
        } elseif(Gate::allows('mentor')){
            return view('mentor.question-practice.edit', compact('questionPractice', 'classes'));
        }
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

            if(Gate::allows('admin')){
                if($request->input('back')){
                    return redirect()->route('admin.class-bimbel.show', $request->input('back'))->with('success', 'Pertanyaan Behasil diubah');
                }

                Log::info("berhasil");
                return redirect()->route('admin.question-practice.index')->with('success', 'Pertanyaan berhasil diubah.');
            
            }elseif(Gate::allows('mentor')){
                if($request->input('back')){
                    return redirect()->route('mentor.class-bimbel.show', $request->input('back'))->with('success', 'Pertanyaan Behasil diubah');
                }

                Log::info("berhasil");
                return redirect()->route('mentor.question-practice.index')->with('success', 'Pertanyaan berhasil diubah.');
            }

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
                return redirect( $request->input('back'))->with('success', 'Berhasil menghapus pertanyaan.');
            }

            return redirect()->route('admin.question.index')->with('success', 'Berhasil menghapus pertanyaan.');
        } catch (\Exception $e) {
            Log::error('Error in delete question: '. $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
