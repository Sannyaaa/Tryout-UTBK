<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\sub_categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class CombinedCategoriesController extends Controller
{
    public function index()
    {
        try {
            $categories = Category::with('sub_categories')->get();
            return view('admin.combined-categories.index', compact('categories'));
        } catch (\Exception $e) {
            Log::error('Error in index method: ' . $e->getMessage());
            return back()->with('error', 'An error occurred while loading the page.');
        }
    }

    public function edit($id, Request $request)
    {
        try {
            $type = $request->query('type', 'category');
            
            if ($type === 'category') {
                $item = Category::findOrFail($id);
            } else {
                $item = sub_categories::findOrFail($id);
            }

            $categories = Category::all();
            
            return view('admin.combined-categories.edit', compact('item', 'type', 'categories'));
        } catch (\Exception $e) {
            Log::error('Error in edit method: ' . $e->getMessage());
            return back()->with('error', 'An error occurred while loading the edit form.');
        }
    }

    // public function update(Request $request, $id)
    // {
    //     $data = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'description' => 'required|string',
    //         'parent_category' => 'nullable|exists:categories,id'
    //     ]);

    //     try {
    //         $item = sub_categories::findOrFail($id);

    //         $item->name = $data['name'];
    //         $item->description = $data['description'];
    //         $item->categories_id = $data['parent_category'];
    //         $item->save();

    //         return redirect()->route('admin.combined-categories.index')
    //             ->with('success', 'Subcategory updated successfully');
    //     } catch (\Exception $e) {
    //         Log::error('Error updating item: ' . $e->getMessage());
    //         return back()->with('error', 'An error occurred while updating the item.');
    //     }
    // }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'parent_category' => 'nullable|exists:categories,id'
        ]);

        try {
            if ($data['parent_category']) {
                // Create sub-category
                sub_categories::create([
                    'name' => $data['name'],
                    'description' => $data['description'],
                    'categories_id' => $data['parent_category']
                ]);
            } else {
                // Create category
                Category::create([
                    'name' => $data['name'],
                    'description' => $data['description']
                ]);
            }

            return redirect()->route('admin.combined-categories.index')
                ->with('success', 'Item created successfully');
        } catch (\Exception $e) {
            Log::error('Error creating item: ' . $e->getMessage());
            return back()->with('error', $e->getMessage());
        }
    }

    // public function update(Request $request, $id)
    // {
    //     $data = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'description' => 'required|string',
    //         'parent_category' => 'nullable|exists:categories,id',
    //         'type' => 'required|in:category,subcategory'
    //     ]);

    //     try {
    //         if ($data['type'] === 'category') {
    //             $item = Category::findOrFail($id);
    //         } else {
    //             $item = sub_categories::findOrFail($id);
    //         }

    //         $item->name = $data['name'];
    //         $item->description = $data['description'];
            
    //         if ($data['type'] === 'subcategory') {
    //             $item->categories_id = $data['parent_category'];
    //         }
            
    //         $item->save();

    //         return response()->json(['success' => true]);
    //     } catch (\Exception $e) {
    //         Log::error('Error updating item: ' . $e->getMessage());
    //         return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
    //     }
    // }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'parent_category' => 'nullable|exists:categories,id'
        ]);

        try {
            // First try to find in categories
            $item = Category::find($id);
            $isCategory = true;
            
            // If not found, try subcategories
            if (!$item) {
                $item = sub_categories::find($id);
                $isCategory = false;
            }
            
            if (!$item) {
                return back()->with('error', 'Item not found.');
            }

            // If changing from category to subcategory
            if ($isCategory && $data['parent_category']) {
                // Create new subcategory
                $newItem = sub_categories::create([
                    'name' => $data['name'],
                    'description' => $data['description'],
                    'categories_id' => $data['parent_category']
                ]);
                
                // Delete old category
                $item->delete();
            }
            // If changing from subcategory to category
            else if (!$isCategory && !$data['parent_category']) {
                // Create new category
                $newItem = Category::create([
                    'name' => $data['name'],
                    'description' => $data['description']
                ]);
                
                // Delete old subcategory
                $item->delete();
            }
            // If just updating values
            else {
                $item->name = $data['name'];
                $item->description = $data['description'];
                if (!$isCategory) {
                    $item->categories_id = $data['parent_category'];
                }
                $item->save();
            }

            return redirect()->route('admin.combined-categories.index')
                ->with('success', 'Item updated successfully');
        } catch (\Exception $e) {
            Log::error('Error updating item: ' . $e->getMessage());
            return back()->with('error', 'An error occurred while updating the item.');
        }
    }

    public function destroy(Request $request ,$id)
    {
        try {
            $type = $request->query('type', 'category');

            if ($type === 'category') {
                $item = Category::find($id);
            } else {
                $item = sub_categories::find($id);
            }

            if (!$item) {
                return back()->with('error', 'Item not found.');
            }

            $item->delete();

            return redirect()->route('admin.combined-categories.index')
                ->with('success', ucfirst($type) . ' deleted successfully');
        } catch (\Exception $e) {
            Log::error('Error deleting item: ' . $e->getMessage());
            return back()->with('error', 'An error occurred while deleting the item.');
        }
    }
    
}
