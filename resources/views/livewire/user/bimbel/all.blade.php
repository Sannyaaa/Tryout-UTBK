<div class="container px-4 pt-12 mx-auto md:pt-20 lg:px-4 dark:bg-gray-900">
    <h1 class="mb-3 text-3xl font-bold text-gray-900 sm:text-4xl sm:leading-none sm:tracking-tight dark:text-white">Our pricing plan made simple</h1>
    <p class="mb-6 text-lg font-normal text-gray-500 sm:text-xl dark:text-gray-400">All types of businesses need access to development resources, so we give you the option to decide how much you need to use.</p>
    <!-- Pricing Cards -->
    <section class="grid grid-cols-1 space-y-12 md:space-y-0 md:grid-cols-2 lg:grid-cols-3 md:gap-x-8 md:gap-8 pt-9">
      <!-- Pricing Card -->
        @foreach ($packages as $package)
            <div class="flex flex-col max-w-lg text-gray-900 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                
                <div class="relative aspect-video overflow-hidden bg-cover align-middle p-2">
                    <img class="object-cover object-center w-full h-full rounded-md" src="{{ $package->image != null ? Storage::url($package->image) : asset('build/assets/Photo-Image-Icon-Graphics-10388619-1-1-580x386.jpg') }}" alt="package image" />
                    <span class="relative bottom-10 -right-3 py-2 px-4 bg-gradient-to-tr from-sky-400 to-sky-500 rounded-lg font-semibold text-white">{{ $package->tryout_id != null ? 'Bimbel' : 'Tryout' }}</span>
                </div>
                <div class="px-5 py-3">
                    <div>
                        <a href="{{ route('user.bimbels.item', $package->id) }}">
                            <h5 class="text-xl font-semibold hover:underline text-gray-900 dark:text-white">{{ $package->name }} </h5>
                        </a>
                    </div>
                    <p class="font-light text-gray-500 dark:text-gray-400 mb-3">{{ Str::limit($package->description, 100, '...') }}</p>
                    <div class="flex justify-between items-baseline mb-1">
                        <x-primary-link href="{{ route('user.bimbels.item', $package->id) }}">
                            Lihat Detail
                        </x-primary-link>
                        <span class="mt-auto text-2xl font-bold">Rp.{{ number_format($package->price) }}</span>
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