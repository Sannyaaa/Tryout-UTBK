@extends('layouts.frontend')

@section('content')
    <div class="bg-sky-50">
        <div class="relative isolate px-6 lg:px-8" id="home">
            <div class="w-full lg:flex py-16 lg:py-20 px-10 lg:px-14  xl:px-32 space-y-10">
                <div class="w-4/5 lg:w-full flex justify-center items-center pe-10">
                    <div class="text-center w-full">
                        <h1 class="text-5xl font-bold text-sky-900 lg:text-6xl ">Berlatih bersama mentor yang telah membantu ratusan siswa mencapai nilai tinggi!</h1>

                        <div class="mt-6 text-lg  text-gray-600">Dibimbing oleh guru dan mentor berpengalaman di bidang UTBK, kami hadirkan tenaga pengajar terbaik untuk mendukung persiapanmu. Setiap pengajar telah terlatih dan memahami pola soal UTBK, sehingga kamu bisa lebih siap menghadapi ujian.</div>

                        {{-- <div class="mt-6 inline-flex items-center gap-x-6">
                            <x-primary-link href="{{ route('login') }}" class="py-1 px-2 rounded-full">
                                Login
                            </x-primary-link>
                            
                        </div> --}}
                    </div>
                </div>
                {{-- <div class="w-full lg:w-1/2 px-0 lg:px-8 mx-auto my-auto">
                    <div class="overflow-hidden">
                        <img src="{{ asset('assets/Mathematics-rafiki.png') }}" alt="" class=" min-w-10">
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

    <div class="bg-white">
        <div class="">

            <div class="py-24" id="features">
                <div class="mt-6 px-4 sm:px-20 lg:px-28">
                    <div class="w-full flex flex-wrap justify-center">
                        @foreach ($mentors as $mentor)
                            <div class="p-4 lg:p-6 max-w-xl w-full lg:w-1/2">
                                <div 
                                    x-data="{ open: false }" 
                                    class="bg-white shadow-xl rounded-lg overflow-hidden p-4"
                                >
                                    <div class="flex">
                                        <div class="relative w-40 rounded-lg bg-sky-50">
                                            <div class="absolute right-0 m-3 h-3 w-3">
                                                <span class="relative flex h-4 w-4">
                                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75"></span>
                                                    <span class="relative inline-flex rounded-full h-4 w-4 bg-sky-500"></span>
                                                </span>
                                            </div>
                                            <img class=" h-auto w-full rounded-lg" src="{{ Storage::url($mentor->avatar ?? '') }}" alt="" />
                                        </div>
                                        <div class="p-4">
                                            <h2 class="text-3xl capitalize text-sky-900 font-bold mb-3">
                                                {{ $mentor->name ?? '' }}
                                            </h2>
                                            
                                            <span class=" bg-sky-200 rounded-lg font-semibold text-sky-700 border-sky-600 border py-3 px-6">Mentor {{ $mentor->mentor->teach ?? '' }}</span>

                                            <p class="text-sm text-gray-600 mt-4">
                                                Lulusan
                                                <br>
                                                <span class="text-lg font-semibold text-gray-700">{{ $mentor->mentor->data_universitas->nama_universitas ?? '' }}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div x-show="open" class="p-4 pb-0 space-y-2 text-gray-600" x-collapse>
                                        <div>
                                            <div class="text-sm">
                                                {!! $mentor->mentor->description !!}
                                            </div>
                                        </div>
                                        <div>
                                            <h3 class="text-gray-700 font-semibold">
                                                Pencapaian
                                            </h3>
                                            <div class="space-y-1 my-2">
                                                @foreach ($mentor->mentor->achievements as $achiev)
                                                    <div class="flex items-center space-x-3 text-gray-500 font-medium text-sm">
                                                        <!-- Icon -->
                                                        <div class="p-1 bg-sky-400 rounded-full">
                                                            <svg class="flex-shrink-0 w-4 h-4 text-gray-100 dark:text-gray-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                                        </div>
                                                        <span>{{ $achiev->achievement }}</span>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mx-auto w-1/2 mt-4">
                                        <button 
                                            @click="open = !open" 
                                            class="w-full bg-sky-500 rounded-lg text-white font-semibold py-2 px-4 hover:bg-sky-600 transition"
                                        >
                                            <span x-text="open ? 'Tampilkan Sedikit' : 'Tampilkan Semua'"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection
