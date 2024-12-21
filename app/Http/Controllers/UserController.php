<?php

namespace App\Http\Controllers;

use App\Exports\ResultUserExport;
use App\Models\Result;
use App\Models\sub_categories;
use App\Models\Tryout;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //

        try {
            if ($request->ajax()) {
                $query = User::query();
                
                if ($request->has('role') && $request->role != '') {
                    $query->where('role', $request->role);
                }

                return DataTables::of($query)
                    ->addIndexColumn()
                    ->addColumn('checkbox', function($user) {
                        return '<input type="checkbox" class="user-checkbox w-4 h-4 text-sky-500 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" value="' . $user->id . '">';
                    })
                    ->editColumn('created_at', function($class) {
                        return date('j F Y', strtotime($class->created_at));
                    })
                    ->addColumn('action', function ($user) {
                        $editBtn = '<a href="' . route('admin.user.edit', $user->id) . '" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg  bg-gradient-to-tr from-sky-400 to-sky-500 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Update
                        </a>';
                        
                        $deleteBtn = '<form action="' . route('admin.user.destroy', $user->id) . '" method="POST" class="inline-block ml-2">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-gradient-to-tr from-rose-400 to-rose-500 rounded-lg focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                Delete
                            </button>
                        </form>';
                        
                        return $editBtn . $deleteBtn;
                    })
                    ->rawColumns(['action', 'created_at', 'checkbox', 'created_at'])
                    ->make(true);
            }

            return view('admin.user.index');
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

            User::whereIn('id', $ids)->delete();

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

        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'numeric|nullable',
            'role' => 'required|in:admin,mentor,user',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'role' => $data['role'],
            'password' => Hash::make($data['password']),
        ]);

        if($data['role'] == 'admin'){
            $user->assignRole('admin');
        }elseif($data['role'] == 'mentor'){
            $user->assignRole('mentor');
        }

        $user->markEmailAsVerified();

        return redirect()->route('admin.user.index')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user, Request $request, Tryout $tryout, sub_categories $sub_categories )
    {
        if ($request->has('export_excel')) {
            try {
                return Excel::download(
                    new ResultUserExport($tryout, $sub_categories, $user), 
                    'detail_hasil_tryout_' . $tryout->name . '_' . $sub_categories->name . '.xlsx'
                );
            } catch (\Exception $e) {
                Log::error('Error in export: ' . $e->getMessage());
                return back()->with('error', 'An error occurred while exporting the data.');
            }
        }

        $results = Result::where('user_id', $user->id)->get();

        return view('admin.user.edit', compact('user','results'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'. $user->id,
            'phone' => 'numeric|nullable',
            'role' => 'required|in:admin,mentor,user',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if ($data['password']) {
            $user->password = Hash::make($data['password']);
        }

        if($data['role'] == 'admin'){
            $user->assignRole('admin');
        }elseif($data['role'] == 'mentor'){
            $user->assignRole('mentor');
        }

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->role = $data['role'];
        $user->save();

        return redirect()->route('admin.user.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //

        $user->delete();

        return redirect()->route('admin.user.index')->with('success', 'User deleted successfully.');
    }
}
