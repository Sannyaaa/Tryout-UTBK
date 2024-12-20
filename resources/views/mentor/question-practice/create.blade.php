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
                            <a href="{{ route('mentor.question-practice.index') }}" class="ml-1 text-gray-50 hover:text-sky-200 md:ml-2 dark:text-gray-300 dark:hover:text-white">Latihan</a>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-50" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <span class="ml-1 text-gray-50 md:ml-2 dark:text-gray-500" aria-current="page">Buat Latihan</span>
                            </div>
                        </li>
                        </ol>
                    </nav>
                    {{-- <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">All Bimbels</h1> --}}
                </div>
            </div>
        {{-- <div class="items-center justify-between block sm:flex md:divide-x md:divide-gray-100 dark:divide-gray-700">
            <div class="flex items-center mb-4 sm:mb-0">
                <form class="sm:pr-3" action="#" method="GET">
                    <label for="products-search" class="sr-only">Search</label>
                    <div class="relative w-48 mt-1 sm:w-64 xl:w-96">
                        <input type="text" name="email" id="products-search" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for products">
                    </div>
                </form>
                <div class="flex items-center w-full sm:justify-end">
                    <div class="flex pl-2 space-x-1">
                        <a href="#" class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path></svg>
                        </a>
                        <a href="#" class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                        </a>
                        <a href="#" class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                        </a>
                        <a href="#" class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
            <button id="createProductButton" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" type="button" data-drawer-target="drawer-create-product-default" data-drawer-show="drawer-create-product-default" aria-controls="drawer-create-product-default" data-drawer-placement="right">
                Add new product
            </button>
        </div> --}}
            <form action="{{ route('mentor.question-practice.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="space-y-4">
                    
                    <div class="grid lg:grid-cols-2 gap-3">
                        <div>
                            <x-input-label for="class_bimbel_id" :value="__('Kelas')" />
                            <x-select-input id="class_bimbel_id" name="class_bimbel_id">
                                <option selected disabled>Select Kelas</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}" {{ old('class_bimbel_id', $classBimbel->id ?? '') == $class->id ? 'selected' : '' }}>
                                        {{ $class->name }}
                                    </option>
                                @endforeach
                            </x-select-input>
                            <x-input-error :messages="$errors->get('class_bimbel_id')" class="mt-2" />
                        </div>
                        <div>
                            <x-text-input type="hidden" value="{{ $back ?? '' }}" name="back" id="back" />
                            <x-input-label for="image" :value="__('Image')" />
                            <x-file-input type="file" name="image" id="image" placeholder="Masukan Image Pertanyaan" />
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>
                    </div>

                    <div>
                        <x-input-label for="question" :value="__('Pertanyaan')" />
                        <x-text-area id="question" name="question" rows="4" placeholder="Masukan Pertanyaan"/>
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
                        <x-input-label for="correct_answer" :value="__('Jawaban Benar')" />
                        <x-select-input id="correct_answer" name="correct_answer" >
                            <option selected="" disabled>Pilih Jawaban Benar</option>
                            <option value="a" {{ old('correct_answer') == 'a' ? 'selected' : '' }}>A</option>
                            <option value="b" {{ old('correct_answer') == 'b' ? 'selected' : '' }}>B</option>
                            <option value="c" {{ old('correct_answer') == 'c' ? 'selected' : '' }}>C</option>
                            <option value="d" {{ old('correct_answer') == 'd' ? 'selected' : '' }}>D</option>
                            <option value="e" {{ old('correct_answer') == 'e' ? 'selected' : '' }}>E</option>
                        </x-select-input>
                        <x-input-error :messages="$errors->get('correct_answer')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="explanation" :value="__('Penjelasan')" />
                        <x-text-area id="explanation" name="explanation" rows="4" placeholder="Masukan Penjalasan"/>
                        <x-input-error :messages="$errors->get('explanation')" class="mt-2" />
                    </div>
                    
                    <div class="flex justify-between">
                        <x-secondary-href href="{{ route('mentor.question-practice.index') }}">
                            Kembali
                        </x-secondary-href>
                        <x-primary-button type="submit">
                            Tambah Pertanyaan
                        </x-primary-button>
                    </div>
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

