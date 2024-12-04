<div class="p-4 mt-12">
    <div class="">
        <div class="mx-10 relative mb-8">
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
                        <span class="ml-1 text-gray-50 md:ml-2 dark:text-gray-500" aria-current="page"></span>
                        </div>
                    </li>
                    </ol>
                </nav>
                {{-- <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">All Bimbels</h1> --}}
            </div>
        </div>
        <div class="py-10 px-7 bg-white rounded-md shadow">
            <div class="flex justify-between items-center mb-2">
                {{-- <span class="py-2 px-4 bg-gradient-to-tr from-sky-400 to-sky-500 rounded-lg font-semibold text-white">{{ $bimbel->tryout_id != null ? 'Tryout' : 'Bimbel' }}</span> --}}
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 sm:text-5xl sm:leading-none sm:tracking-tight dark:text-white">{{ $bimbel->name }}</h1>
                    <p class="mb-4 font-normal text-gray-500 text-lg dark:text-gray-400">{{ $bimbel->description }}</p>
                </div>
                <div class="inline-flex gap-3">
                    
                    <div>
                        <!-- Modal toggle -->
                        <x-primary-button data-modal-target="bimbel-testimonial-modal" data-modal-toggle="bimbel-testimonial-modal" >
                            <i class="fa-solid fa-comments"></i>  Testimoni
                        </x-primary-button>

                        <!-- Main modal -->
                        <div id="bimbel-testimonial-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            Tambah Testimoni untuk Bimbel ini
                                        </h3>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="bimbel-testimonial-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-4 md:p-5 space-y-4">
                                        <div>
                                            <x-input-label for="content" :value="__('Testimoni')" />
                                            <x-text-area id="content" wire:model.defer="content" rows="4" placeholder="Masukan Testimonial"/>
                                            <x-input-error :messages="$errors->get('content')" class="mt-2" />
                                        </div>
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                        <button wire:click="saveTestimonial" data-modal-hide="bimbel-testimonial-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                                        <button data-modal-hide="bimbel-testimonial-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Batal</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <x-primary-link href="{{ $bimbel->link_group }}" target="__blank" class="flex items-center gap-2">
                        <span class="">
                            <i class="fa-brands fa-telegram"></i>
                        </span> 
                        <span class="">Group</span>
                    </x-primary-link>
                </div>
            </div>
            <div class="">
                <div>
                    <form wire:submit.prevent class="mb-4 flex justify-between gap-4">
                        <!-- Search Input -->
                        <div class="w-80">
                            <x-text-input 
                                type="text" 
                                wire:model.live.debounce.300ms="search" 
                                placeholder="Cari kelas..."
                                class=" rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500"
                            />
                        </div>

                        <!-- Category Filter -->
                        <div class="w-64">
                            <x-select-input 
                                wire:model.live="selectedSubCategory"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500"
                            >
                                <option value="">Semua Kategori</option>
                                @foreach($subCategories as $subCategory)
                                    <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                @endforeach
                            </x-select-input>
                        </div>
                    </form>

                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gradient-to-tr from-sky-400 to-sky-500 text-slate-50 text-left text-xs uppercase tracking-wider">
                                <tr>
                                    <th class="px-6 py-4 font-semibold">
                                        Waktu
                                    </th>
                                    <th class="px-6 py-4 font-semibold">
                                        Nama
                                    </th>
                                    <th class="px-6 py-4 font-semibold">
                                        Pelajaran
                                    </th>
                                    <th class="px-6 py-4 font-semibold">
                                        Latihan
                                    </th>
                                    <th class="px-6 py-4 font-semibold">
                                        Zoom
                                    </th>
                                    <th class="px-6 py-4 font-semibold">
                                        Rekaman
                                    </th>
                                    <th class="px-6 py-4 font-semibold">
                                        Materi
                                    </th>
                                    {{-- <th class="p-6 font-medium">
                                        Status
                                    </th> --}}
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 text-gray-700 text-sm">
                                @forelse($queryClass as $class)
                                    @php
                                        $tanggalMulai = \Carbon\Carbon::parse($class->date);
                                        $waktuMulai = \Carbon\Carbon::parse($class->start_time);
                                        $hariSesuai = $tanggalMulai->isSameDay($now) || $tanggalMulai->lessThanOrEqualTo($now);
                                        $jamSesuai = $now->greaterThanOrEqualTo($waktuMulai);

                                    @endphp 
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <h4 class=" font-semibold">
                                                {{ \Carbon\Carbon::parse($class->date)->format('j F Y') }}
                                            </h4>
                                                Pukul : {{ date('h:i A', strtotime($class->start_time)) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <h4 class="font-semibold">
                                                {{ $class->name }}
                                            </h4>
                                                Pengajar : {{ $class->user->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $class->sub_categories->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap gap-3">
                                            @if ($hariSesuai)
                                                <a href="{{ route('user.my-bimbel.paper', $class->id) }}" target="_blank" class="text-sky-50 gap-1 bg-sky-500 hover:bg-sky-600 px-4 py-2 border-2 border-sky-200 rounded-lg">
                                                    <i class="fa-regular fa-pen-to-square"></i> Kerjakan
                                                </a>
                                                @if ($class->is_completed)
                                                    <a href="{{ route('user.my-bimbel.practice.history', $class->id) }}" title="Riwayat" target="_blank" class="text-sky-50 gap-1 bg-sky-500 hover:bg-sky-600 px-4 py-2 ms-3 border-2 border-sky-200 rounded-lg">
                                                        <i class="fa-solid fa-clock-rotate-left"></i>
                                                    </a>
                                                @endif
                                            @else
                                                <span title="Belum Tersedia" class="text-sky-500 hover:text-sky-600 gap-1 bg-sky-50 bg-opacity-50 px-4 py-2 border-2 border-sky-200 rounded-lg">
                                                    <i class="fa-regular fa-pen-to-square"></i> Kerjakan
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if ($hariSesuai || $jamSesuai)
                                                <a href="{{ $class->link_zoom }}" target="_blank" class="text-sky-50 gap-1 bg-sky-500 hover:bg-sky-600 px-4 py-2 border-2 border-sky-200 rounded-lg">
                                                    <i class="fa-solid fa-video"></i> Gabung
                                                </a>
                                            @else
                                                <span title="Belum Tersedia" class="text-sky-500 hover:text-sky-600 gap-1 bg-sky-50 bg-opacity-50 px-4 py-2 border-2 border-sky-200 rounded-lg">
                                                    <i class="fa-solid fa-video"></i> Gabung
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if ($class->link_video != null)
                                                <a href="{{ $class->link_video }}" target="_blank" class="text-sky-50 gap-1 bg-sky-500 hover:bg-sky-600 px-4 py-2 border-2 border-sky-200 rounded-lg">
                                                    <i class="fa-regular fa-circle-play"></i> Nonton
                                                </a>
                                            @else
                                                <span disabled title="Belum Tersedia" class="text-sky-500 hover:text-sky-600 gap-1 bg-sky-50 bg-opacity-50 px-4 py-2 border-2 border-sky-200 rounded-lg">
                                                    <i class="fa-regular fa-circle-play"></i> Nonton
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if ($hariSesuai)
                                                <a href="{{ $class->materi }}" target="_blank" class="text-sky-50 gap-1 bg-sky-500 hover:bg-sky-600 px-4 py-2 border-2 border-sky-200 rounded-lg">
                                                    <i class="fa-regular fa-newspaper"></i> Pelajari
                                                </a>
                                            @else
                                                <span title="Belum Tersedia" class="text-sky-500 hover:text-sky-600 gap-1 bg-sky-50 bg-opacity-50 px-4 py-2 border-2 border-sky-200 rounded-lg">
                                                    <i class="fa-regular fa-newspaper"></i> Pelajari
                                                </span>
                                            @endif
                                        </td>
                                        {{-- <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $class->status ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                {{ $class->status ? 'Aktif' : 'Tidak Aktif' }}
                                            </span>
                                        </td> --}}
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

                    <!-- Pagination -->
                    <div class="mt-4" wire:loading.class="opacity-50">
                        {{ $queryClass->links() }}
                    </div>
                </div>
            </div>
            <div>
                <x-primary-link href="{{ route('user.my-packages') }}" class="">
                    Kembali
                </x-primary-link>
            </div>
        </div>
    </div>
</div>
