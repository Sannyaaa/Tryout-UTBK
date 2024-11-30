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
                            <a href="#" class="ml-1 text-gray-50 hover:text-sky-200 md:ml-2 dark:text-gray-300 dark:hover:text-white">Paket</a>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-50" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <span class="ml-1 text-gray-50 md:ml-2 dark:text-gray-500" aria-current="page">Detail Paket</span>
                            </div>
                        </li>
                        </ol>
                    </nav>
                    {{-- <h1 class="text-xl font-semibold text-gray-800 sm:text-2xl dark:text-white">All Bimbels</h1> --}}
                </div>
            </div>
            <div class="mx-6">
                
                <div class="grid grid-cols-1 md:grid-cols-3 md:gap-6">
                    <div class=" md:col-span-2">
                        <div class="relative aspect-video overflow-hidden bg-cover align-middle mt-4">
                            <img class="object-cover object-center w-full h-full rounded-md" src="{{ $package->image != null ? Storage::url($package->image) : asset('build/assets/Photo-Image-Icon-Graphics-10388619-1-1-580x386.jpg') }}" alt="package image" />
                        </div>
                        <div>
                            <div>
                                {{-- <span class="py-2 px-4 bg-gradient-to-tr from-sky-400 to-sky-500 rounded-lg font-semibold text-white">{{ $package->tryout_id != null ? 'Tryout' : 'Bimbel' }}</span> --}}
                                <h1 class="mt-3 text-3xl font-bold text-gray-800 sm:text-5xl sm:leading-none sm:tracking-tight dark:text-white uppercase">{{ $package->name }}</h1>
                            </div>
                            <div class="my-6 space-y-2">
                                <h1 class=" text-xl font-bold text-gray-800 sm:text-2xl sm:leading-none sm:tracking-tight dark:text-white">Deskripsi</h1>
                                
                                <div class="mb-4 font-normal text-gray-500 text-lg dark:text-gray-400">{!! $package->description !!}</div>
                            </div>

                            <div class="my-6 space-y-2">
                                <h2 class=" text-xl font-bold text-gray-800 sm:text-2xl sm:leading-none sm:tracking-tight dark:text-white">Benefit Yang Didapat :</h2>
                        
                                <div class="mb-4 grid grid-cols-1 lg:grid-cols-2 text-left space-y-2">
                                    @foreach ($package->benefits as $benefit)
                                        <div class="flex items-center space-x-3 text-gray-500 font-medium text-lg">
                                            <!-- Icon -->
                                            <div class="p-1 bg-sky-400 rounded-full">
                                                <svg class="flex-shrink-0 w-5 h-5 text-gray-100 dark:text-gray-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                            </div>
                                            <span>{{ $benefit->benefit }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            @if (
                                $package->tryout_id != null && $package->tryout->is_together == 'together'
                            )
                                <div class="my-6 space-y-2">
                                    <h1 class=" text-2xl font-bold text-gray-800 mb-4 sm:text-2xl sm:leading-none sm:tracking-tight dark:text-white">Tanggal Pengerjaan Tryout</h1>
                        
                                    <div class="text-xl font-semibold text-gray-500">
                                        <span class="py-1 px-4 bg-sky-400 bg-opacity-30 border-sky-400 border-2 text-sky-600 rounded-lg font-semibold"><i class="fa-solid fa-calendar-days mr-2"></i> {{ \Carbon\Carbon::parse($package->tryout->start_date)->format('j F Y') }} </span>
                                        
                                        <span class="mx-3">sampai</span>

                                        <span class="py-1 px-4 bg-sky-400 bg-opacity-30 border-sky-400 border-2 text-sky-600 rounded-lg font-semibold"><i class="fa-solid fa-calendar-days mr-2"></i> {{ \Carbon\Carbon::parse($package->tryout->end_date)->format('j F Y') }} </span>
                                    </div>
                                </div>
                            @endif

                            @if ($testimonials->isNotEmpty())
                                <div class="my-6 space-y-2 w-full lg:w-5/6">
                                    <h2 class=" text-xl font-bold text-gray-800 sm:text-2xl sm:leading-none sm:tracking-tight dark:text-white mb-4">Apa Kata Mereka :</h2>
                            
                                    <div class="">
                                        <div id="default-carousel" class="relative w-full" data-carousel="slide">
                                            <!-- Carousel wrapper -->
                                            <div class="relative h-40 overflow-hidden rounded-lg">
                                                <!-- Item 1 -->
                                                @forelse ($testimonials as $testimonial)
                                                    <div class="hidden duration-700 ease-in-out px-20" data-carousel-item>
                                                        <div class="p-4 mb-4 text-sky-800 border border-sky-300 rounded-lg bg-sky-50 dark:bg-gray-800 dark:text-sky-400 dark:border-sky-800">
                                                            <div class="flex items-center">
                                                                <div class="flex-shrink-0">
                                                                    <img class="w-8 h-8 rounded-full" src="{{ Storage::url($testimonial->user->avatar) }}" alt="Neil image">
                                                                </div>
                                                                <div class="flex-1 min-w-0 ms-4">
                                                                    <p class="text-sm font-medium text-gray-800 truncate dark:text-white">
                                                                        {{ $testimonial->name ?? $testimonial->user->name }}
                                                                    </p>
                                                                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                                        {{ $testimonial->name ?? $testimonial->user->email }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div class="mx-3">
                                                                    <p class="text-base  font-medium text-sky-900 dark:text-white my-3">
                                                                        {{ $testimonial->content }}
                                                                    </p>
                                                                    <span class="text-sm text-slate-500">{{ \Carbon\Carbon::parse($testimonial->created_at)->format('j F Y') }} </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <div>
                                                        Belum ada Testimoni untuk Paket ini.
                                                    </div>
                                                @endforelse
                                            </div>
                                            <!-- Slider indicators -->
                                            {{-- <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                                                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                                                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                                                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                                                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                                                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
                                            </div> --}}
                                            <!-- Slider controls -->
                                            <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                                                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-sky-100 border-2 border-sky-300 text-sky-800 dark:bg-sky-800/30 group-hover:bg-sky-200 dark:group-hover:bg-sky-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-sky-800/70 group-focus:outline-none">
                                                    <svg class="w-4 h-4 dark:text-white text-sky-600 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                                                    </svg>
                                                    <span class="sr-only">Previous</span>
                                                </span>
                                            </button>
                                            <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                                                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-sky-100 border-2 border-sky-300  dark:bg-gray-800/30 group-hover:bg-sky-200 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                                    <svg class="w-4 h-4 dark:text-white text-sky-600 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                                    </svg>
                                                    <span class="sr-only">Next</span>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-span-1">
                        <div class="mx-auto max-w-4xl flex-1 space-y-6 mt-5 lg:w-full">
                            <div class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                                @if(!$applied_voucher)
                                    <form class="space-y-4" wire:submit.prevent="applyVoucher">
                                        <div>
                                            <x-input-label for="voucher" :value="__('Masukkan Vouchermu')" />
                                            <div class="space-y-3">
                                                <x-text-input 
                                                    type="text" 
                                                    wire:model="voucher" 
                                                    name="voucher" 
                                                    id="voucher" 
                                                    placeholder="Masukan Code Voucher" 
                                                    class="flex-1"
                                                />
                                                <x-primary-button type="submit">
                                                    Pakai Voucher
                                                </x-primary-button>
                                            </div>
                                            <x-input-error :messages="$errors->get('voucher')" class="mt-2" />
                                        </div>
                                    </form>
                                @else
                                    <div class="">
                                        <div class="space-y-4">
                                            <div>
                                                <p class="font-medium">Voucher Terpakai:</p>
                                                <p class="text-sky-500 font-semibold text-2xl">{{ $applied_voucher->code }}</p>
                                            </div>
                                            <button 
                                                wire:click="removeVoucher" 
                                                class="bg-rose-500 hover:bg-rose-600 text-white font-semibold py-3 px-4 rounded-lg"
                                            >
                                                Hapus Voucher
                                            </button>
                                        </div>
                                    </div>
                                @endif
                                {{-- @livewire('user.package.discount-voucher',['package_id' => $package->id]) --}}
                            </div>
                            <div class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                                <p class="text-xl font-semibold text-gray-800 dark:text-white">Informasi Harga</p>

                                <div class="space-y-4">
                                    <div class="space-y-2">
                                    <dl class="flex items-center justify-between gap-4">
                                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Harga Paket</dt>
                                        <dd class="text-base font-medium text-gray-800 dark:text-white">Rp. {{ number_format($package->price, 0, ',', '.') }}</dd>
                                    </dl>

                                    {{-- <dl class="flex items-center justify-between gap-4">
                                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Savings</dt>
                                        <dd class="text-base font-medium text-green-600">-$299.00</dd>
                                    </dl> --}}
                                    {{-- @dd($discount) --}}
                                    @if($applied_voucher)
                                        <dl class="flex items-center justify-between gap-4">
                                            <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Discount</dt>
                                            <dd class="text-base font-medium text-gray-800 dark:text-white">- Rp. {{ number_format($package->price - $discounted_price, 0, ',', '.') }}</dd>
                                        </dl>
                                    @endif

                                    <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                                        <dt class="text-base font-bold text-gray-800 dark:text-white">Total Pembayaran:</dt>
                                        <dd class="text-base font-bold text-gray-800 dark:text-white">Rp. {{ number_format($final_price, 0, ',', '.') }}</dd>
                                    </dl>
                                </div>

                                {{-- Checkout Button --}}
                                <div class="w-full">
                                    <div class="w-full">
                                        <x-primary-button 
                                        wire:click="checkout"
                                        wire:loading.attr="disabled"
                                        {{-- class="w-f" --}}
                                    >
                                            <span wire:loading.remove wire:target="checkout">
                                                Checkout Sekarang
                                            </span>
                                            <span wire:loading wire:target="checkout">
                                                Processing...
                                            </span>
                                        </x-primary-button>
                                    </div>
                                    <div class="mt-3">
                                        <span class="text-sm text-rose-500">
                                            * Lakukan pembayaran sebelum 24 jam dari setelah checkout
                                        </span>
                                    </div>
                                </div>

                                {{-- Loading States & Notifications --}}
                                <div wire:loading.delay wire:target="applyVoucher">
                                    <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                                        <div class="bg-white p-4 rounded-lg">
                                            Processing...
                                        </div>
                                    </div>
                                </div>

                                @if (session()->has('error'))
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                                        {{ session('error') }}
                                    </div>
                                @endif
                            </div>

                            {{-- <div class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                                <form class="space-y-4">
                                    <div>
                                    <label for="voucher" class="mb-2 block text-sm font-medium text-gray-800 dark:text-white"> Do you have a voucher or gift card? </label>
                                    <input type="text" id="voucher" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-800 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="" required />
                                    </div>
                                    <button type="submit" class="flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Apply Code</button>
                                </form>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="">
                    <x-primary-link href="{{ route('user.packages') }}">
                        Kembali
                    </x-primary-link>
                </div>
            </div>
        </div>
    </div>
</div>
