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
                            <span class="ml-1 text-gray-50 md:ml-2 dark:text-gray-500" aria-current="page">{{ $tryout->name }}</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        
        <div class="w-full lg:flex justify-center items-center">

            <div class="bg-white flex w-fit rounded-md shadow-lg px-16 py-6">
                <div class="my-auto space-y-6">
                    <h1 class="text-5xl capitalize font-extrabold text-sky-500">{{ $tryout->name }}</h1>
                    <div class="text-gray-600 font-semibold">
                        <h2 class="text-xl font-seibold mb-1 text-gray-800">Informasi Ujian</h2>
                        <div class="space-y-1">
                            <table class="w-full max-w-xl">
                                <tr class="w-full grid grid-cols-2">
                                    <td>
                                        <span class="font-medium"><i class="fa-solid fa-book-open text-sky-500 me-1"></i> Materi</span>
                                    </td>
                                    <td>
                                        <span class="">: {{ $subCategory->name }}</span>
                                    </td>
                                </tr>
                                <tr class="w-full grid grid-cols-2">
                                    <td>
                                        <span class="font-medium"><i class="fa-solid fa-file-circle-question text-sky-500 me-1"></i> Jumlah Pertanyaan</span>
                                    </td>
                                    <td>
                                        <span class="">: {{ $subCategory->totalQuestion }} Pertanyaan</span>
                                    </td>
                                </tr>
                                <tr class="w-full grid grid-cols-2">
                                    <td>
                                        <span class="font-medium"><i class="fa-solid fa-clock text-sky-500 me-1"></i> Durasi Pengerjaan</span>
                                    </td>
                                    <td>
                                        <span class="">: {{ $subCategory->duration ?? '-' }} Menit</span>
                                    </td>
                                </tr>
                                <tr class="w-full grid grid-cols-2">
                                    <td>
                                        <span class="font-medium"><i class="fa-solid fa-square-poll-vertical text-sky-500 me-1"></i> Nilai Rata-rata</span>
                                    </td>
                                    <td>
                                        <span class="">: {{ $subCategory->avgScore ? round($subCategory->avgScore,1) : 0 }} Poin</span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="text-gray-600 font-semibold">
                        <h2 class="text-xl font-medium mb-1 text-gray-800">Catatan Penting :</h2>
                        <ul class="space-y-1">
                            <li>1. Jangan merefresh atau menutup halaman selama ujian.</li>
                            <li>2. Pastikan koneksi internet stabil.</li>
                            <li>3. Pastikan perangkat memiliki baterai cukup atau tersambung ke daya.</li>
                        </ul>

                        @if ($subCategory->totalQuestion == 0)
                            <span class="inline-flex text-sm text-rose-500 mt-2">
                                * Belum ada pertanyaan, mohon beritahu admin
                            </span>
                        @endif
                    </div>
    
                    <div class="gap-5 flex">
                        <x-secondary-link href="{{ route('user.tryouts.item', $tryoutId) }}">
                            Kembali
                        </x-secondary-link>
                        @if ($subCategory->totalQuestion != null)
                            <x-primary-link href="{{ route('user.tryouts.paper', [$tryoutId, $subCategoryId]) }}" class="">
                                Mulai Ujian
                            </x-primary-link>
                        @endif
                    </div>
                </div>
                <div class="max-w-md py-12 ps-20 pe-0">
                    <img src="{{ asset('assets/Online test-amico.png') }}" alt="">
                </div>
            </div>

        </div>
    </div>
</div>
