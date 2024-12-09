@extends('layouts.frontend')

@section('content')
    <div class="p-4 bg-slate-50">
        <div class="mx-auto max-w-6xl">
            <div class=" relative mb-8">
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
                            <a href="#" class="ml-1 text-gray-50 hover:text-sky-200 md:ml-2 dark:text-gray-300 dark:hover:text-white">Paket Pembelian</a>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-50" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <span class="ml-1 text-gray-50 md:ml-2 dark:text-gray-500" aria-current="page">Semua Paket</span>
                            </div>
                        </li>
                        </ol>
                    </nav>
                    {{-- <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">All Bimbels</h1> --}}
                </div>
            </div>
            <div>
                <!-- Filter Section -->
                <div class="flex items-center space-x-4 my-8 font-semibold">
                    <a href="{{ route('package-page', ['type' => 'all']) }}" 
                            class="px-4 py-2 rounded-lg transition-all shadow hover:shadow-lg {{ $type === 'all' ? 'bg-sky-500 text-white' : 'bg-white text-gray-700' }}">
                        Semua Paket
                    </a>
                    <a href="{{ route('package-page', ['type' => 'tryout']) }}"
                            class="px-4 py-2 rounded-lg transition-all shadow hover:shadow-lg {{ $type === 'tryout' ? 'bg-sky-500 text-white' : 'bg-white text-gray-700' }}">
                        Paket Tryout
                    </a>
                    <a href="{{ route('package-page', ['type' => 'bimbel']) }}"
                            class="px-4 py-2 rounded-lg transition-all shadow hover:shadow-lg {{ $type === 'bimbel' ? 'bg-sky-500 text-white' : 'bg-white text-gray-700' }}">
                        Paket Bimbel
                    </a>
                </div>

                <!-- Package Grid Section -->
                <section class="grid grid-cols-1 space-y-12 md:space-y-0 md:grid-cols-2 lg:grid-cols-3 md:gap-x-8 md:gap-8">
                    @foreach ($packages as $package)
                        <div class="flex flex-col max-w-lg">
                            <div class="text-gray-900 bg-white hover:shadow-lg transition-all border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                                <div class="relative aspect-video overflow-hidden bg-cover align-middle p-2">
                                    <img class="object-cover object-center w-full h-full rounded-md" 
                                        src="{{ $package->image != null ? Storage::url($package->image) : asset('build/assets/Photo-Image-Icon-Graphics-10388619-1-1-580x386.jpg') }}" 
                                        alt="package image" />
                                    {{-- <span class="relative bottom-10 -right-3 py-1 px-4 bg-sky-500 border-sky-400 border-2 text-white rounded-lg font-semibold">
                                        {{ $package->tryout_id != null ? 'Tryout' : 'Bimbel' }}
                                    </span> --}}
                                </div>
                                <div class="px-5 py-2">
                                    <div>
                                        <a href="{{ route('package.item', $package->id) }}">
                                            <h5 class="text-3xl font-bold hover:underline text-gray-800 uppercase dark:text-white mb-0">
                                                {{ $package->name }}
                                            </h5>
                                        </a>
                                    </div>
                                    {{-- <p class="font-medium text-gray-500 dark:text-gray-400 mb-3">
                                        {!! Str::limit($package->description, 100, '...') !!}
                                    </p> --}}
                                    <div class="space-y-1 my-2">
                                        @foreach ($package->benefits as $benefit)
                                            <div class="flex items-center space-x-3 text-gray-500 font-medium text-sm">
                                                <!-- Icon -->
                                                <div class="p-1 bg-sky-400 rounded-full">
                                                    <svg class="flex-shrink-0 w-4 h-4 text-gray-100 dark:text-gray-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                                </div>
                                                <span>{{ $benefit->benefit }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="flex justify-between items-baseline my-3">
                                        <x-primary-link href="{{ route('package.item', $package->id) }}">
                                            Lihat Detail
                                        </x-primary-link>
                                        <span class="mt-auto text-3xl font-bold">
                                            Rp.{{ number_format($package->price) }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </section>
            </div>
        </div>
    </div>
@endsection
