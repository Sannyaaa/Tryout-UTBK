@extends('layouts.app')

@section('content')

<div class="p-4 mt-12">
    <div class="p-6 bg-white block rounded-lg shadow sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
        <div class="w-full mb-1">
            <div class="mx-6 relative -mt-12 mb-6">
                <div class="bg-gradient-to-tr from-sky-400 to-sky-500 rounded-lg shadow-lg py-4 px-3">
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 text-sm font-semibold md:space-x-2">
                        <li class="inline-flex items-center">
                            <a href="{{ route('dashboard') }}" class="inline-flex items-center text-gray-50 hover:text-sky-200 dark:text-gray-300 dark:hover:text-white">
                            <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-50" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <a href="{{ route('admin.tryout.index') }}" class="ml-1 text-gray-50 hover:text-sky-200 md:ml-2 dark:text-gray-300 dark:hover:text-white">Tryout</a>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-50" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <span class="ml-1 text-gray-50 md:ml-2 dark:text-gray-500" aria-current="page">Edit Question</span>
                            </div>
                        </li>
                        </ol>
                    </nav>
                    {{-- <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">All Bimbels</h1> --}}
                </div>
            </div>
        
            <form action="{{ route('admin.tryout.question.update', [$tryout->id, $question->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="space-y-4">

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
                        <x-text-area id="question" name="question" rows="4">{!! old('question', $question->question) !!}</x-text-area>
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
                        <x-input-label for="correct_answer" :value="__('correct Answer')" />
                        <x-select-input id="correct_answer" name="correct_answer" >
                            <option selected="" disabled>Select correct Answer</option>
                            <option value="a" {{ old('correct_answer', $question->correct_answer) == 'a' ? 'selected' : '' }}>A</option>
                            <option value="b" {{ old('correct_answer', $question->correct_answer) == 'b' ? 'selected' : '' }}>B</option>
                            <option value="c" {{ old('correct_answer', $question->correct_answer) == 'c' ? 'selected' : '' }}>C</option>
                            <option value="d" {{ old('correct_answer', $question->correct_answer) == 'd' ? 'selected' : '' }}>D</option>
                            <option value="e" {{ old('correct_answer', $question->correct_answer) == 'e' ? 'selected' : '' }}>E</option>
                        </x-select-input>
                        <x-input-error :messages="$errors->get('correct_answer')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="explanation" :value="__('Explanation')" />
                        <x-text-area id="explanation" name="explanation" rows="4">{!! old('explanation', $question->explanation) !!}</x-text-area>
                        <x-input-error :messages="$errors->get('explanation')" class="mt-2" />
                    </div>

                    <div class="flex justify-between ">
                        <x-secondary-link href="{{ route('admin.tryout.show', $tryout->id) }}">
                            Kembali
                        </x-secondary-link>
                        <x-primary-button class="">
                            {{ __('Submit') }}
                        </x-primary-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection