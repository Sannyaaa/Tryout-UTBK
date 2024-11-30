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
                            <a href="#" class="inline-flex items-center text-gray-50 hover:text-sky-200 dark:text-gray-300 dark:hover:text-white">
                            <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-50" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <a href="#" class="ml-1 text-gray-50 hover:text-sky-200 md:ml-2 dark:text-gray-300 dark:hover:text-white">Halaman</a>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-50" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <span class="ml-1 text-gray-50 md:ml-2 dark:text-gray-500" aria-current="page">Edit Home</span>
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

            
            <form action="{{ $homePage != null ? route('admin.edit-home-page', $homePage->id) : route('admin.create-home-page') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method( $homePage != null ? 'PUT' : 'POST' )
                <div class="space-y-20">
                    
                    <div class="grid lg:grid-cols-2 gap-4">
                        <div class="col-span-2 text-center mt-3">
                            <h2 class="text-5xl font-bold text-gray-700">Hero Section</h2>
                        </div>

                        <div class="space-y-4">
                            <div>
                                <x-input-label for="hero_image" :value="__('Gambar Hero')" />
                                <x-file-input type="file" name="hero_image" id="hero_image" placeholder="Masukan Gambar Hero "/>
                                <x-input-error :messages="$errors->get('hero_image')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="hero_title" :value="__('Judul hero')" />
                                <x-text-input type="text" :value="$homePage->hero_title ?? old('hero_title')" name="hero_title" id="hero_title" placeholder="Masukan Judul Hero"/>
                                <x-input-error :messages="$errors->get('hero_title')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="hero_desc" :value="__('Deskripsi Hero')" />
                                <x-text-area id="hero_desc" name="hero_desc" rows="4" placeholder="Masukan Deskripsi Hero">{!! $homePage->hero_desc ?? '' !!}</x-text-area>
                                <x-input-error :messages="$errors->get('hero_desc')" class="mt-2" />
                            </div>
                        </div>

                        <div>
                            <div>
                                <img src="{{ $homePage != null ? Storage::url($homePage->hero_image) : '' }}" class="w-[400px] mx-auto" alt="">
                            </div>
                        </div>
                    </div>

                    <div>
                        <h2 class="text-5xl font-bold text-gray-700 mb-3 text-center">Feature Section</h2>
                        
                        <div class="features-container grid grid-cols-2 gap-4 ">
                            {{-- @forelse($features as $feature)
                                <div class="feature-input gap-2">
                                    <div>

                                        <!-- Trigger Button -->
                                        <button id="openPopup" type="button" class="bg-blue-500 text-white px-4 py-2 rounded">
                                            Pilih Ikon
                                        </button>

                                        <!-- Popup -->
                                        <div id="iconPopup" class="fixed inset-0 z-30 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
                                            <div class="bg-white py-16 px-20 rounded-lg w-4/5 max-h-[80vh] overflow-y-auto">
                                                <!-- Header -->
                                                <div class="flex justify-between items-center mb-4">
                                                    <h2 class="text-lg font-semibold">Pilih Ikon</h2>
                                                    <button id="closePopup" type="button" class="text-gray-500 hover:text-gray-700">&times;</button>
                                                </div>
                                                
                                                <!-- Search Input -->
                                                <input
                                                    type="text"
                                                    id="iconSearch"
                                                    class="border border-gray-300 rounded-lg px-3 py-2 mb-4 w-full"
                                                    placeholder="Cari ikon...">
                                                
                                                <!-- Icon List -->
                                                <div id="iconList" class="grid grid-cols-4 lg:grid-cols-6 gap-4">
                                                    <!-- Ikon akan dimuat di sini -->
                                                </div>
                                                
                                                <!-- Submit Button -->
                                                <button id="submitIcon" type="button" class="bg-green-500 text-white px-4 py-2 rounded mt-4">
                                                    Pilih
                                                </button>
                                            </div>
                                        </div>

                                        <div id="selectedIconDisplay" class="mt-4">
                                            <i id="selectedIconPreview" class="text-3xl"></i>
                                            <input type="hidden" id="selectedIconInput" name="feature_icon[]">
                                        </div>

                                        <div>
                                            <x-input-label for="feature_name" :value="__('feature_name Package Member')" />
                                            <x-text-input type="text" name="feature_name[]" value="" id="feature_name" placeholder="Masukan feature_name"/>
                                            <x-input-error :messages="$errors->get('feature_name')" class="mt-2" />
                                        </div>

                                        <div>
                                            <x-input-label for="feature_desc" :value="__('feature_desc')" />
                                            <textarea id="feature_desc" name="feature_desc[]" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan feature_desc">{!! $feature->feature_desc ?? '' !!}</textarea>
                                            <x-input-error :messages="$errors->get('feature_desc')" class="mt-2" />
                                        </div>
                                    </div>
                                </div>
                            @empty --}}
                            @forelse ($features as $i => $feature)
                                <div class="feature-input py-4">
                                    <div class="space-y-4">

                                        <div class="flex items-center gap-6">
                                            <!-- Trigger Button -->
                                            <x-primary-button id="openPopup{{ $i + 1 }}" type="button" class="">
                                                Pilih Ikon
                                            </x-primary-button>

                                            <div id="selectedIconDisplay" class="">
                                                <span class="bg-sky-100 h-16 w-16 flex items-center justify-center rounded-full text-sky-600 text-2xl">
                                                    <i id="selectedIconPreview{{ $i + 1 }}" class="{{ $feature->image ?? 'text-gray-300' }}"></i>
                                                </span>
                                                <input type="hidden" id="selectedIconInput{{ $i + 1 }}" name="feature_icon[]" value="{{ $feature->image }}">
                                            </div>
                                        </div>

                                        <!-- Popup -->
                                        <div id="iconPopup{{ $i + 1 }}" class="fixed inset-0 z-30 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
                                            <div class="bg-white py-12 px-20 rounded-lg w-3/4">

                                                <!-- Header -->
                                                <div class="flex justify-between items-center mb-4">
                                                    <h2 class="text-3xl font-bold">Pilih Ikon</h2>
                                                    <button id="closePopup{{ $i + 1 }}" type="button" class=" bg-rose-600 text-rose-100 p-1 rounded-full h-8 w-8">&times;</button>
                                                </div>
                                                
                                                <!-- Search Input -->
                                                <input
                                                    type="text"
                                                    id="iconSearch{{ $i + 1 }}"
                                                    class="border border-gray-300 rounded-lg px-3 py-2 mb-4 w-full"
                                                    placeholder="Cari ikon...">
                                                
                                                <div class="  max-h-[60vh] overflow-y-auto overflow-hidden">
                                                    <!-- Icon List -->
                                                    <div id="iconList{{ $i + 1 }}" class="grid grid-cols-4 lg:grid-cols-6 gap-4">
                                                        <!-- Ikon akan dimuat di sini -->
                                                    </div>
                                                </div>
                                                
                                                <div class="mt-4 w-1/5 mx-auto">
                                                    <!-- Submit Button -->
                                                    <x-primary-button id="submitIcon{{ $i + 1 }}" type="button" class="">
                                                        Pilih
                                                    </x-primary-button>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <x-input-label for="feature_name" :value="__('Judul')" />
                                            <x-text-input type="text" name="feature_name[]" value="{{ $feature->name }}" id="feature_name" placeholder="Masukan feature_name"/>
                                            <x-input-error :messages="$errors->get('feature_name')" class="mt-2" />
                                        </div>

                                        <div>
                                            <x-input-label for="feature_desc" :value="__('Deskripsi')" />
                                            <textarea id="feature_desc" name="feature_desc[]" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan feature_desc">{!! $feature->description ?? '' !!}</textarea>
                                            <x-input-error :messages="$errors->get('feature_desc')" class="mt-2" />
                                        </div>
                                    </div>
                                </div>
                            @empty
                                @for ($i = 4; $i > 0; $i++)
                                    <div class="feature-input gap-2">
                                        <div>

                                            <!-- Trigger Button -->
                                            <button id="openPopup{{ $i }}" type="button" class="bg-blue-500 text-white px-4 py-2 rounded">
                                                Pilih Ikon
                                            </button>

                                            <!-- Popup -->
                                            <div id="iconPopup{{ $i }}" class="fixed inset-0 z-30 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
                                                <div class="bg-white py-16 px-20 rounded-lg w-4/5 max-h-[80vh] overflow-y-auto">
                                                    <!-- Header -->
                                                    <div class="flex justify-between items-center mb-4">
                                                        <h2 class="text-lg font-semibold">Pilih Ikon</h2>
                                                        <button id="closePopup{{ $i }}" type="button" class="text-gray-500 hover:text-gray-700">&times;</button>
                                                    </div>
                                                    
                                                    <!-- Search Input -->
                                                    <input
                                                        type="text"
                                                        id="iconSearch{{ $i }}"
                                                        class="border border-gray-300 rounded-lg px-3 py-2 mb-4 w-full"
                                                        placeholder="Cari ikon...">
                                                    
                                                    <!-- Icon List -->
                                                    <div id="iconList{{ $i }}" class="grid grid-cols-4 lg:grid-cols-6 gap-4">
                                                        <!-- Ikon akan dimuat di sini -->
                                                    </div>
                                                    
                                                    <!-- Submit Button -->
                                                    <button id="submitIcon{{ $i }}" type="button" class="bg-green-500 text-white px-4 py-2 rounded mt-4">
                                                        Pilih
                                                    </button>
                                                </div>
                                            </div>

                                            <div id="selectedIconDisplay" class="mt-4">
                                                <span class="bg-sky-100">
                                                    <i id="selectedIconPreview{{ $i }}" class="{{ $feature->image ?? 'text-gray-300' }} text-3xl"></i>
                                                </span>
                                                <input type="hidden" id="selectedIconInput{{ $i }}" name="feature_icon[]" value="{{ $feature->image ?? '' }}">
                                            </div>

                                            <div>
                                                <x-input-label for="feature_name" :value="__('feature_name Package Member')" />
                                                <x-text-input type="text" name="feature_name[]" value="{{ $feature->name ?? '' }}" id="feature_name" placeholder="Masukan feature_name"/>
                                                <x-input-error :messages="$errors->get('feature_name')" class="mt-2" />
                                            </div>

                                            <div>
                                                <x-input-label for="feature_desc" :value="__('feature_desc')" />
                                                <textarea id="feature_desc" name="feature_desc[]" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan feature_desc">{!! $feature->description ?? '' !!}</textarea>
                                                <x-input-error :messages="$errors->get('feature_desc')" class="mt-2" />
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            @endforelse
                            {{-- @endforelse --}}
                            {{-- @if($package_member->faqs->isEmpty()) --}}
                                {{-- <div class="faq-input flex gap-2">
                                    <x-text-input type="text" name="faqs[]" placeholder="Enter faq" required/>
                                    <button type="button" class="remove-faq px-3 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-red-300">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </button>
                                </div> --}}
                            {{-- @endif --}}
                        </div>
                    </div>

                    <div class="grid lg:grid-cols-2 gap-4">
                        <div class="col-span-2 text-center">
                            <h2 class="text-5xl font-bold text-gray-700">About Us Section</h2>
                        </div>

                        <div>
                            <img src="{{ $homePage != null ? Storage::url($homePage->about_us_image) : '' }}" class="w-[400px] mx-auto" alt="">
                        </div>

                        <div class="space-y-4">
                            <div>
                                <x-input-label for="about_us_image" :value="__('Gambar About Us')" />
                                <x-file-input type="file" name="about_us_image" id="about_us_image" placeholder="Masukan Gambar About Us"/>
                                <x-input-error :messages="$errors->get('about_us_image')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="about_us_title" :value="__('Judul About Us')" />
                                <x-text-input type="text" :value="$homePage->about_us_title ?? old('about_us_title')" name="about_us_title" id="about_us_title" placeholder="Masukan Judul About Us"/>
                                <x-input-error :messages="$errors->get('about_us_title')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="about_us_desc" :value="__('Deskripsi About Us')" />
                                <x-text-area id="about_us_desc" name="about_us_desc" rows="4" placeholder="Masukan Deskripsi About Us">{!! $homePage->about_us_desc ?? '' !!}</x-text-area>
                                <x-input-error :messages="$errors->get('about_us_desc')" class="mt-2" />
                            </div>
                        </div>

                    </div>

                    <div>
                        <h2 class="text-5xl font-bold text-gray-700 mb-3 text-center">FAQ Section</h2>
                        
                        <div class="faqs-container grid grid-cols-2 gap-4 ">
                            @forelse($faqs as $faq)
                                <div class="faq-input gap-2">
                                    <div class="space-4">
                                        <div>
                                            <x-input-label for="question" :value="__('question Package Member')" />
                                            <x-text-input type="text" :value="$faq->question ?? old('question')" name="question[]" id="question" placeholder="Masukan question"/>
                                            <x-input-error :messages="$errors->get('question')" class="mt-2" />
                                        </div>

                                        <div>
                                            <x-input-label for="answer" :value="__('answer')" />
                                            <textarea id="answer" name="answer[]" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan answer">{!! $faq->answer ?? '' !!}</textarea>
                                            <x-input-error :messages="$errors->get('answer')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="mt-2 text-right">
                                        <button type="button" class="remove-faq px-3 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-red-300">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            @empty
                                <div class="faq-input gap-2">
                                    <div class=" space-y-4">
                                        <div>
                                            <x-input-label for="question" :value="__('Pertanyaan')" />
                                            <x-text-input type="text" :value="$faq->question ?? old('question')" name="question[]" id="question" placeholder="Masukan question"/>
                                            <x-input-error :messages="$errors->get('question')" class="mt-2" />
                                        </div>

                                        <div>
                                            <x-input-label for="answer" :value="__('Jawaban')" />
                                            <textarea id="answer" name="answer[]" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan answer">{!! $faq->answer ?? '' !!}</textarea>
                                            <x-input-error :messages="$errors->get('answer')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="mt-2 text-right">
                                        <button type="button" class="remove-faq px-3 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-red-300">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            @endforelse
                            {{-- @if($package_member->faqs->isEmpty()) --}}
                                {{-- <div class="faq-input flex gap-2">
                                    <x-text-input type="text" name="faqs[]" placeholder="Enter faq" required/>
                                    <button type="button" class="remove-faq px-3 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-red-300">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </button>
                                </div> --}}
                            {{-- @endif --}}
                        </div>
                        <button type="button" class="add-faq mt-2 px-3 py-2 text-sm font-medium text-white bg-gradient-to-tr from-sky-400 to-sky-500 rounded-lg focus:ring-4 focus:ring-blue-300">
                            <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            Add Faq
                        </button>
                    </div>
                    
                    <div class="flex justify-between">
                            <x-secondary-href href="{{ route('admin.package_member.index') }}">
                                Kembali
                            </x-secondary-href>
                            <x-primary-button type="submit">
                                Edit
                            </x-primary-button>
                    </div>
            </form>
        </div>
    </div>
