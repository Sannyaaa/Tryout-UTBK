<div class="p-4 mt-12">
    <div class="p-6 bg-white block rounded-lg shadow sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
        <div class="w-full mb-1">
            <div class="mx-6 relative -mt-12 mb-4">
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
                            <a href="#" class="ml-1 text-gray-50 hover:text-sky-200 md:ml-2 dark:text-gray-300 dark:hover:text-white">Pembayaran</a>
                            </div>
                        </li>
                        {{-- <li>
                            <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-50" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <span class="ml-1 text-gray-50 md:ml-2 dark:text-gray-500" aria-current="page">Berhasil</span>
                            </div>
                        </li> --}}
                        </ol>
                    </nav>
                    {{-- <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">All Bimbels</h1> --}}
                </div>
            </div>
            <div class="mx-6">
                <div class="mx-auto w-fit flex gap-10">
                    <div class="h-full my-auto max-w-md rounded-lg">
                        <h2 class="text-6xl font-bold text-sky-500 mb-3">Oops, Pembayaran Gagal!</h2>
                        
                        <div class="mb-4">
                            <p class="text-lg font-medium text-gray-700">
                                Sepertinya ada masalah dengan pembayaran. 
                                <br>
                                Anda bisa mencoba lagi atau hubungi layanan pelanggan untuk bantuan lebih lanjut. 
                            </p>
                            {{-- <p class="font-medium">Invoice Order: {{ $order->invoice }}</p>
                            <p class="font-medium">Total Pembayaran: Rp {{ number_format($order->final_price, 0, ',', '.') }}</p> --}}
                        </div>

                        <div class="space-x-4">
                            {{-- <x-primary-link class="px-8">
                                Dashboard
                            </x-primary-link> --}}
                            <x-primary-link href="{{ route('user.packages') }}" class="px-8 bg-gradient-to-tr from-emerald-400 to-emerald-500">
                                Paket Lainnya
                            </x-primary-link>
                        </div>
                    </div>

                    <div class="max-w-xl">
                        <img src="{{ asset('assets/Successful purchase-cuate.png') }}" alt="">
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

