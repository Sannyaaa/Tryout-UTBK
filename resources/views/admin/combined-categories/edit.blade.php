@extends('layouts.app')

@section('content')
<div class="p-4 mt-12">
    <div class=" mx-auto p-6 bg-white rounded-lg shadow">
        <div class="mb-4">
            <h2 class="text-xl font-semibold">Edit Item</h2>
        </div>

        <form action="{{ route('admin.combined-categories.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-2 gap-4">
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                    <input type="text" name="name" value="{{ $item->name }}" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:ring-1 block w-full p-2.5" required>
                </div>

                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900">Parent Category</label>
                    <select name="parent_category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:ring-1 block w-full p-2.5">
                        <option value="">None (Save as Category)</option>
                        @foreach ($categories as $category)
                            @if ($category->id != $item->id)
                                <option value=" {{ $category->id }}" 
                                    {{ $item->categories_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            
            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                <textarea name="description" rows="4" 
                    class="ckeditor bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:ring-1 block w-full p-2.5">{!! $item->description !!}</textarea>
            </div>
            
            <div class="flex justify-between">
                <x-secondary-link href="{{ route('admin.combined-categories.index') }}" 
                    class="">
                    Kembali
                </x-secondary-link>
                <button type="submit" class="text-white bg-gradient-to-tr from-sky-400 to-sky-500 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                    Submit
                </button>
                
            </div>
        </form>
    </div>
</div>
@endsection