</div>


@endsection

@push('script')

    

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const faqsContainer = document.querySelector('.faqs-container');
            
            // Template for new faq input
            const faqTemplate = `
                <div class="faq-input gap-2">
                    <div>
                        <div>
                            <x-input-label for="question" :value="__('question Package Member')" />
                            <x-text-input type="text" name="question[]" id="question" placeholder="Masukan question"/>
                            <x-input-error :messages="$errors->get('question')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="answer" :value="__('answer')" />
                            <textarea id="answer" name="answer[]" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan answer"></textarea>
                            <x-input-error :messages="$errors->get('answer')" class="mt-2" />
                        </div>
                    </div>
                    <div class="mt-2 text-right">
                        <button type="button" class="remove-faq px-3 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-red-300">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>
            `;

            // Add new faq input
            document.querySelector('.add-faq').addEventListener('click', function() {
                const newFaq = document.createElement('div');
                newFaq.innerHTML = faqTemplate;
                faqsContainer.appendChild(newFaq.firstElementChild);
            });

            // Remove faq input
            faqsContainer.addEventListener('click', function(e) {
                if (e.target.closest('.remove-faq')) {
                    const faqInput = e.target.closest('.faq-input');
                    if (faqsContainer.children.length > 1) {
                        faqInput.remove();
                    }
                }
            });
        });
    </script>

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const featuresContainer = document.querySelector('.features-container');
            
            // Template for new feature input
            const featureTemplate = `
                <div class="feature-input gap-2">
                    <div>

                        <!-- Trigger Button -->
                        <button id="openPopup" type="button" class="bg-blue-500 text-white px-4 py-2 rounded">
                            Pilih Ikon
                        </button>

                        <!-- Popup -->
                        <div id="iconPopup" class="fixed inset-0 z-30 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
                            <div class="bg-white py-16 px-20 rounded-lg w-4/5 max-h-[80vh] overflow-y-auto">
                                <!-- Header -->
                                <div class="flex justify-between items-center mb-4">
                                    <h2 class="text-lg font-semibold">Pilih Ikon</h2>
                                    <button id="closePopup" type="button" class="text-gray-500 hover:text-gray-700">&times;</button>
                                </div>
                                
                                <!-- Search Input -->
                                <input
                                    type="text"
                                    id="iconSearch"
                                    class="border border-gray-300 rounded-lg px-3 py-2 mb-4 w-full"
                                    placeholder="Cari ikon...">
                                
                                <!-- Icon List -->
                                <div id="iconList" class="grid grid-cols-4 lg:grid-cols-6 gap-4">
                                    <!-- Ikon akan dimuat di sini -->
                                </div>
                                
                                <!-- Submit Button -->
                                <button id="submitIcon" type="button" class="bg-green-500 text-white px-4 py-2 rounded mt-4">
                                    Pilih
                                </button>
                            </div>
                        </div>

                        <div id="selectedIconDisplay" class="mt-4">
                            <i id="selectedIconPreview" class="text-3xl"></i>
                            <input type="hidden" id="selectedIconInput" name="feature_icon[]">
                        </div>

                        <div>
                            <x-input-label for="feature_name" :value="__('feature_name Package Member')" />
                            <x-text-input type="text" name="feature_name[]" id="feature_name" placeholder="Masukan feature_name"/>
                            <x-input-error :messages="$errors->get('feature_name')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="feature_desc" :value="__('feature_desc')" />
                            <textarea id="feature_desc" name="feature_desc[]" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan feature_desc">{!! $feature->feature_desc ?? '' !!}</textarea>
                            <x-input-error :messages="$errors->get('feature_desc')" class="mt-2" />
                        </div>
                    </div>
                    <div class="mt-2 text-right">
                        <button type="button" class="remove-feature px-3 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-red-300">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>
            `;

            // Add new feature input
            document.querySelector('.add-feature').addEventListener('click', function() {
                const newfeature = document.createElement('div');
                newfeature.innerHTML = featureTemplate;
                featuresContainer.appendChild(newfeature.firstElementChild);    
            });

            // Remove feature input
            featuresContainer.addEventListener('click', function(e) {
                if (e.target.closest('.remove-feature')) {
                    const featureInput = e.target.closest('.feature-input');
                    if (featuresContainer.children.length > 1) {
                        featureInput.remove();
                    }
                }
            });
        });
    </script> --}}

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const popups = [
                { open: 'openPopup1', close: 'closePopup1', popup: 'iconPopup1', search: 'iconSearch1', list: 'iconList1', submit: 'submitIcon1', input: 'selectedIconInput1', preview: 'selectedIconPreview1' },
                { open: 'openPopup2', close: 'closePopup2', popup: 'iconPopup2', search: 'iconSearch2', list: 'iconList2', submit: 'submitIcon2', input: 'selectedIconInput2', preview: 'selectedIconPreview2' },
                { open: 'openPopup3', close: 'closePopup3', popup: 'iconPopup3', search: 'iconSearch3', list: 'iconList3', submit: 'submitIcon3', input: 'selectedIconInput3', preview: 'selectedIconPreview3' },
                { open: 'openPopup4', close: 'closePopup4', popup: 'iconPopup4', search: 'iconSearch4', list: 'iconList4', submit: 'submitIcon4', input: 'selectedIconInput4', preview: 'selectedIconPreview4' }
            ];

            const icons = @json($icons); // Dummy data

            popups.forEach(({ open, close, popup, search, list, submit, input, preview }) => {
                const openPopup = document.getElementById(open);
                const closePopup = document.getElementById(close);
                const iconPopup = document.getElementById(popup);
                const iconSearch = document.getElementById(search);
                const iconList = document.getElementById(list);
                const submitIcon = document.getElementById(submit);

                // Fungsi render ikon tetap sama
                function renderIcons(searchQuery = '') {
                    iconList.innerHTML = '';
                    Object.keys(icons).forEach(icon => {
                        const details = icons[icon];
                        if (searchQuery === '' || icon.toLowerCase().includes(searchQuery.toLowerCase())) {
                            details.styles.forEach(style => {
                                const iconClass = `fa-${style} fa-${icon}`;
                                const iconItem = document.createElement('div');
                                iconItem.className = 'flex flex-col items-center justify-center bg-white space-y-2 h-36';
                                iconItem.innerHTML = `
                                    <div class="w-full h-full">
                                        <input type="radio" id="${iconClass}" name="icon" value="${iconClass}" class="hidden peer" required />
                                        <label for="${iconClass}" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-sky-500 peer-checked:border-sky-600 peer-checked:text-sky-600 peer-checked:bg-sky-100 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">                           
                                            <div class="flex flex-col w-full justify-center items-center">
                                                <i class="${iconClass} text-3xl font-bold mb-2"></i>
                                                <span class="text-sm">${icon}</span>
                                            </div>
                                        </label>
                                    </div>
                                `;
                                iconList.appendChild(iconItem);
                            });
                        }
                    });
                }

                openPopup.addEventListener('click', () => {
                    iconPopup.classList.remove('hidden');
                    renderIcons();
                });

                closePopup.addEventListener('click', () => {
                    iconPopup.classList.add('hidden');
                });

                iconSearch.addEventListener('input', () => {
                    renderIcons(iconSearch.value);
                });

                submitIcon.addEventListener('click', () => {
                    const selectedRadio = document.querySelector(`#${list} input[name="icon"]:checked`);
                    if (selectedRadio) {
                        const selectedIcon = selectedRadio.value;
                        document.getElementById(input).value = selectedIcon;
                        iconPopup.classList.add('hidden');
                        document.getElementById(preview).className = selectedIcon;
                    } else {
                        alert('Pilih salah satu ikon!');
                    }
                });
            });
        });

    </script>

@endpush

