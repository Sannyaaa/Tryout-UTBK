@extends('layouts.app')

@section('content')
<div class="p-4 mt-12">
    <div class="p-6 bg-white rounded-lg shadow">
        <div class="mb-4 flex justify-between items-center">
            <h2 class="text-xl font-semibold">Category</h2>
            
            <!-- Add New Button -->
            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" 
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                Tambah Category Baru
            </button>
        </div>

        <!-- Add Modal -->
        <div id="crud-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-lg max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <div class="flex items-center justify-between p-4 border-b">
                        <h3 class="text-lg font-semibold text-gray-900">
                            Add New Item
                        </h3>
                        <button type="button" class="text-gray-400 hover:bg-gray-200 rounded-lg text-sm p-1.5" data-modal-toggle="crud-modal">
                            <span class="sr-only">Close modal</span>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"></path></svg>
                        </button>
                    </div>
                    <form id="createForm" action="{{ route('admin.combined-categories.store') }}" method="POST" class="p-4">
                        @csrf
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                            <input type="text" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:ring-1 block w-full p-2.5" required>
                        </div>
                        
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                            <textarea name="description" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:ring-1 block w-full p-2.5"></textarea>
                        </div>
                        
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Parent Category</label>
                            <select name="parent_category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:ring-1 block w-full p-2.5">
                                <option value="">None (Create as Category)</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>

         <div class="flex flex-col">
            <div class="">
                <div class="align-middle">
                    <div class=" overflow-x-scroll lg:overflow-x-hidden">
                        <table class="w-full divide-y divide-gray-200 whitespace-nowrap dark:divide-gray-600">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    {{-- <th scope="col" class="p-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-all" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-all" class="sr-only">checkbox</label>
                                        </div>
                                    </th> --}}
                                    <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                        Nama
                                    </th>
                                    <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                        Description
                                    </th>
                                    <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                        Actions
                                    </th>
                                </tr>
                            </thead >
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                
                                @foreach ($categories as $category)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                        {{-- <td class="w-4 p-4">
                                            <div class="flex items-center">
                                                <input id="checkbox" aria-describedby="checkbox-1" type="checkbox"
                                                    class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="checkbox" class="sr-only">checkbox</label>
                                            </div>
                                        </td> --}}
                                        <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"><h3 class="text-lg font-medium">{{ $category->name }}</h3></td>
                                        <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"><p class="text-gray-600 text-sm">{{ $category->description }}</p></td>
                                        <td class="p-4 space-x-2 whitespace-nowrap">
                                            <div class="flex justify-start gap-1">
                                                <a href="{{ route('admin.combined-categories.edit', [$category->id, 'type' => 'category']) }}" 
                                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-blue-700">
                                                    Edit
                                                </a>
                                                <form action="{{ route('admin.combined-categories.destroy', [$category->id, 'type' => 'category']) }}" method="POST" class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @if($category->subcategories->count() > 0)
                                        @foreach($category->subcategories as $subcategory)   
                                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"><h3 class="text-lg font-medium"><h4 class="font-medium">---- {{ $subcategory->name }}</h4></h3></td>
                                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"><p class="text-gray-600 text-sm">{{ $subcategory->description }}</p></td>
                                                <td class="p-4 space-x-2 whitespace-nowrap">
                                                    <div class="flex justify-start gap-1">
                                                        <a href="{{ route('admin.combined-categories.edit', [$subcategory->id, 'type' => 'subcategory']) }}" 
                                                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-blue-700">
                                                            Edit
                                                        </a>
                                                        <form action="{{ route('admin.combined-categories.destroy', [$subcategory->id, 'type' => 'subcategory']) }}" method="POST" class="inline-block">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>    
                                            </tr>
                                        @endforeach
                                    @else
                                        <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"><p class="text-gray-600 text-sm">---- No subcategories found.</p></td>
                                    @endif       
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- <!-- Categories List -->
        @foreach($categories as $category)
        <div class="mb-8">
            <div class="flex justify-between items-center bg-gray-50 p-4 rounded-t-lg border-b">
                <div>
                    <h3 class="text-lg font-medium">{{ $category->name }}</h3>
                    <p class="text-gray-600 text-sm">{{ $category->description }}</p>
                </div>
                <div class="flex space-x-2">
                    <a href="{{ route('admin.combined-categories.edit', [$category->id]) }}" 
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-blue-700">
                        Edit
                    </a>
                    <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
            
            <!-- Sub Categories -->
            <div class="bg-white border rounded-b-lg">
                @if($category->subcategories->count() > 0)
                    @foreach($category->subcategories as $subcategory)
                    <div class="flex justify-between items-center p-4 border-b last:border-b-0">
                        <div>
                            <h4 class="font-medium">{{ $subcategory->name }}</h4>
                            <p class="text-gray-600 text-sm">{{ $subcategory->description }}</p>
                        </div>
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.combined-categories.edit', [$subcategory->id]) }}" 
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-blue-700">
                                Edit
                            </a>
                            <form action="{{ route('admin.sub_categories.destroy', $subcategory->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                @else
                    <p class="p-4 text-gray-500 text-sm">No subcategories found</p>
                @endif
            </div>
        </div>
        @endforeach --}}
    </div>
</div>
@endsection