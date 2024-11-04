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
            $categories = Category::with('subcategories')->get();
            return view('admin.combined-categories.index', compact('categories'));
        } catch (\Exception $e) {
            Log::error('Error in index method: ' . $e->getMessage());
            return back()->with('error', 'An error occurred while loading the page.');
        }
    }

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

    public function edit($id)
    {
        try {
            // Try to find as category first
            $item = Category::find($id);
            
            // If not found as category, try as subcategory
            if (!$item) {
                $item = sub_categories::find($id);
            }

            if (!$item) {
                return back()->with('error', 'Item not found');
            }

            $categories = Category::all();
            
            return view('admin.combined-categories.edit', compact('item', 'categories'));
        } catch (\Exception $e) {
            Log::error('Error in edit method: ' . $e->getMessage());
            return back()->with('error', 'An error occurred while loading the edit form.');
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'parent_category' => 'nullable|exists:categories,id'
        ]);

        try {
            // Check if item is currently a category
            $currentCategory = Category::find($id);
            $currentSubcategory = sub_categories::find($id);
            
            // If parent_category is selected, item should be a subcategory
            if ($data['parent_category']) {
                // If it was a category before, delete it and create new subcategory
                if ($currentCategory) {
                    $currentCategory->delete();
                    sub_categories::create([
                        'name' => $data['name'],
                        'description' => $data['description'],
                        'categories_id' => $data['parent_category']
                    ]);
                } else if ($currentSubcategory) {
                    $currentSubcategory->update([
                        'name' => $data['name'],
                        'description' => $data['description'],
                        'categories_id' => $data['parent_category']
                    ]);
                }
            } else {
                // If parent_category is not selected, item should be a category
                if ($currentSubcategory) {
                    $currentSubcategory->delete();
                    Category::create([
                        'name' => $data['name'],
                        'description' => $data['description']
                    ]);
                } else if ($currentCategory) {
                    $currentCategory->update([
                        'name' => $data['name'],
                        'description' => $data['description']
                    ]);
                }
            }

            return redirect()->route('admin.combined-categories.index')
                ->with('success', 'Item updated successfully');
        } catch (\Exception $e) {
            Log::error('Error updating item: ' . $e->getMessage());
            return back()->with('error', 'An error occurred while updating the item.');
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
}
