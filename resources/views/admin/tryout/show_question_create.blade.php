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
                            <span class="ml-1 text-gray-50 md:ml-2 dark:text-gray-500" aria-current="page">Buat Pertanyaan</span>
                            </div>
                        </li>
                        </ol>
                    </nav>
                    {{-- <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">All Bimbels</h1> --}}
                </div>
            </div>

            <form action="{{ route('admin.tryout.question.store', $tryout->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="space-y-4">

                    <div class="grid lg:grid-cols-2 gap-3">
                        <div>
                            <x-input-label for="sub_categories_id" :value="__('Sub Categories')" />
                            <x-select-input id="sub_categories_id" name="sub_categories_id" >
                                <option selected="" disabled>Select Sub Categories</option>
                                @foreach ($sub_categories as $sub_category)
                                    <option value="{{ $sub_category->id }}" {{ old('sub_categories_id') == $sub_category->id ? 'selected' : '' }}>{{ $sub_category->name }}</option>
                                @endforeach
                            </x-select-input>
                            <x-input-error :messages="$errors->get('sub_categories_id')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="image" :value="__('Image')" />
                            <x-file-input type="file" name="image" id="image" placeholder="Masukan Image Question"/>
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>
                    </div>

                    <div>
                        <x-input-label for="question" :value="__('Question')" />
                        <x-text-area id="question" name="question" rows="4" placeholder="Masukan question"/>
                        <x-input-error :messages="$errors->get('question')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="a" :value="__('Jawaban A')" />
                        <x-text-input type="text" :value="old('a')" name="a" id="a" placeholder="Masukan jawaban A" required=""/>
                        <x-input-error :messages="$errors->get('a')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="b" :value="__('Jawaban B')" />
                        <x-text-input type="text" :value="old('b')" name="b" id="b" placeholder="Masukan jawaban B" required=""/>
                        <x-input-error :messages="$errors->get('b')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="c" :value="__('Jawaban C')" />
                        <x-text-input type="text" :value="old('c')" name="c" id="c" placeholder="Masukan jawaban C" required=""/>
                        <x-input-error :messages="$errors->get('c')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="d" :value="__('Jawaban D')" />
                        <x-text-input type="text" :value="old('d')" name="d" id="d" placeholder="Masukan jawaban D" required=""/>
                        <x-input-error :messages="$errors->get('d')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="e" :value="__('Jawaban E')" />
                        <x-text-input type="text" :value="old('e')" name="e" id="e" placeholder="Masukan jawaban E" required=""/>
                        <x-input-error :messages="$errors->get('e')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="corect_answer" :value="__('Corect Answer')" />
                        <x-select-input id="corect_answer" name="corect_answer" >
                            <option selected="" disabled>Select Corect Answer</option>
                            <option value="a" {{ old('corect_answer') == 'a' ? 'selected' : '' }}>A</option>
                            <option value="b" {{ old('corect_answer') == 'b' ? 'selected' : '' }}>B</option>
                            <option value="c" {{ old('corect_answer') == 'c' ? 'selected' : '' }}>C</option>
                            <option value="d" {{ old('corect_answer') == 'd' ? 'selected' : '' }}>D</option>
                            <option value="e" {{ old('corect_answer') == 'e' ? 'selected' : '' }}>E</option>
                        </x-select-input>
                        <x-input-error :messages="$errors->get('corect_answer')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="explanation" :value="__('explanation')" />
                        <x-text-area id="explanation" name="explanation" rows="4" placeholder="Masukan explanation"/>
                        <x-input-error :messages="$errors->get('explanation')" class="mt-2" />
                    </div>
                    
                    <div class="flex justify-between">
                            <x-secondary-href href="{{ route('admin.question.index') }}">
                                Back
                            </x-secondary-href>
                            <x-primary-button type="submit">
                                Add question
                            </x-primary-button>
                    </div>
            </form>
        </div>
    </div>
</div>


@endsection

@push('script')
    <script>
        document.getElementById('is_together').addEventListener('change', function() {
            var dateInputs = document.getElementById('date-inputs');
            dateInputs.style.display = this.value === 'together' ? 'block' : 'none';
            
            // Toggle required attribute
            var inputs = dateInputs.getElementsByTagName('input');
            for(var i = 0; i < inputs.length; i++) {
                inputs[i].required = this.value === 'together';
            }
        });
    </script>
@endpush
