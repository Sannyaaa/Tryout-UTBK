<div class="p-4 mt-12">
    <div class=" md:mx-10">
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
                        <a href="#" class="ml-1 text-gray-50 hover:text-sky-200 md:ml-2 dark:text-gray-300 dark:hover:text-white">Tryout {{ $tryout->is_together == 'together' ? 'Serentak' : '' }}</a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-50" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 text-gray-50 md:ml-2 dark:text-gray-500" aria-current="page">{{ $tryout->name }}</span>
                        </div>
                    </li>
                    </ol>
                </nav>
                {{-- <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">All Bimbels</h1> --}}
            </div>
        </div>
        
        <div class="py-10 px-7 bg-white rounded-md shadow lg:flex">
            <div class=" w-full xl:w-5/12 pe-10">
                <h1 class="text-4xl mb-2 font-bold text-gray-700">{{$tryout->name}}</h1>
                <div class="text-gray-600">
                    {!! $tryout->description !!}
                </div>

                
                <div class="my-4 gap-4 flex flex-wrap">
                    <!-- Modal toggle -->
                    <button data-modal-target="testimonial-modal" data-modal-toggle="testimonial-modal" class="block text-white bg-sky-500 hover:bg-sky-600 focus:ring-4 focus:outline-none focus:ring-sky-300 font-semibold rounded-lg px-5 py-2.5 text-center dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800" type="button">
                        Testimoni
                    </button>

                    <div 
                        wire:ignore.self 
                        id="testimonial-modal" 
                        tabindex="-1" 
                        aria-hidden="true" 
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full"
                    >
                        <div class="relative p-4 w-full max-w-xl max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        Tambah Testimoni
                                    </h3>
                                    <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="testimonial-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                    </button>
                                </div>
                                
                                <div class="p-4 md:p-5">
                                    @if (session()->has('message'))
                                        <div class="mb-4 text-sm text-sky-600 bg-sky-50 px-3 py-2 rounded-lg dark:text-sky-400">
                                            {{ session('message') }}
                                        </div>
                                    @endif
                                    <form wire:submit.prevent="saveTestimonial">
                                        <div class="mb-4">
                                            <textarea 
                                                wire:model="content" 
                                                rows="4" 
                                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                                                placeholder="Tulis testimoni Anda..."
                                            ></textarea>
                                            @error('content')
                                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="flex justify-between space-x-2">
                                            <button 
                                                type="button" 
                                                data-modal-hide="testimonial-modal" 
                                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
                                            >
                                                Batal
                                            </button>
                                            <button 
                                                type="submit" 
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                            >
                                                Simpan
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($tryout->is_together == 'together')
                        {{-- <div>
                            <h2 class="text-2xl my-3 font-semibold text-gray-700">Lihat Statistik atau Leaderboard</h2>
                            <span class="mx-1 text-sky-500"><i class="fa-solid fa-calendar-days"></i></span> {{ \Carbon\Carbon::parse($tryout->start_date)->format('j F Y') }} - {{ \Carbon\Carbon::parse($tryout->end_date)->format('j F Y') }}
                        </div> --}}
                        @if ($results->isNotEmpty())
                                <x-secondary-link href="{{ route('user.tryouts.event.statistik', $tryout->id) }}" class="">
                                    <span class="flex justify-center items-center">
                                        <i class="fa-solid fa-chart-line me-2"></i> Statistik
                                    </span>
                                </x-secondary-link>
                                <x-secondary-link href="{{ route('user.tryouts.event.leaderboard', $tryout->id) }}" class="">
                                    <span class="flex justify-center items-center">
                                        <i class="fa-solid fa-ranking-star me-2"></i> Leaderboard
                                    </span>
                                </x-secondary-link>
                        @else
                            <span class="text-sm text-sky-600">* selesaikan semua untuk melihat statistik dan leaderboard</span>
                        @endif
                    @endif
                </div>

                <div>
                    @if (session()->has('message'))
                        <div class="mb-4 text-sm text-sky-600 bg-sky-50 px-3 py-2 rounded-md dark:text-sky-400">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>
            </div>
            <hr class="border h-100">
            <div class=" w-full xl:w-7/12"> 
                @foreach($categories as $item)
                    <div class="mb-5 border shadow rounded-lg overflow-hidden">
                        <h1 class="px-5 py-4 text-2xl font-bold bg-gradient-to-tr from-sky-400 to-sky-500 text-white">{{$item->name}}</h1>
                        @foreach($item->sub_categories as $sub_item)
                        <div class="py-2 border-y px-5 md:flex" style="width: 100%;">
                            <div class="w-full md:w-3/6">
                                <h3 class="font-semibold text-xl text-gray-700 mb-1">{{$sub_item->name}}</h3>
                                @if ($sub_item->duration)
                                    <span class="text-sky-500">
                                        <i class="fa-regular fa-clock"></i>
                                        <span class="me-2">{{$sub_item->duration}} Menit</span>
                                        {{-- <i class="fa-regular fa-file"></i> --}}
                                        {{-- <span></span> --}}
                                    </span>
                                @endif
                                <div class="flex items-center text-gray-600 font-medium">
                                    <span class="text-sky-500 me-1">
                                        <i class="fa-solid fa-file-circle-question"></i>
                                    </span>
                                    <span class="font-semibold ms-1">{{ $sub_item->totalQuestion ?? 0 }} Soal</span>
                                </div>
                            </div>
                            <div class="w-full my-3 md:w-3/6 md:px-5 md:mt-0 md:flex align-middle justify-end text-sky-500 gap-4">
                                @if ($tryout->is_together == 'together' )
                                    @if ($sub_item->is_completed == null)
                                        @if ( \Carbon\Carbon::today() > $tryout->end_date )
                                            <span class="text-rose-500 hover:text-rose-600 bg-rose-50 bg-opacity-50 px-4 py-2 border-2 text-sm border-rose-200 rounded-lg h-fit my-auto">
                                                * waktu pengerjaan sudah selesai
                                            </span>
                                        @else
                                            <x-primary-link href="{{ route('user.tryouts.instruction', [$tryoutId, $sub_item->id]) }}" class="flex items-center">
                                                <i class="fa-solid fa-circle-play"></i>&nbsp; Kerjakan
                                            </x-primary-link>
                                        @endif
                                    @else
                                        @if ( \Carbon\Carbon::today() > $tryout->end_date )
                                            <a href="{{ route('user.tryouts.event.results', $sub_item->is_completed->id) }}"    class="flex items-center">
                                                <button class="p-3 px-4 flex items-center text-white bg-sky-500 rounded-lg font-semibold">
                                                    <i class="fa-solid fa-circle-check"></i>&nbsp; Lihat Pemabahasan
                                                </button>
                                            </a>
                                        @else
                                            <span class="text-sky-500 hover:text-sky-600 bg-sky-50 bg-opacity-50 px-4 py-2 border-2 text-sm border-sky-200 rounded-lg h-fit my-auto">
                                                * tunggu tryout selesai untuk melihat pembahasan
                                            </span>
                                        @endif
                                    @endif
                                @else
                                    <div class="my-auto flex gap-2">
                                        <x-primary-link href="{{ route('user.tryouts.instruction', [$tryoutId, $sub_item->id]) }}" class="flex items-center ">
                                            <i class="fa-solid fa-circle-play"></i>&nbsp; Kerjakan
                                        </x-primary-link>
                                        @if ($sub_item->is_completed)
                                            <x-secondary-link href="{{ route('user.tryouts.history', [$tryoutId, $sub_item->id]) }}" class="">
                                                <i class="fa-solid fa-circle-check"></i>&nbsp;  Riwayat
                                            </x-secondary-link>
                                        @endif
                                    </div>
                                @endif
                                
                                {{-- <i class="my-auto me-2 fa-solid fa-circle-check"></i> <span class="my-auto">Selesai</span> --}}
                            </div>
                        </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@push('body-scripts')
    <script>
        window.addEventListener('close-modal', () => {
            const closeButton = document.querySelector('[data-modal-hide="testimonial-modal"]');
            if (closeButton) {
                closeButton.click(); // Klik tombol untuk menutup modal
            }
        });
    </script>
@endpush
