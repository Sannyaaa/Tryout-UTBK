<?php

namespace App\Http\Controllers;

use App\Exports\QuestionExport;
use App\Models\Answer;
use App\Models\Question;
use App\Models\sub_categories;
use App\Models\Tryout;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                $query = Question::with('tryout','sub_categories');
                
                if ($request->tryout) {
                    $query->where('tryout_id', $request->tryout);
                }

                if ($request->sub_categories) {
                    $query->where('sub_categories_id', $request->sub_categories);
                }

                $query = $query->get();

                return DataTables::of($query)
                    ->addIndexColumn()
                    ->addColumn('checkbox', function($question) {
                        return '<input type="checkbox" class="question-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" value="' . $question->id . '">';
                    })
                    ->addColumn('image', function ($question) {
                        return asset('storage/' . $question->image);
                    })
                    ->editColumn('created_at', function($class) {
                        return date('j F Y', strtotime($class->created_at));
                    })
                    ->addColumn('action', function ($question) {
                        $editBtn = '<a href="' . route('admin.question.edit', $question->id) . '" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg  bg-gradient-to-tr from-sky-400 to-sky-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Update
                        </a>';
                        
                        $deleteBtn = '<form action="' . route('admin.question.destroy', $question->id) . '" method="POST" class="inline-block ml-2">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white  bg-gradient-to-tr from-rose-400 to-rose-500 rounded-lg hover:bg-red-600 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                Delete
                            </button>
                        </form>';
                        
                        return $editBtn . $deleteBtn;
                    })
                    ->rawColumns(['action', 'image', 'checkbox', 'created_at'])
                    ->make(true);
            }

             // Ekspor ke Excel
            if ($request->has('export_excel')) {
                $data = Question::with(['tryout', 'answer', 'sub_categories'])->get(); // Ambil data
                return Excel::download(new QuestionExport($data), 'question_data.xlsx');
            }

            // Ekspor ke PDF
            if ($request->has('export_pdf')) {
                $data = Question::with(['tryout', 'answer', 'sub_categories'])->get(); // Ambil data
                $pdf = Pdf::loadView('admin.question.pdf', compact('data'));
                return $pdf->download('question_data.pdf');
            }


             $subCategories = sub_categories::all();
             $tryout = Tryout::all();
            return view('admin.question.index', compact('subCategories', 'tryout'));
        } catch (\Exception $e) {
            Log::error('Error in index method: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());

            if ($request->ajax()) {
                return response()->json(['error' => 'An error occurred while processing your request.'], 500);
            }
            return back()->with('error', 'An error occurred while loading the page. Please try again.');
        }
    }

    public function bulkUpdate(Request $request)
    {
        $ids = $request->input('ids');
        $tryoutId = $request->input('tryout_id');
        $subCategoryId = $request->input('sub_categories_id');

        $query = Question::whereIn('id', $ids);

        // Update tryout if provided
        if ($tryoutId) {
            $query->update(['tryout_id' => $tryoutId]);
        }

        // Update sub_category if provided
        if ($subCategoryId) {
            $query->update(['sub_categories_id' => $subCategoryId]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Selected questions updated successfully'
        ]);
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
        $sub_categories = sub_categories::all();
        $tryouts = Tryout::all();
        return view('admin.question.create', compact('tryouts','sub_categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // question
        $data = $request->validate([
            'sub_categories_id' => 'required|exists:sub_categories,id',
            'question' => 'required|string',
            'correct_answer' => 'required|string',
            'explanation' => 'required|string',
            'tryout_id' => 'required|exists:tryouts,id',
            
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('assets', 'public');
            $data['image'] = $image;
        }
        // dd($data);
        try{
            $question = Question::create($data);
            
            // answer
            $answer = $request->validate([
                'a' => 'required|string',
                'b' => 'required|string',
                'c' => 'required|string',
                'd' => 'required|string',
                'e' => 'required|string',
            ]);
            
            $answer['question_id'] = $question->id;
            
            $p = Answer::create($answer);
            // dd($p);

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
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        // Pastikan bahwa question dan relasi answers ada
        if (!$question) {
            return redirect()->back()->with('error', 'Question not found.');
        }

        $sub_categories = sub_categories::all();
        $tryouts = Tryout::all();
        $answer = $question->answer; // Ambil jawaban yang terkait dengan pertanyaan

        return view('admin.question.edit', compact('tryouts', 'sub_categories', 'question', 'answer'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $question = Question::findOrFail($id);
        
        // Validasi data pertanyaan
        $data = $request->validate([
            'sub_categories_id' => 'required|exists:sub_categories,id',
            'question' => 'nullable|string',
            'correct_answer' => 'required|string',
            'explanation' => 'required|string',
            'tryout_id' => 'required|exists:tryouts,id',
        ]);

        // Jika ada file gambar, simpan
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('assets', 'public');
            $data['image'] = $image;
        }

        try {
            // Update data pertanyaan
            $question->update($data);

            // Validasi input
            $request->validate([
                'a' => 'required|string|max:255',
                'b' => 'required|string|max:255',
                'c' => 'required|string|max:255',
                'd' => 'required|string|max:255',
                'e' => 'required|string|max:255',
            ]);

            // Ambil jawaban yang terkait dengan pertanyaan
            $answer = $question->answer;

            // Jika jawaban belum ada, buat jawaban baru
            if (!$answer) {
                $answer = new Answer();
                $answer->question_id = $question->id; // Set id pertanyaan
            }

            // Update data jawaban
            $answer->a = $request->input('a');
            $answer->b = $request->input('b');
            $answer->c = $request->input('c');
            $answer->d = $request->input('d');
            $answer->e = $request->input('e');
            
            // Simpan jawaban ke database
            $answer->save();

            return redirect()->route('admin.question.index')->with('success', 'Question and answers updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error in update question: ' . $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        try {
            $question->delete();
            Log::info("berhasil");
            return redirect()->route('admin.question.index')->with('success', 'Question deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error in delete question: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while deleting the question.');
        }
    }
}
