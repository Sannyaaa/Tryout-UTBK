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
                        <a href="#" class="ml-1 text-gray-50 hover:text-sky-200 md:ml-2 dark:text-gray-300 dark:hover:text-white">Paket</a>
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
            @if ($todayClasses->isNotEmpty())
                @foreach ($todayClasses as $class)
                    {{-- @if (\Carbon\Carbon::now() > \Carbon\Carbon::parse($class->start_time) ) --}}
                        <div id="alert-additional-content-1" class="p-4 mb-4 text-sky-800 border border-sky-300 rounded-lg bg-sky-50 dark:bg-gray-800 dark:text-sky-400 dark:border-sky-800" role="alert">
                            <div class="flex items-center">
                                <div class="h-fit">
                                    <svg class="flex-shrink-0 w-10 h-10 me-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                    </svg>
                                    <span class="sr-only">Info</span>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold">Pemberitahuan Kelas Bimbel</h3>
                                    <div class="mt-2 mb-4 text-sm">
                                        <p>Hai {{ Auth::user()->name }}, mau memberi tahu kalau kamu hari ini ada kelas dengan informasi sebagai berikut :</p>
                                        Nama Kelas : <span class=" capitalize">{{ $class->name }}</span>
                                        <br>
                                        Waktu : <span class=" capitalize">{{ \Carbon\Carbon::parse($class->start_time)->format('H:i') }} s/d Selesai</span>
                                    </div>
                                    <div class="flex">
                                        <a href="{{ route('user.my-bimbel', $class->bimbel_id) }}" class="text-white bg-sky-500 hover:bg-sky-600 focus:ring-4 focus:outline-none focus:ring-sky-200 font-medium rounded-lg text-xs px-3 py-1.5 me-2 text-center inline-flex items-center dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800">
                                            <svg class="me-2 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
                                                <path d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z"/>
                                            </svg>
                                            Lihat Kelas
                                        </a>
                                        <button type="button" class="text-sky-800 bg-transparent border border-sky-800 hover:bg-sky-800 hover:text-white focus:ring-4 focus:outline-none focus:ring-sky-200 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-sky-600 dark:border-sky-600 dark:text-sky-400 dark:hover:text-white dark:focus:ring-sky-800" data-dismiss-target="#alert-additional-content-1" aria-label="Close">
                                            X Tutup
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {{-- @endif --}}
                @endforeach
            @endif
        </div>

        <div>
            <!-- Filter Section -->
            <div class="flex items-center space-x-4 mb-6 font-semibold">
                <button wire:click="$set('selectedType', 'all')" 
                        class="px-4 py-2 rounded-lg transition-all shadow hover:shadow-lg {{ $selectedType === 'all' ? 'bg-sky-500 text-white' : 'bg-white text-gray-700' }}">
                    Semua Paket
                </button>
                <button wire:click="$set('selectedType', 'tryout')"
                        class="px-4 py-2 rounded-lg transition-all shadow hover:shadow-lg {{ $selectedType === 'tryout' ? 'bg-sky-500 text-white' : 'bg-white text-gray-700' }}">
                    Tryout
                </button>
                <button wire:click="$set('selectedType', 'bimbel')"
                        class="px-4 py-2 rounded-lg transition-all shadow hover:shadow-lg {{ $selectedType === 'bimbel' ? 'bg-sky-500 text-white' : 'bg-white text-gray-700' }}">
                    Bimbel
                </button>
            </div>

            <!-- Package Grid Section -->
            <section class="grid grid-cols-1 space-y-12 md:space-y-0 md:grid-cols-2 lg:grid-cols-3 md:gap-x-8 md:gap-8">
                {{-- @dd($purchasedPackages) --}}
                @forelse ($purchasedPackages as $package)
                    <div class="flex flex-col max-w-lg">
                        <!-- Tryout Package Card -->
                        {{-- @dd($package) --}}
                        @if($package->tryout_id)
                            <div class="">
                                <div class="border rounded-lg shadow hover:shadow-lg transition-all duration-200">
                                    <div class="px-6 py-3 rounded-t-lg bg-gradient-to-tr from-sky-400 to-sky-500">
                                        <h4 class="font-semibold text-white">Tryout {{ $package->tryout->is_together == 'together' ? 'Serentak' : '' }}</h4>
                                    </div>
                                    <div class="py-4 px-6 bg-white font-semibold">
                                        <div class="flex justify-between align-middle pb-3">
                                            <h1 class="my-auto font-bold text-gray-700 text-3xl w-fit">
                                                {{$package->tryout->name}}
                                            </h1>
                                        </div>
                                        <div class="space-y-2">

                                            <div class="flex items-center text-gray-600 font-medium">
                                                <span class="text-sky-500 text-lg mx-1">
                                                    <i class="fa-solid fa-file-circle-question"></i>
                                                </span>
                                                Jumlah Soal : <span class="font-semibold ms-1">{{ $package->tryout->question->count() }} Soal</span>
                                            </div>
                                            
                                            @if ($package->tryout->is_together == 'together')
                                                <div class="flex items-center text-gray-600">
                                                    <div class="">
                                                        <span class="mx-1 text-sky-500"><i class="fa-solid fa-calendar-days"></i></span> {{ \Carbon\Carbon::parse($package->tryout->start_date)->format('j F Y') }} - {{ \Carbon\Carbon::parse($package->tryout->end_date)->format('j F Y') }}</div>
                                                </div>
                                            @endif
                                            <div class=" text-sky-500 text-sm italic">
                                                {{ $package->tryout->is_together == 'together' ? '* Kamu hanya bisa mengerjakan 1 kali saja' : '* Kamu bisa mengerjakan berulang kali' }}
                                            </div>
                                        </div>
                                        {{-- <div class="border-2 rounded-lg border-sky-400 py-2 px-3 w-fit font-bold">
                                            <span class="text-sky-400 border-e-2 border-sky-400 w-1/2 text-center"><i class="fa-solid fa-calendar-days"></i> 14 Juli 2024</span>
                                            <hr class="border border-sky-400">
                                            <span class="text-sky-400"><i class="fa-solid fa-user-group"></i> 20 Peserta</span>
                                        </div> --}}
                                    </div>
                                    <div class="pb-5 px-6 pt-1 bg-white rounded-b-lg">
                                        <a href="#" class="w-full">
                                            <button class="text-white font-semibold bg-gradient-to-tr from-sky-400 to-sky-500 hover:bg-sky-700 w-full p-3 rounded-lg">
                                                Kerjakan
                                                <i class="fa-solid fa-arrow-right-long"></i>
                                            </button>
                                        </a>
                                    </div>
                                    {{-- <div class="flex justify-between items-center">
                                        <x-primary-link href="#
                                        {{ route('user.bimbel.material', $package->id) }}
                                        " 
                                                    class="bg-green-500 hover:bg-green-600">
                                            Lihat Materi
                                        </x-primary-link>
                                        <a href="#
                                        {{ route('user.bimbel.schedule', $package->id) }}
                                        " 
                                        class="text-green-500 hover:text-green-700 font-medium">
                                            Jadwal Bimbel
                                        </a>
                                    </div> --}}
                                </div>
                            </div>
                        <!-- Bimbel Package Card -->
                        @else
                            <div class="">
                                <div class="border rounded-lg shadow hover:shadow-lg transition-all duration-200">
                                    <div class="px-4 py-3 rounded-t-lg bg-gradient-to-tr from-sky-400 to-sky-500">
                                        <h4 class="font-semibold text-white">Bimbel</h4>
                                    </div>
                                    <div class="py-4 px-6 bg-white font-semibold">
                                        <div class="flex justify-between align-middle pb-3">
                                            <h1 class="my-auto font-semibold text-gray-700 text-3xl w-fit">
                                                {{$package->bimbel->name}}
                                            </h1>
                                        </div>
                                        <div class="space-y-2">
                                            
                                            <div class="flex items-center text-gray-600">
                                                {{-- <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                                </svg> --}}
                                                <div>
                                                    <span class="mx-1 text-sky-500"><i class="fa-solid fa-chalkboard-user"></i></span> Jumlah Kelas : {{ $package->bimbel->classBimbel->count() }} Kelas
                                                </div>
                                            </div>
                                            <div class="flex items-center text-gray-600">
                                                <div>
                                                    <span class="mx-1 text-sky-500"><i class="fa-solid fa-users"></i></i></span> Jumlah Peserta : {{ $package->orders->count() }} Peserta
                                                </div>
                                            </div>
                                            <div class="flex items-center text-gray-600">
                                                <div class="">
                                                    <span class="mx-1 text-sky-500"><i class="fa-solid fa-calendar-days"></i></span> {{ \Carbon\Carbon::parse($package->bimbel->classBimbel->first()->date)->format('j F Y') }} - {{ \Carbon\Carbon::parse($package->bimbel->classBimbel->last()->date)->format('j F Y') }}</div>
                                            </div>
                                        </div>
                                        {{-- <div class="border-2 rounded-lg border-sky-400 py-2 px-3 w-fit font-bold">
                                            <span class="text-sky-400 border-e-2 border-sky-400 w-1/2 text-center"><i class="fa-solid fa-calendar-days"></i> 14 Juli 2024</span>
                                            <hr class="border border-sky-400">
                                            <span class="text-sky-400"><i class="fa-solid fa-user-group"></i> 20 Peserta</span>
                                        </div> --}}
                                    </div>
                                    <div class="pb-5 px-6 pt-1 bg-white rounded-b-lg">
                                        <a href="{{ route('user.my-bimbel', $package->id) }}" class="w-full">
                                            <button class="text-white font-semibold bg-gradient-to-tr from-sky-400 to-sky-500 hover:bg-sky-700 w-full p-3 rounded-lg">
                                                Lihat Kelas
                                                <i class="fa-solid fa-arrow-right-long"></i>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="text-gray-900 bg-white border-2 border-green-200 rounded-lg shadow-sm hover:shadow-lg transition-shadow duration-300">
                                <div class="relative aspect-video overflow-hidden bg-cover align-middle p-2">
                                    <img class="object-cover object-center w-full h-full rounded-md" 
                                        src="{{ $package->image != null ? Storage::url($package->image) : asset('build/assets/bimbel-default.jpg') }}" 
                                        alt="bimbel package" />
                                    <span class="absolute top-2 right-2 py-1 px-4 bg-green-500 text-white rounded-lg font-semibold">
                                        Bimbel
                                    </span>
                                </div>
                                <div class="px-5 py-4">
                                    <h5 class="text-xl font-bold text-green-900 mb-2">{{ $package->name }}</h5>
                                    <div class="space-y-2 mb-4">
                                        @foreach($package->benefits as $benefit)
                                            <div class="flex items-center text-gray-600">
                                                <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>
                                                <span>{{ $benefit->name }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                    
                                </div>
                            </div> --}}
                        @endif
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada paket yang dibeli</h3>
                        <p class="mt-1 text-sm text-gray-500">Mulai beli paket untuk mengakses materi pembelajaran.</p>
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
<!-- Pricing Cards -->
