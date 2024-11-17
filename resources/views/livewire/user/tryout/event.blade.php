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
                        <a href="#" class="ml-1 text-gray-50 hover:text-sky-200 md:ml-2 dark:text-gray-300 dark:hover:text-white">Tryout Event</a>
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
            {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
            <div class=" mt-10">
                <div class="flex items-center gap-2 mb-4">
                    <div>
                        <span class="relative flex h-4 w-4">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-4 w-4 bg-sky-500"></span>
                        </span>
                    </div>
                    <h1 class="text-xl text-gray-700 font-semibold">Tryout Event Live</h1>
                </div>
                <!-- Package Grid Section -->
                <section class="grid grid-cols-1 space-y-12 md:space-y-0 md:grid-cols-2 lg:grid-cols-3 md:gap-x-8 md:gap-8">
                    {{-- @dd($purchasedPackages) --}}
                    @forelse ($ongoing as $going)
                        <div class="">
                            <div class="border rounded-lg shadow hover:shadow-lg transition-all duration-200">
                                <div class="px-6 py-3 rounded-t-lg bg-gradient-to-tr from-sky-400 to-sky-500">
                                    <h4 class="font-semibold text-white">ONGOING</h4>
                                </div>
                                <div class="py-4 px-6 bg-white font-semibold">
                                    <div class="flex justify-between align-middle pb-4">
                                        <h1 class="my-auto font-semibold font-gray-900 text-3xl w-fit">
                                            {{$going->name}}
                                        </h1>
                                    </div>
                                    <div class="space-y-2">

                                        <div class="flex items-center text-gray-600">
                                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                            </svg>
                                            <span>{{ $going->question->count() }} Soal</span>
                                        </div>
                                        @if ($going->is_together == 'together')
                                            <div class="flex items-center text-gray-600">
                                                <div class="">
                                                    <span class="mx-1"><i class="fa-solid fa-calendar"></i></span> {{ \Carbon\Carbon::parse($going->start_date)->format('j F Y') }} - {{ \Carbon\Carbon::parse($going->end_date)->format('j F Y') }}</div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="pb-5 px-6 pt-1 bg-white rounded-b-lg">
                                    <a href="{{ route('user.tryouts.event.item', $going->id) }}" class="w-full">
                                        <button class="text-white font-semibold bg-gradient-to-tr from-sky-400 to-sky-500 hover:bg-sky-700 w-full p-3 rounded-lg">
                                            Kerjakan
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
                            <p class="mt-1 text-sm text-gray-800">Belum ada Tryout yang sedang berjalan</p>
                            <div class="mt-6">
                                <a href="{{ route('user.packages') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-sky-500 hover:bg-sky-600">
                                    Lihat Paket Tersedia
                                </a>
                            </div>
                        </div>
                    @endforelse
                </section>
            </div>
            <div class="mx-5 mt-10">
                <div class="flex items-center gap-2 mb-4">
                    <div>
                        <span class="relative flex h-4 w-4">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-rose-400 opacity-40"></span>
                            <span class="relative inline-flex rounded-full h-4 w-4 bg-rose-500"></span>
                        </span>
                    </div>
                    <h1 class="text-xl text-gray-700 font-semibold">Tryout Upcoming</h1>
                </div>
                <!-- Package Grid Section -->
                <section class="grid grid-cols-1 space-y-12 md:space-y-0 md:grid-cols-2 lg:grid-cols-3 md:gap-x-8 md:gap-8">
                    {{-- @dd($purchasedPackages) --}}
                    @forelse ($comingsoon as $soon)
                        <div class="">
                            <div class="border rounded-lg shadow hover:shadow-lg transition-all duration-200">
                                <div class="px-6 py-3 rounded-t-lg bg-rose-200 font-semibold text-rose-600">
                                    <h4 class="">COMING SOON</h4>
                                </div>
                                <div class="py-4 px-6 bg-white rounded-b-lg font-semibold">
                                    <div class="flex justify-between align-middle pb-4">
                                        <h1 class="my-auto font-semibold font-gray-900 text-3xl w-fit">
                                            {{$soon->name}}
                                        </h1>
                                    </div>
                                    <div class="space-y-2">

                                        <div class="flex items-center text-gray-600">
                                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                            </svg>
                                            <span>{{ $soon->question->count() }} Soal</span>
                                        </div>
                                        @if ($soon->is_together == 'together')
                                            <div class="flex items-center text-gray-600">
                                                <div class="">
                                                    <span class="mx-1"><i class="fa-solid fa-calendar"></i></span> {{ \Carbon\Carbon::parse($soon->start_date)->format('j F Y') }} - {{ \Carbon\Carbon::parse($soon->end_date)->format('j F Y') }}</div>
                                            </div>
                                        @endif
                                    </div>
                                    {{-- <div class="border-2 rounded-lg border-sky-400 py-2 px-3 w-fit font-bold">
                                        <span class="text-sky-400 border-e-2 border-sky-400 w-1/2 text-center"><i class="fa-solid fa-calendar"></i> 14 Juli 2024</span>
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
                            <div class="mt-6">
                                <a href="{{ route('user.packages') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-sky-500 hover:bg-sky-600">
                                    Lihat Paket Tersedia
                                </a>
                            </div>
                        </div>
                    @endforelse
                </section>
            </div>
            <div class="mx-5 mt-10">
                <div class="flex items-center gap-2 mb-4">
                    <div>
                        <span class="relative flex h-4 w-4">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-slate-400 opacity-40"></span>
                            <span class="relative inline-flex rounded-full h-4 w-4 bg-slate-500"></span>
                        </span>
                    </div>
                    <h1 class="text-xl text-gray-700 font-semibold">Tryout Past</h1>
                </div>

                <!-- Package Grid Section -->
                <section class="grid grid-cols-1 space-y-12 md:space-y-0 md:grid-cols-2 lg:grid-cols-3 md:gap-x-8 md:gap-8">
                    {{-- @dd($purchasedPackages) --}}
                    @forelse ($finished as $finish)
                        <div class="">
                            <div class="border rounded-lg shadow hover:shadow-lg transition-all duration-200">
                                <div class="px-6 py-3 rounded-t-lg bg-slate-200 font-semibold text-slate-600">
                                    <h4 class="">FINISHED</h4>
                                </div>
                                <div class="py-4 px-6 bg-white rounded-b-lg font-semibold">
                                    <div class="flex justify-between align-middle pb-4">
                                        <h1 class="my-auto font-semibold font-gray-900 text-3xl w-fit">
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
                                                    <span class="mx-1"><i class="fa-solid fa-calendar"></i></span> {{ \Carbon\Carbon::parse($finish->start_date)->format('j F Y') }} - {{ \Carbon\Carbon::parse($finish->end_date)->format('j F Y') }}</div>
                                            </div>
                                        @endif
                                    </div>
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
                            <div class="mt-6">
                                <a href="{{ route('user.packages') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-sky-500 hover:bg-sky-600">
                                    Lihat Paket Tersedia
                                </a>
                            </div>
                        </div>
                    @endforelse
                </section>
            </div>
        </div>
    </div>
</div>
