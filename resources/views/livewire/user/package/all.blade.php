<div class="p-4 mt-12">
    <div class="p-6 bg-white block rounded-lg shadow sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
        <div class="w-full mb-1">
            <div class="mx-6 relative -mt-12 mb-6">
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
                            <a href="#" class="ml-1 text-gray-50 hover:text-sky-200 md:ml-2 dark:text-gray-300 dark:hover:text-white">Kelas</a>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-50" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <span class="ml-1 text-gray-50 md:ml-2 dark:text-gray-500" aria-current="page">Semua Kelas</span>
                            </div>
                        </li>
                        </ol>
                    </nav>
                    {{-- <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">All Bimbels</h1> --}}
                </div>
            </div>
            <div class="px-6 mt-2">
                <h2 class="mt-3 text-3xl font-bold text-gray-900 sm:text-4xl sm:leading-none sm:tracking-tight dark:text-white">
                    Persiapan UTBK Tanpa Batas: Paket Kursus & Tryout
                </h2>
                <p class="my-2 font-normal text-gray-500 text-lg dark:text-gray-400 w-9/12">
                    Dapatkan pengalaman belajar yang mendalam dengan paket kursus dan tryout UTBK yang dirancang untuk mempersiapkan Anda secara maksimal. Ciptakan strategi sukses dan taklukkan UTBK dengan kepercayaan diri penuh.
                </p>
                {{-- <x-primary-link href="#">
                    Lihat Paketmu
                </x-primary-link> --}}
            </div>
        </div>
    </div>
    <section class="grid grid-cols-1 space-y-12 md:space-y-0 md:grid-cols-2 lg:grid-cols-3 md:gap-x-8 md:gap-8 pt-9">
        <!-- Pricing Card -->
        @foreach ($packages as $package)
            <div class="flex flex-col max-w-lg text-gray-900 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                
                <div class="relative aspect-video overflow-hidden bg-cover align-middle p-2">
                    <img class="object-cover object-center w-full h-full rounded-md" src="{{ $package->image != null ? Storage::url($package->image) : asset('build/assets/Photo-Image-Icon-Graphics-10388619-1-1-580x386.jpg') }}" alt="package image" />
                </div>
                <div class="px-5 py-3">
                    <div>
                        <span class="py-1 px-4 bg-sky-400 bg-opacity-30 border-sky-400 border-2 text-sky-600 rounded-lg font-semibold">{{ $package->tryout_id != null ? 'Tryout' : 'Bimbel' }}</span>
                        <a href="{{ route('user.package.item', $package->id) }}">
                            <h5 class="text-2xl font-semibold hover:underline mt-3 text-gray-900 dark:text-white">{{ $package->name }} </h5>
                        </a>
                    </div>
                    <p class="font-light text-gray-500 dark:text-gray-400 mb-3">{{ Str::limit($package->description, 100, '...') }}</p>
                    <div class="flex justify-between items-baseline mb-1">
                        <x-primary-link href="{{ route('user.package.item', $package->id) }}">
                            Lihat Detail
                        </x-primary-link>
                        <span class="mt-auto text-3xl font-bold">Rp.{{ number_format($package->price) }}</span>
                    </div>
                    <!-- List -->
                    {{-- <ul role="list" class="mb-4 space-y-2 text-left">
                        @foreach ($package->benefits as $benefit)
                            <li class="flex items-center space-x-3">
                                <!-- Icon -->
                                <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                <span>{{ $benefit->benefit }}</span>
                            </li>
                        @endforeach
                    </ul> --}}
                    {{-- <a href="#" class="text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:ring-primary-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-white  dark:focus:ring-primary-900">Get started</a> --}}
                    {{-- <div> --}}
                        
                    {{-- </div> --}}
                </div>
            </div>
        @endforeach
    </section>
</div>
<!-- Pricing Cards -->
