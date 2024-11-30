<div class="p-4 mt-12">
    <div class="p-6 bg-white block rounded-lg shadow sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
        <div class="w-full mb-1">
            <div class="mx-6 relative -mt-12 mb-10">
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
                            <a href="#" class="ml-1 text-gray-50 hover:text-sky-200 md:ml-2 dark:text-gray-300 dark:hover:text-white">Bimbel</a>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-50" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <span class="ml-1 text-gray-50 md:ml-2 dark:text-gray-500" aria-current="page">Detail Bimbel</span>
                            </div>
                        </li>
                        </ol>
                    </nav>
                    {{-- <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">All Bimbels</h1> --}}
                </div>
            </div>
            <div class="mx-6">
                <div class="flex justify-between items-center mb-2">
                    {{-- <span class="py-2 px-4 bg-gradient-to-tr from-sky-400 to-sky-500 rounded-lg font-semibold text-white">{{ $bimbel->tryout_id != null ? 'Tryout' : 'Bimbel' }}</span> --}}
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900 sm:text-5xl sm:leading-none sm:tracking-tight dark:text-white">Riwayat Hasil Tryout</h1>
                        <p class="mb-4 font-normal text-gray-500 text-lg dark:text-gray-400"></p>
                    </div>
                    <div class="inline-flex gap-3">
                        <x-primary-link href="{{ route('user.tryouts.paper', [$tryoutId, $subCategoryId]) }}" target="__blank" class="flex items-center my-1">
                            <i class="fa-solid fa-circle-play"></i>&nbsp; Kerjakan Ulang
                        </x-primary-link>
                    </div>
                </div>
                <div class="">
                    <div>

                        <!-- Table -->
                        @if ($history->isEmpty())
                            <p>Belum ada riwayat untuk sub-category ini.</p>
                        @else
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-slate-50 text-slate-600 text-left text-xs uppercase tracking-wider">
                                        <tr>
                                            <th class="p-6 font-medium">
                                                Tryout
                                            </th>
                                            <th class="p-6 font-medium">
                                                Materi
                                            </th>
                                            <th class="p-6 font-medium">
                                                Skor
                                            </th>
                                            <th class="p-6 font-medium">
                                                Benar
                                            </th>
                                            <th class="p-6 font-medium">
                                                Salah
                                            </th>
                                            <th class="p-6 font-medium">
                                                Tidak Dijawab
                                            </th>
                                            <th class="p-6 font-medium">
                                                Tanggal Submit
                                            </th>
                                            <th class="p-6 font-medium">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200 text-gray-700 text-sm">
                                        @forelse($history as $item)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $item->tryout->name }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $item->sub_category->name }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $item->score }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $item->correct_answers }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $item->incorrect_answers }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $item->unanswered }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ \Carbon\Carbon::parse($item->created_at)->format('j F Y') }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div>
                                                        <x-primary-link href="{{ route('user.tryouts.results', $item->id) }}" class="inline-flex gap-2">
                                                            <span class="">
                                                                <i class="fa-solid fa-eye"></i>
                                                            </span> 
                                                            <span class="">Lihat</span>
                                                        </x-primary-link>
                                                    </div>
                                                </td>
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
                        @endif

                        <!-- Pagination -->
                        {{-- <div class="mt-4" wire:loading.class="opacity-50">
                            {{ $queryClass->links() }}
                        </div> --}}
                    </div>
                </div>
                <div>
                    <x-primary-link href="{{ route('user.tryouts.item', $tryoutId) }}" class="py-1">
                        Kembali
                    </x-primary-link>
                </div>
            </div>
        </div>
    </div>
</div>
