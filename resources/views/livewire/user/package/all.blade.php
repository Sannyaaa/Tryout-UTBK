<div class="p-4 {{ Auth::user() ? 'mt-12' : '-mt-16 max-w-7xl mx-auto mb-20' }}">
    <div class="mx-10">
        @if ($promotions)
            <div id="default-carousel" class="relative w-full mb-8" data-carousel="slide" wire:ignore>
            <!-- Carousel wrapper -->
                <div class="relative h-56 overflow-hidden rounded-lg md:h-96 z-20">
                    @foreach ($promotions as $promo)
                        <div class="hidden duration-700 ease-in-out rounded-lg overflow-hidden" data-carousel-item wire:ignore.self>
                            <a href="{{ route('packages') }}">
                                <img src="{{ Storage::url($promo->image) }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                            </a>
                        </div>
                    @endforeach
                </div>
                <!-- Slider controls -->
                <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>
        @endif

        @auth
            <div class=" relative mb-8">
                <div class="bg-gradient-to-tr from-sky-400 to-sky-500 rounded-lg shadow-lg py-4 px-3">
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 text-sm font-semibold md:space-x-2">
                        <li class="inline-flex items-center">
                            <a href="{{ Auth::user() ? route('user.dashboard') : '/' }}" class="inline-flex items-center text-gray-50 hover:text-sky-200 dark:text-gray-300 dark:hover:text-white">
                            <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                                {{ Auth::user() ? 'Dashboard' : 'Beranda' }}
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-50" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <a href="#" class="ml-1 text-gray-50 hover:text-sky-200 md:ml-2 dark:text-gray-300 dark:hover:text-white">Paket Pembelian</a>
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
        @endauth

        <div>
            <!-- Filter Section -->
            <div class="flex items-center space-x-4 my-8 font-semibold">
                <button wire:click="$set('selectedType', 'all')" 
                        class="px-4 py-2 rounded-lg transition-all shadow hover:shadow-lg {{ $selectedType === 'all' ? 'bg-sky-500 text-white' : 'bg-white text-gray-700' }}">
                    Semua Paket
                </button>
                <button wire:click="$set('selectedType', 'tryout')"
                        class="px-4 py-2 rounded-lg transition-all shadow hover:shadow-lg {{ $selectedType === 'tryout' ? 'bg-sky-500 text-white' : 'bg-white text-gray-700' }}">
                    Paket Tryout
                </button>
                <button wire:click="$set('selectedType', 'bimbel')"
                        class="px-4 py-2 rounded-lg transition-all shadow hover:shadow-lg {{ $selectedType === 'bimbel' ? 'bg-sky-500 text-white' : 'bg-white text-gray-700' }}">
                    Paket Bimbel
                </button>
            </div>

            <!-- Package Grid Section -->
            <section class="grid grid-cols-1 space-y-12 md:space-y-0 md:grid-cols-2 lg:grid-cols-3 md:gap-x-8 md:gap-8">
                @foreach ($packages as $package)
                    <div class="flex flex-col max-w-lg">
                        <div class="text-gray-900 bg-white hover:shadow-lg transition-all border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                            <div class="relative aspect-video overflow-hidden bg-cover align-middle p-2">
                                <img class="object-cover object-center w-full h-full rounded-md" 
                                    src="{{ $package->image != null ? Storage::url($package->image) : asset('build/assets/Photo-Image-Icon-Graphics-10388619-1-1-580x386.jpg') }}" 
                                    alt="package image" />
                                {{-- <span class="relative bottom-10 -right-3 py-1 px-4 bg-sky-500 border-sky-400 border-2 text-white rounded-lg font-semibold">
                                    {{ $package->tryout_id != null ? 'Tryout' : 'Bimbel' }}
                                </span> --}}
                            </div>
                            <div class="px-5 py-2">
                                <div>
                                    <a href="{{ route('package.item', $package->id) }}">
                                        <h5 class="text-3xl font-bold hover:underline text-gray-800 uppercase dark:text-white mb-0">
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
                                    <x-primary-link href="{{ route('package.item', $package->id) }}">
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
            </section>
        </div>
    </div>
</div>
<!-- Pricing Cards -->

@push('body-scripts')
    <script>
        document.addEventListener('livewire:load', function () {
            // Inisialisasi pertama setelah halaman dimuat
            initFlowbiteCarousel();
        });

        document.addEventListener('livewire:rendered', function () {
            // Inisialisasi ulang setelah Livewire merender ulang
            initFlowbiteCarousel();
        });

        function initFlowbiteCarousel() {
            const carousels = document.querySelectorAll('[data-carousel="slide"]');
            carousels.forEach(carousel => {
                // Periksa apakah sudah diinisialisasi untuk mencegah duplikasi
                if (!carousel.classList.contains('initialized')) {
                    carousel.classList.add('initialized');
                    new Flowbite.Carousel(carousel, {
                        interval: 3000, // Waktu otomatis beralih (opsional)
                    });
                }
            });
        }
    </script>

@endpush
