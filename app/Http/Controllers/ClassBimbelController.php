<?php

namespace App\Http\Controllers;

use App\Models\AnswerPractice;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Bimbel;
use App\Models\ClassBimbel;
use App\Models\QuestionPractice;
use Illuminate\Http\Request;
use App\Models\sub_categories;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Log;

class ClassBimbelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //

        try {
            if ($request->ajax()) {
                $query = ClassBimbel::with(['bimbel','user','sub_categories'])->orderBy('created_at', 'desc');
                
                return DataTables::of($query)
                    ->addIndexColumn()
                    ->addColumn('checkbox', function($class) {
                        return '<input type="checkbox" class="class-bimbel-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" value="' . $class->id . '">';
                    })
                    ->addColumn('date', function($class) {
                        return date('j F Y', strtotime($class->date)) .' '. date('h:i A', strtotime($class->start_time));
                    })
                    ->addColumn('action', function ($class) {
                        $showBtn = '<a href="' . route('admin.class-bimbel.show', $class->id) . '" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg  bg-gradient-to-tr from-emerald-400 to-emerald-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            
                            Show
                        </a>';

                        $editBtn = '<a href="' . route('admin.class-bimbel.edit', $class->id) . '" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg  bg-gradient-to-tr from-sky-400 to-sky-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Update
                        </a>';
                        
                        $deleteBtn = '<form action="' . route('admin.class-bimbel.destroy', $class->id) . '" method="POST" class="inline-block">
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
                    ->rawColumns(['action', 'date', 'checkbox'])
                    ->make(true);
            }

            return view('admin.class-bimbel.index');
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

            ClassBimbel::whereIn('id', $ids)->delete();

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
        $bimbels = Bimbel::all();

        $users = User::all();

        $subCategories = sub_categories::all();

        return view('admin.class-bimbel.create', compact('bimbels', 'users','subCategories'));
    }

    public function question_create(ClassBimbel $classBimbel)
    {
        //
        $back = $classBimbel->id;

        $classes = ClassBimbel::all();

        return view('admin.question-practice.create', compact('classBimbel','back','classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request);

        $request->validate([
            'name' => 'required|string',
            'bimbel_id' => 'required|exists:bimbels,id',
            'sub_categories_id' => 'required|exists:sub_categories,id',
            'user_id' => 'required|exists:users,id',
            'date' => 'date|nullable',
            'start_time' => 'nullable',
            'start_time_second' => 'nullable',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'days_of_week' => 'nullable|array',
        ]);

        $bimbelId = $request->input('bimbel_id');
        $subCategoriesId = $request->input('sub_categories_id');
        $userId = $request->input('user_id');
        $name = $request->input('name');
        $startTime = $request->input('start_time') ?? $request->input('start_time_second');
        
        if ($request->input('date')) {

            $date = Carbon::parse($request->input('date'));

            ClassBimbel::create([
                'bimbel_id' => $bimbelId,
                'sub_categories_id' => $subCategoriesId,
                'user_id' => $userId,
                'name' => $name,
                'start_time' => $startTime,
                'date' => $date,
            ]);
            
        }else {
            $startDate = Carbon::parse($request->input('start_date'));
            $endDate = Carbon::parse($request->input('end_date'));
            $daysOfWeek = $request->input('days_of_week'); // array [1 => 'Senin', 2 => 'Selasa', ...]

            // Loop through the date range
            $dates = [];
            while ($startDate->lte($endDate)) {
                // Check if the current day is in the selected days of the week
                if (in_array($startDate->dayOfWeek, $daysOfWeek)) {
                    $dates[] = $startDate->format('Y-m-d'); // Store the date
                }
                $startDate->addDay(); // Move to the next day
            }

            // Create ClassBimbel entries for each valid date
            foreach ($dates as $date) {
                ClassBimbel::create([
                    'bimbel_id' => $bimbelId,
                    'sub_categories_id' => $subCategoriesId,
                    'user_id' => $userId,
                    'name' => $name,
                    'start_time' => $startTime,
                    'date' => $date,
                ]);
            }
        }

        if($request->input('back')){
            return redirect($request->input('back'))->with('success', 'Tryout berhasil ditambahkan.');
        }

        return redirect()->route('admin.class-bimbel.index')->with('success', 'Tryout berhasil ditambahkan.');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(ClassBimbel $classBimbel)
    {
        //

        $questions = QuestionPractice::where('class_bimbel_id',$classBimbel->id)->get();

        return view('admin.class-bimbel.show', compact('classBimbel','questions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClassBimbel $classBimbel)
    {
        //

        $bimbels = Bimbel::all();

        $users = User::all();

        $subCategories = sub_categories::all();

        return view('admin.class-bimbel.edit', compact( 'classBimbel', 'bimbels', 'users','subCategories'));
    }

    public function question_edit(ClassBimbel $classBimbel, QuestionPractice $question)
    {
        //
        $back = route('admin.class-bimbel.show',$classBimbel->id);

        $classes = ClassBimbel::all();

        // Pastikan bahwa question dan relasi answers ada
        if (!$question) {
            return redirect()->back()->with('error', 'Question not found.');
        }
        $answer = AnswerPractice::where('question_practice_id', $question->id)->first(); // Ambil jawaban yang terkait dengan pertanyaan
        // dd($answer);

        return view('admin.question-practice.edit', compact('classBimbel','back','classes','question','answer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClassBimbel $classBimbel)
    {
        //

        $data = $request->validate([
            'name' => 'required|string',
            'bimbel_id' => 'required|exists:bimbels,id',
            'sub_categories_id' => 'required|exists:sub_categories,id',
            'user_id' => 'required|exists:users,id',
            'date' => 'required|date',
            'start_time' => 'required',
            'link_zoom' => 'nullable',
            'link_video' => 'nullable',
            'materi' => 'nullable',
        ]);

        $classBimbel->update($data);

        if($request->input('back')){
            return redirect($request->input('back'))->with('success', 'Tryout berhasil ditambahkan.');
        }

        return redirect()->route('admin.class-bimbel.index')->with('success', 'Tryout berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClassBimbel $classBimbel)
    {
        //
        $classBimbel->delete();

        return redirect()->route('admin.class-bimbel.index')->with('success', 'Tryout berhasil dihapus.');
    }
}
