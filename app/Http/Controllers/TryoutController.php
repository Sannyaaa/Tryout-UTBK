<?php

namespace App\Http\Controllers;

use App\Exports\DetailTryoutExport;
use App\Exports\ResultUserExport;
use App\Exports\TryoutExport;
use App\Exports\UserAnswerExport;
use App\Livewire\User\Tryouts;
use App\Models\Answer;
use App\Models\AnswerQuestion;
use App\Models\batch;
use App\Models\Question;
use App\Models\Result;
use App\Models\sub_categories;
use App\Models\tryout;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;

use function Pest\Laravel\get;

class TryoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                $query = tryout::query();
                
               // Check if a filter is applied
                if ($request->has('is_free') && $request->is_free != '') {
                    $query->where('is_free', $request->is_free);
                }

                if ($request->has('is_together') && $request->is_together != '') {
                    $query->where('is_together', $request->is_together);
                }

                return DataTables::of($query)
                    ->addIndexColumn()
                    ->addColumn('checkbox', function($tryout) {
                        return '<input type="checkbox" class="tryout-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" value="' . $tryout->id . '">';
                    })
                    ->addColumn('created_at', function($tryout) {
                        return date('j F Y', strtotime($tryout->created_at));
                    })
                    // ->addColumn('image', function ($tryout) {
                    //     return asset('storage/' . $tryout->image);
                    // })
                    ->addColumn('action', function ($tryout) {
                        $editBtn = '<a href="' . route('admin.tryout.edit', $tryout->id) . '" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-gradient-to-tr from-sky-400 to-sky-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Update
                        </a>';

                        $showBtn = '<a href="' . route('admin.tryout.show', $tryout->id) . '" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg  bg-gradient-to-tr from-emerald-400 to-emerald-500 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Show
                        </a>';
                        
                        $deleteBtn = '<form action="' . route('admin.tryout.destroy', $tryout->id) . '" method="POST" class="inline-block">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white  bg-gradient-to-tr from-rose-400 to-rose-500 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                Delete
                            </button>
                        </form>';
                        
                        $action = '<div class="flex items-center gap-2">
                            ' 
                             . $showBtn 
                            .
                              $editBtn . $deleteBtn .
                            '
                        </div>';
                        
                        return $action;
                    })
                    ->rawColumns(['action', 'image', 'checkbox'])
                    ->make(true);
            }

            // Ekspor ke Excel
            if ($request->has('export_excel')) {
                $data = tryout::all(); // Ambil data
                return Excel::download(new TryoutExport($data), 'tryout_data.xlsx');
            }

            // Ekspor ke PDF
            if ($request->has('export_pdf')) {
                $data = tryout::all(); // Ambil data
                $pdf = Pdf::loadView('admin.tryout.pdf', compact('data'));
                return $pdf->download('tryout_data.pdf');
            }

            $tryout = tryout::all(); //
            return view('admin.tryout.index', compact('tryout'));
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

            Tryout::whereIn('id', $ids)->delete();

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
        return view('admin.tryout.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if($request->is_together == 'together'){
            $request['is_free'] = 'paid';
        }

        // dd($request);

        $data = $request->validate([
            'name' => 'nullable|max:255',
            'description' => 'nullable|string',
            'start_date' => 'nullable|string',
            'end_date' => 'nullable|string',
            'is_free' => ['required', 'in:paid,free'],
            'is_together' => ['required', 'in:basic,together'],
        ]);

        try{
            $tryout = Tryout::create($data);

            Log::info("berhasil");
            return redirect()->route('admin.tryout.index')->with('success', 'Tryout created successfully.');
        } catch (\Exception $e) {
            Log::error('Error in create tryout: ' . $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(tryout $tryout)
    {
        $question = Question::where('tryout_id', $tryout->id)->get();
        $tryout = tryout::with(['question.sub_categories'])->withCount(['question as total_question'])->findOrFail($tryout->id);

        $subCategories = sub_categories::withCount(['question as question_count' => function ($query) use ($tryout) {
                $query->where('tryout_id', $tryout->id);
            }])->withCount(['results as total_participants' => function ($query) use ($tryout) {
                $query->where('tryout_id', $tryout->id);
            }])->get();



        return view('admin.tryout.show', compact('tryout','question','subCategories'));
    }

    public function subCategory(Request $request, tryout $tryout, sub_categories $sub_categories)
    {
        if ($request->has('export_excel')) {
            try {
                return Excel::download(
                    new DetailTryoutExport($tryout, $sub_categories), 
                    'tryout_' . $tryout->name . '_' . $sub_categories->name . '_report.xlsx'
                );
            } catch (\Exception $e) {
                Log::error('Error in export: ' . $e->getMessage());
                return back()->with('error', 'An error occurred while exporting the data.');
            }
        }

        $questions = Question::where('tryout_id', $tryout->id)
            ->where('sub_categories_id', $sub_categories->id)
            ->orderByDesc('created_at')
            ->get();

        $results = Result::with(['user','answer_question'])
            ->where('tryout_id', $tryout->id)
            ->where('sub_category_id', $sub_categories->id)
            ->get();

        return view('admin.tryout.sub-category', compact('questions','tryout','results', 'sub_categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tryout $tryout)
    {

        return view('admin.tryout.edit', compact( 'tryout'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        $tryout = tryout::findOrFail($id);

        $data = $request->validate([
            'name' => 'nullable|max:255',
            'description' => 'nullable|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'is_ready' => ['required', 'in:yes,no'],
            'is_free' => ['required', 'in:paid,free'],
            'is_together' => ['required', 'in:basic,together'],
        ]);

        try{
            $tryout->update($data);
            Log::info("berhasil");
            return redirect()->route('admin.tryout.index')->with('success', 'Tryout Update successfully.');
        } catch (\Exception $e) {
            Log::error('Error in update tryout: ' . $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tryout $tryout)
    {
        try{
            $tryout->delete();
            Log::info("berhasil");
            return redirect()->route('admin.tryout.index')->with('success', 'Tryout deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error in delete tryout: '. $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function question_create(Tryout $tryout){
        $sub_categories = sub_categories::all();
        return view('admin.tryout.show_question_create', compact('tryout', 'sub_categories'));
    }

    public function question_store(Request $request, Tryout $tryout)
    {
        // question
        $data = $request->validate([
            'sub_categories_id' => 'required|exists:sub_categories,id',
            'question' => 'nullable|string',
            'correct_answer' => 'required|string',
            'explanation' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $data['tryout_id'] = $tryout->id;

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('assets', 'public');
            $data['image'] = $image;
        }


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

            Answer::create($answer);

            Log::info("berhasil");
            return redirect()->route('admin.tryout.show', $tryout->id )->with('success', 'question created successfully.');
        } catch (\Exception $e) {
            Log::error('Error in create question: ' . $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function question_edit(Tryout $tryout)
    {
        // Ambil pertanyaan berdasarkan tryout_id dan pastikan relasi answer di-load
        $question = Question::with('answer')->where('tryout_id', $tryout->id)->first();

        // Pastikan bahwa question dan relasi answer ada
        if (!$question) {
            return redirect()->back()->with('error', 'Question not found.');
        }

        $sub_categories = sub_categories::all();
        $answer = $question->answer; // Ambil jawaban yang terkait dengan pertanyaan

        return view('admin.tryout.show_question_edit', compact('tryout', 'sub_categories', 'question', 'answer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function question_update(Request $request, Tryout $tryout, Question $question)
    {
        // Pastikan pertanyaan tersebut terkait dengan tryout yang benar
        if ($question->tryout_id !== $tryout->id) {
            return redirect()->back()->with('error', 'Invalid question for the selected tryout.');
        }

        // Validasi data pertanyaan
        $data = $request->validate([
            'sub_categories_id' => 'required|exists:sub_categories,id',
            'question' => 'nullable|string',
            'correct_answer' => 'required|string',
            'explanation' => 'required|string',
        ]);

        $data['tryout_id'] = $tryout->id;

        // Jika ada file gambar, simpan
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('assets', 'public');
            $data['image'] = $image;
        }

        try {
            // Update data pertanyaan
            $question->update($data);

            // Validasi input untuk jawaban
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
                $answer->question_id = $question->id;
            }

            // Update data jawaban
            $answer->a = $request->input('a');
            $answer->b = $request->input('b');
            $answer->c = $request->input('c');
            $answer->d = $request->input('d');
            $answer->e = $request->input('e');
            
            // Simpan jawaban ke database
            $answer->save();

            return redirect()->route('admin.tryout.show', $tryout->id)->with('success', 'Question and answers updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error in update question: ' . $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

     public function question_destroy(Tryout $tryout, Question $question)
    {
        try {
            $question->delete();
            Log::info("berhasil");
            return redirect()->route('admin.tryout.show', $tryout->id)->with('success', 'Question deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error in delete question: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while deleting the question.');
        }
    }

    public function result(tryout $tryout, sub_categories $sub_categories, Result $result, Request $request, User $user)
    {

        if ($request->has('export_excel')) {
            try {
                return Excel::download(
                    new UserAnswerExport($tryout, $sub_categories, $user, $result), 
                    'detail_User_dan_Jawaban_' . $user->name . '_' . $sub_categories->name . '.xlsx'
                );
            } catch (\Exception $e) {
                Log::error('Error in export: ' . $e->getMessage());
                return back()->with('error', 'An error occurred while exporting the data.');
            }
        }

        $results = AnswerQuestion::with(['question','result'])->where('result_id', $result->id)->get();

        return view('admin.tryout.result', compact('tryout','sub_categories','result','results'));
    }


    
}
