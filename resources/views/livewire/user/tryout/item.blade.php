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
            <div class=" w-full lg:w-5/12 pe-10">
                <h1 class="text-4xl mb-2 font-bold text-gray-700">{{$tryout->name}}</h1>
                <div class="text-gray-600">
                    {!! $tryout->description !!}
                </div>

                @if ($tryout->is_together == 'together')
                    <div>
                        {{-- <h2 class="text-2xl my-3 font-semibold text-gray-700">Lihat Statistik atau Leaderboard</h2> --}}
                        {{-- <span class="mx-1 text-sky-500"><i class="fa-solid fa-calendar-days"></i></span> {{ \Carbon\Carbon::parse($tryout->start_date)->format('j F Y') }} - {{ \Carbon\Carbon::parse($tryout->end_date)->format('j F Y') }} --}}
                    </div>
                    @if ($results->isNotEmpty())
                        <div class="mt-3 gap-4 flex">
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
                        </div>
                    @endif
                @endif
            </div>
            <hr class="border h-100">
            <div class=" w-full lg:w-7/12"> 
                @foreach($categories as $item)
                    <div class="mb-5 border shadow rounded-lg overflow-hidden">
                        <h1 class="px-5 py-4 text-2xl font-bold bg-gradient-to-tr from-sky-400 to-sky-500 text-white">{{$item->name}}</h1>
                        @foreach($item->sub_categories as $sub_item)
                        <div class="py-2 border-y px-5 flex" style="width: 100%;">
                            <div class="w-3/6">
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
                            <div class="w-3/6 px-5 flex align-middle justify-end text-sky-500 gap-4">
                                @if ($tryout->is_together == 'together' )
                                    @if ($sub_item->is_completed == null)
                                        @if ( \Carbon\Carbon::today() > $tryout->end_date )
                                            <span class="text-rose-500 hover:text-rose-600 bg-rose-50 bg-opacity-50 px-4 py-2 border-2 text-sm border-rose-200 rounded-lg h-fit my-auto">
                                                * waktu pengerjaan sudah selesai
                                            </span>
                                        @else
                                            <a href="{{ $sub_item->totalQuestion != null ? route('user.tryouts.event.paper', [$tryoutId, $sub_item->id]) : '#'}}" class="flex items-center">
                                                <button class="p-3 px-4 flex items-center text-white bg-sky-500 rounded-lg font-semibold"><i class="fa-solid fa-circle-play"></i>&nbsp; Kerjakan</button>
                                            </a>
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
                                    <div class="my-auto gap-2">
                                        <x-primary-link href="{{ route('user.tryouts.instruction', [$tryoutId, $sub_item->id]) }}" class="flex items-center py-1">
                                            <i class="fa-solid fa-circle-play"></i>&nbsp; Kerjakan
                                        </x-primary-link>
                                        @if ($sub_item->is_completed)
                                            <x-secondary-link href="{{ route('user.tryouts.history', [$tryoutId, $sub_item->id]) }}" class="py-1">
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
