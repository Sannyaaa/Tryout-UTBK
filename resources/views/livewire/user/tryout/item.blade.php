<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="mt-10 mx-4">
        <div class="py-10 px-7 bg-white rounded-md shadow flex">
            <div class="w-2/6 py-5">
                <h1 class="text-4xl pb-5 font-bold">{{$tryout->name}}</h1>
                <p>
                    {{$tryout->description}}
                </p>
            </div>
            <hr class="border h-100">
            <div class="w-4/6"> 
                @foreach($categories as $item)
                    <div class="mb-5 border shadow rounded-lg overflow-hidden">
                        <h1 class="p-5 text-2xl font-semibold bg-gradient-to-tr from-sky-400 to-sky-500 text-white">{{$item->name}}</h1>
                        @foreach($item->sub_categories as $sub_item)
                        <div class="py-2 border-y px-5 flex" style="width: 100%;">
                            <div class="w-3/6">
                                <h3 class="font-medium text-lg">{{$sub_item->name}}</h3>
                                @if ($sub_item->duration)
                                    <span class="text-sky-500">
                                        <i class="fa-regular fa-clock"></i>
                                        <span class="me-2">{{$sub_item->duration}} Menit</span>
                                        {{-- <i class="fa-regular fa-file"></i> --}}
                                        {{-- <span></span> --}}
                                    </span>
                                @endif
                            </div>
                            <div class="w-3/6 px-5 flex align-middle justify-end text-sky-500 gap-4">
                                @if ($tryout->is_together == 'together' )
                                    @if ($sub_item->is_completed == null)
                                        <a href="{{route('user.tryouts.event.paper', [$tryoutId, $sub_item->id])}}" class="flex items-center">
                                            <button class="p-3 px-4 flex items-center text-white bg-sky-500 rounded-lg font-semibold"><i class="fa-solid fa-circle-play"></i>&nbsp; Kerjakan</button>
                                        </a>
                                    @else
                                        <a href="{{ route('user.tryouts.event.results', $sub_item->is_completed->id) }}" class="flex items-center">
                                            <button class="p-3 px-4 flex items-center text-white bg-green-500 rounded-lg font-semibold">
                                                <i class="fa-solid fa-circle-check"></i>&nbsp; Riwayat
                                            </button>
                                        </a>
                                    @endif
                                @else
                                    <a href="{{route('user.tryouts.paper', [$tryoutId, $sub_item->id])}}" class="flex items-center">
                                        <button class="p-3 px-4 flex items-center text-white bg-sky-500 rounded-lg font-semibold"><i class="fa-solid fa-circle-play"></i>&nbsp; Kerjakan</button>
                                    </a>
                                    @if ($sub_item->is_completed)
                                        <a href="{{ route('user.tryouts.history', [$tryoutId, $sub_item->id]) }}" class="flex items-center">
                                            <button class="p-3 px-4 flex items-center text-white bg-green-500 rounded-lg font-semibold">
                                                <i class="fa-solid fa-circle-check"></i>&nbsp; Riwayat
                                            </button>
                                        </a>
                                    @endif
                                @endif
                                
                                {{-- <i class="my-auto me-2 fa-solid fa-circle-check"></i> <span class="my-auto">Selesai</span> --}}
                            </div>
                        </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-4">
                <!-- resources/views/leaderboard/index.blade.php -->
                {{-- @dd($firstFilters) --}}
                <div class="bg-white rounded-lg shadow px-8  py-10">
                    <h2 class="text-3xl font-semibold text-gray-800">Leaderboard</h2>
                    <p class="mt-2 text-gray-600">Lihat daftar user yang sudah menyelesaikan ujian ini.</p>
                        <ul class="hidden text-sm font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-lg sm:flex dark:divide-gray-600 dark:text-gray-400" id="fullWidthTab" data-tabs-toggle="#fullWidthTabContent" role="tablist">
                        <li class="w-full">
                            <button id="faq-tab" data-tabs-target="#faq" type="button" role="tab" aria-controls="faq" aria-selected="true" class="inline-block w-full p-4 rounded-tl-lg bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">{{ Auth::user()->data_universitas->nama_universitas }}</button>
                        </li>
                        <li class="w-full">
                            <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="false" class="inline-block w-full p-4 rounded-tr-lg bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">{{ Auth::user()->second_data_universitas->nama_universitas }}</button>
                        </li>
                    </ul>
                    <div id="fullWidthTabContent" class="border-t border-gray-200 dark:border-gray-600">
                        <div class="hidden pt-4" id="faq" role="tabpanel" aria-labelledby="faq-tab">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-slate-50 text-slate-600 text-left text-xs uppercase tracking-wider">
                                    <tr>
                                        <th class="p-6 font-medium">
                                            Nama 
                                        </th>
                                        <th class="p-6 font-medium">
                                            Total Score
                                        </th>
                                        @foreach (explode(',', $firstFilters->first()->sub_scores) as $subCategory)
                                            <th class="p-6 font-medium">{{ explode(':', $subCategory)[0] }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                {{-- @dd($firstFilters) --}}
                                <tbody class="bg-white divide-y divide-gray-200 text-gray-700 text-sm">
                                    @forelse($firstFilters as $i => $item)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $item->user_name }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $item->total_score }}
                                            </td>
                                            @foreach (explode(',', $item->sub_scores) as $subScore)
                                                <td class="px-6 py-4 whitespace-nowrap">{{ explode(':', $subScore)[1] }}</td>
                                            @endforeach
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                                Tidak ada data yang ditemukan
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="hidden pt-4" id="about" role="tabpanel" aria-labelledby="about-tab">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-slate-50 text-slate-600 text-left text-xs uppercase tracking-wider">
                                    <tr>
                                        <th class="p-6 font-medium">
                                            No
                                        </th>
                                        <th class="p-6 font-medium">
                                            Nama 
                                        </th>
                                        <th class="p-6 font-medium">
                                            Total Score
                                        </th>
                                        @foreach (explode(',', $firstFilters->first()->sub_scores) as $subCategory)
                                            <th class="p-6 font-medium">{{ explode(':', $subCategory)[0] }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                {{-- @dd($firstFilters) --}}
                                <tbody class="bg-white divide-y divide-gray-200 text-gray-700 text-sm">
                                    @forelse($secondFilters as $item)
                                        <tr class="{{ Auth::id() == $item->user_id ? 'bg-sky-50 text-sky-600 font-semibold' : '' }}">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $item->user_name }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $item->total_score }}
                                            </td>
                                            @foreach (explode(',', $item->sub_scores) as $subScore)
                                                <td class="px-6 py-4 whitespace-nowrap">{{ explode(':', $subScore)[1] }}</td>
                                            @endforeach
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                                Tidak ada data yang ditemukan
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- @if ($tryout->is_together == 'together' && $firstFilters->isNotEmpty())
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-slate-50 text-slate-600 text-left text-xs uppercase tracking-wider">
                                <tr>
                                    <th class="p-6 font-medium">
                                        Nama 
                                    </th>
                                    <th class="p-6 font-medium">
                                        Total Score
                                    </th>
                                    @foreach (explode(',', $firstFilters->first()->sub_scores) as $subCategory)
                                        <th class="p-6 font-medium">{{ explode(':', $subCategory)[0] }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 text-gray-700 text-sm">
                                @forelse($firstFilters as $item)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $item->user_name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $item->total_score }}
                                        </td>
                                        @foreach (explode(',', $item->sub_scores) as $subScore)
                                            <td class="px-6 py-4 whitespace-nowrap">{{ explode(':', $subScore)[1] }}</td>
                                        @endforeach
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                            Tidak ada data yang ditemukan
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                @else
                    <p>Belum ada riwayat untuk sub-category ini.</p>
                    
                @endif --}}
        </div>
    </div>
</div>
