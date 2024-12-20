<div class="p-4 mt-12">
    <div class="mx-10">
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
                        <a href="#" class="ml-1 text-gray-50 hover:text-sky-200 md:ml-2 dark:text-gray-300 dark:hover:text-white">Tryout Serentak</a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-50" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 text-gray-50 md:ml-2 dark:text-gray-500" aria-current="page">Semua Tryout</span>
                        </div>
                    </li>
                    </ol>
                </nav>
                {{-- <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">All Bimbels</h1> --}}
            </div>
        </div>
        <div>
            <div class=" mt-10">
                <div class="flex items-center gap-2 mb-4">
                    <div>
                        <span class="relative flex h-4 w-4">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-4 w-4 bg-sky-500"></span>
                        </span>
                    </div>
                    <h1 class="text-xl text-gray-700 font-semibold">Tryout Sedang Berlangsung</h1>
                </div>
                <!-- Package Grid Section -->
                <section class="grid grid-cols-1 space-y-12 md:space-y-0 lg:grid-cols-2 xl:grid-cols-3 md:gap-x-8 md:gap-8">
                    @if ($ongoing)
                        
                        <div class="w-full col-span-3 h-full bg-gradient-to-tr from-sky-400 to-sky-500 text-white px-16 py-10 rounded-lg">
                            <div>
                                {{-- <div class="flex items-center gap-2 mb-2">
                                    <div>
                                        <span class="relative flex h-5 w-5">
                                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-75"></span>
                                            <span class="relative inline-flex rounded-full h-5 w-5 bg-white"></span>
                                        </span>
                                    </div>
                                    <h1 class="text-xl font-semibold uppercase">Tryout Sedang Berlangsung</h1>
                                </div> --}}
                                <div>
                                    <h2 class="font-extrabold text-3xl lg:text-5xl">{{ $ongoing->name }}</h2>
                                    <div class="space-x-12 flex my-3">
                                        <div class="md:flex space-y-4 md:space-y-0 gap-12">
                                            <div class="">
                                                <h3>Tanggal Mulai : </h3>
                                                <div class="font-semibold">
                                                    <span class="text-lg mx-1">
                                                        <i class="fa-solid fa-calendar-days"></i>
                                                    </span>
                                                    <span>{{ \Carbon\Carbon::parse($ongoing->start_date)->format('j F Y') }}</span>
                                                </div>
                                            </div>
                                            <div class="">
                                                <h3>Tanggal Berakhir : </h3>
                                                <div class="font-semibold">
                                                    <span class="text-lg mx-1">
                                                        <i class="fa-solid fa-calendar-days"></i>
                                                    </span>
                                                    <span>{{ \Carbon\Carbon::parse($ongoing->end_date)->format('j F Y') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="md:flex space-y-4 md:space-y-0 gap-12">
                                            <div class="">
                                                <h3>Total Peserta : </h3>
                                                <div class="font-semibold">
                                                    <span class="text-lg mx-1">
                                                        <i class="fa-solid fa-users"></i>
                                                    </span>
                                                    <span>{{ $participant }} Perserta</span>
                                                </div>
                                            </div>
                                            <div class="">
                                                <h3>Jumlah Soal : </h3>
                                                <div class="font-semibold">
                                                    <span class="text-lg mx-1">
                                                        <i class="fa-solid fa-file-circle-question"></i>
                                                    </span>
                                                    <span>{{ $ongoing->question->count() }} Soal</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 inline-block">
                                    <a href="{{ route('user.tryouts.event.item',$ongoing->id) }}" class="bg-white text-sky-400 font-semibold rounded-lg py-3 px-6">
                                        Lihat Tryout
                                    </a>
                                </div>
                            </div>
                        </div>


                    @else
                        <div class="col-span-full text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                            </svg>
                            <p class="mt-1 text-sm text-gray-800">Belum ada Tryout yang sedang berjalan</p>
                            {{-- <div class="mt-6">
                                <a href="#" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-sky-500 hover:bg-sky-600">
                                    
                                </a>
                            </div> --}}
                        </div>
                    @endif
                </section>
            </div>
            <div class=" mt-10">
                <div class="flex items-center gap-2 mb-4">
                    
                    <h1 class="text-xl text-gray-700 font-semibold">Tryout Akan Datang</h1>
                </div>
                <!-- Package Grid Section -->
                <section class="grid grid-cols-1 space-y-12 md:space-y-0 lg:grid-cols-2 xl:grid-cols-3 md:gap-x-8 md:gap-8">
                    {{-- @dd($purchasedPackages) --}}
                    @forelse ($comingsoon as $soon)
                        <div class="">
                            <div class="border rounded-lg shadow hover:shadow-lg transition-all duration-200">
                                <div class="px-6 py-3 gap-2 flex items-center rounded-t-lg bg-rose-200 font-bold text-rose-600">
                                    <div>
                                        <span class="relative flex h-4 w-4">
                                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-rose-400 opacity-40"></span>
                                            <span class="relative inline-flex rounded-full h-4 w-4 bg-rose-500"></span>
                                        </span>
                                    </div>
                                    <h4 class="">COMING SOON</h4>
                                </div>
                                <div class="py-4 px-6 bg-white rounded-b-lg font-semibold">
                                    <div class="flex justify-between align-middle pb-3">
                                        <h1 class="my-auto font-semibold text-gray-900 text-3xl w-fit">
                                            {{$soon->name}}
                                        </h1>
                                    </div>
                                    <div class="space-y-2">
                                        @if ($soon->is_together == 'together')
                                            <div class="flex items-center text-gray-600">
                                                <div class="">
                                                    <span class="mx-1"><i class="fa-solid fa-calendar-days"></i></span> {{ \Carbon\Carbon::parse($soon->start_date)->format('j F Y') }} - {{ \Carbon\Carbon::parse($soon->end_date)->format('j F Y') }}</div>
                                            </div>
                                        @endif
                                    </div>
                                    {{-- <div class="border-2 rounded-lg border-sky-400 py-2 px-3 w-fit font-bold">
                                        <span class="text-sky-400 border-e-2 border-sky-400 w-1/2 text-center"><i class="fa-solid fa-calendar-days"></i> 14 Juli 2024</span>
                                        <hr class="border border-sky-400">
                                        <span class="text-sky-400"><i class="fa-solid fa-user-group"></i> 20 Peserta</span>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                            </svg>
                            <p class="mt-1 text-sm text-gray-800">Belum ada Tryout yang akan datang</p>
                            {{-- <div class="mt-6">
                                <a href="{{ route('packages') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-sky-500 hover:bg-sky-600">
                                    Lihat Paket Tersedia
                                </a>
                            </div> --}}
                        </div>
                    @endforelse
                </section>
            </div>
            <div class=" mt-10">
                <div class="flex items-center gap-2 mb-4">
                    
                    <h1 class="text-xl text-gray-700 font-semibold">Tryout Sudah Selesai</h1>
                </div>

                <!-- Package Grid Section -->
                <section class="grid grid-cols-1 space-y-12 md:space-y-0 lg:grid-cols-2 xl:grid-cols-3 md:gap-x-8 md:gap-8">
                    {{-- @dd($purchasedPackages) --}}
                    @forelse ($finished as $finish)
                        <div class="">
                            <div class="border rounded-lg shadow hover:shadow-lg transition-all duration-200">
                                <div class="px-6 py-3 gap-2 flex items-center rounded-t-lg bg-slate-300 font-bold text-slate-600">
                                    <div>
                                        <span class="relative flex h-4 w-4">
                                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-slate-400 opacity-40"></span>
                                            <span class="relative inline-flex rounded-full h-4 w-4 bg-slate-500"></span>
                                        </span>
                                    </div>
                                    <h4 class="">BERAKHIR</h4>
                                </div>
                                <div class="py-4 px-6 bg-white rounded-b-lg font-semibold">
                                    <div class="flex justify-between align-middle pb-3">
                                        <h1 class="my-auto font-semibold text-gray-900 text-3xl w-fit">
                                            {{$finish->name}}
                                        </h1>
                                    </div>
                                    <div class="space-y-2">

                                        <div class="flex items-center text-gray-600">
                                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                            </svg>
                                            <span>{{ $finish->question->count() }} Soal</span>
                                        </div>
                                        @if ($finish->is_together == 'together')
                                            <div class="flex items-center text-gray-600">
                                                <div class="">
                                                    <span class="mx-1"><i class="fa-solid fa-calendar-days"></i></span> {{ \Carbon\Carbon::parse($finish->start_date)->format('j F Y') }} - {{ \Carbon\Carbon::parse($finish->end_date)->format('j F Y') }}</div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="pb-5 px-6 pt-1 bg-white rounded-b-lg">
                                    <a href="{{ route('user.tryouts.event.item', $finish->id) }}" class="w-full">
                                        <button class="text-slate-600 font-semibold bg-slate-300 hover:bg-slte-500 w-full p-3 rounded-lg">
                                            Lihat Detail
                                            <i class="fa-solid fa-arrow-right-long"></i>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                            </svg>
                            <p class="mt-1 text-sm text-gray-800">Tidak ada Tryout yang sudah berakhir</p>
                        </div>
                    @endforelse
                </section>
            </div>
        </div>
    </div>
</div>
