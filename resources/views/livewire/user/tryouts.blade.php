<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
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
                            <a href="#" class="ml-1 text-gray-50 hover:text-sky-200 md:ml-2 dark:text-gray-300 dark:hover:text-white">Tryout</a>
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
            <div class="space-y-8">
                <div>
                    <h1 class="text-2xl font-semibold text-gray-600 mb-4">Tryout Terbaru</h1>
                    <div class="grid grid-cols-1 space-y-12 md:space-y-0 md:grid-cols-2 lg:grid-cols-3 md:gap-x-8 md:gap-8">
                        @foreach  ($tryouts as $item)
                            <div class="">
                                <div class="border rounded-lg shadow hover:shadow-lg transition-all duration-200 overflow-hidden">
                                    <div class=" bg-gradient-to-tr from-sky-400 to-sky-500 text-white font-bold uppercase py-3 px-6">
                                        Gratis
                                    </div>
                                    <div class="py-4 px-6 bg-white font-semibold">
                                        <div class="flex justify-between align-middle pb-3">
                                            <h1 class="my-auto font-bold text-slate-600 text-3xl w-fit">
                                                {{$item->name}}
                                            </h1>
                                        </div>
                                        <div class="space-y-2">

                                            <div class="flex items-center text-gray-600 font-medium">
                                                <span class="text-sky-500 text-xl me-2">
                                                    <i class="fa-solid fa-file-circle-question"></i>
                                                </span>
                                                Jumlah Soal : <span class="font-semibold ms-1">{{ $item->question->count() }} Soal</span>
                                            </div>
                                            <div class=" text-sky-500 text-sm italic">
                                                * Kamu bisa mencoba berulang kali.
                                            </div>
                                            @if ($item->is_together == 'together')
                                                <div class="flex items-center text-gray-600">
                                                    <div class="">
                                                        <span class="mx-1"><i class="fa-solid fa-calendar-days"></i></span> {{ \Carbon\Carbon::parse($item->start_date)->format('j F Y') }} - {{ \Carbon\Carbon::parse($item->end_date)->format('j F Y') }}</div>
                                                </div>
                                            @endif
                                        </div>
                                        {{-- <div class="border-2 rounded-lg border-sky-400 py-2 px-3 w-fit font-bold">
                                            <span class="text-sky-400 border-e-2 border-sky-400 w-1/2 text-center"><i class="fa-solid fa-calendar-days"></i> 14 Juli 2024</span>
                                            <hr class="border border-sky-400">
                                            <span class="text-sky-400"><i class="fa-solid fa-user-group"></i> 20 Peserta</span>
                                        </div> --}}
                                    </div>
                                    <div class="pb-5 px-6 bg-white">
                                        <a href="{{ route('user.tryouts.item',$item->id) }}" class="w-full">
                                            <button class="text-white font-semibold bg-gradient-to-tr from-sky-400 to-sky-500 hover:bg-sky-700 w-full p-3 rounded-lg">
                                                Lihat Detail
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
                        @endforeach
                    </div>
                </div>
                <div>
                    <h1 class="text-2xl font-semibold text-gray-600 mb-4">Paket Tryout</h1>
                    <div class="grid grid-cols-1 space-y-12 md:space-y-0 md:grid-cols-2 lg:grid-cols-3 md:gap-x-8 md:gap-8">
                        {{-- @dd($packages) --}}
                        @foreach ($packages as $package)
                            <div class="flex flex-col max-w-lg">
                                <div class="text-gray-900 bg-white hover:shadow-lg transition-all border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                                    <div class="relative aspect-video overflow-hidden bg-cover align-middle p-2">
                                        <img class="object-cover object-center w-full h-full rounded-md" 
                                            src="{{ $package->image != null ? Storage::url($package->image) : asset('build/assets/Photo-Image-Icon-Graphics-10388619-1-1-580x386.jpg') }}" 
                                            alt="package image" />
                                        <span class="relative bottom-10 -right-3 py-1 px-4 bg-sky-500 border-sky-400 border-2 text-white rounded-lg font-semibold">
                                            {{ $package->tryout_id != null ? 'Tryout' : 'Bimbel' }}
                                        </span>
                                    </div>
                                    <div class="px-5 py-2">
                                        <div>
                                            <a href="{{ route('user.package.item', $package->id) }}">
                                                <h5 class="text-3xl font-bold hover:underline text-gray-700 dark:text-white uppercase">
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
                                            <x-primary-link href="{{ route('user.package.item', $package->id) }}">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- @push('css') --}}