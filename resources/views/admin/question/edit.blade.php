@extends('layouts.app')

@section('content')

<div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
    <div class="w-full mb-1">
        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Edit Question</h1>
        
        <form action="{{ route('admin.question.update', $question->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="space-y-4">

                <div class="grid lg:grid-cols-2 gap-3">
                    <div>
                        <x-input-label for="tryout_id" :value="__('Tryout')" />
                        <x-select-input id="tryout_id" name="tryout_id">
                            <option selected="" disabled>Select Tryout</option>
                            @foreach ($tryouts as $tryout)
                                <option value="{{ $tryout->id }}" {{ $question->tryout_id == $tryout->id ? 'selected' : '' }}>{{ $tryout->name }}</option>
                            @endforeach
                        </x-select-input>
                        <x-input-error :messages="$errors->get('tryout_id')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="sub_categories_id" :value="__('Sub Categories')" />
                        <x-select-input id="sub_categories_id" name="sub_categories_id">
                            <option selected="" disabled>Select Sub Categories</option>
                            @foreach ($sub_categories as $sub_category)
                                <option value="{{ $sub_category->id }}" {{ $question->sub_categories_id == $sub_category->id ? 'selected' : '' }}>{{ $sub_category->name }}</option>
                            @endforeach
                        </x-select-input>
                        <x-input-error :messages="$errors->get('sub_categories_id')" class="mt-2" />
                    </div>
                </div>

                <div>
                    <img src="{{ Storage::url($question->image) }}" class="w-[300px]" alt="">
                </div>

                <div>
                    <x-input-label for="image" :value="__('Image')" />
                    <x-file-input type="file" name="image" id="image" />
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="question" :value="__('Question')" />
                    <x-text-area id="question" name="question" rows="4">{{ old('question', $question->question) }}</x-text-area>
                    <x-input-error :messages="$errors->get('question')" class="mt-2" />
                </div>

                <!-- Input untuk setiap jawaban -->
                <div>
                    <x-input-label for="a" :value="__('Jawaban A')" />
                    <x-text-input type="text" name="a" id="a" :value="$answer->a ?? old('a')" required />
                    <x-input-error :messages="$errors->get('a')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="b" :value="__('Jawaban B')" />
                    <x-text-input type="text" name="b" id="b" :value="$answer->b ?? old('b')" required />
                    <x-input-error :messages="$errors->get('b')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="c" :value="__('Jawaban C')" />
                    <x-text-input type="text" name="c" id="c" :value="$answer->c ?? old('c')" required />
                    <x-input-error :messages="$errors->get('c')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="d" :value="__('Jawaban D')" />
                    <x-text-input type="text" name="d" id="d" :value="$answer->d ?? old('d')" required />
                    <x-input-error :messages="$errors->get('d')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="e" :value="__('Jawaban E')" />
                    <x-text-input type="text" name="e" id="e" :value="$answer->e ?? old('e')" required />
                    <x-input-error :messages="$errors->get('e')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="corect_answer" :value="__('Correct Answer')" />
                    <x-text-input type="text" name="corect_answer" id="corect_answer" value="{{ old('corect_answer', $question->corect_answer) }}" required />
                    <x-input-error :messages="$errors->get('corect_answer')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="explanation" :value="__('Explanation')" />
                    <x-text-area id="explanation" name="explanation" rows="4">{{ old('explanation', $question->explanation) }}</x-text-area>
                    <x-input-error :messages="$errors->get('explanation')" class="mt-2" />
                </div>

                <div class="flex justify-end">
                    <x-primary-button class="ml-4">
                        {{ __('Update') }}
                    </x-primary-button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection