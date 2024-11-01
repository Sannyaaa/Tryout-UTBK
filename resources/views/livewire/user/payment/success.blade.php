<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="text-center">
                    <svg class="mx-auto mb-4 h-16 w-16 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h2 class="text-2xl font-semibold mb-4">Pembayaran Berhasil</h2>
                    
                    <div class="mb-6">
                        <p class="text-gray-600">Terima kasih telah melakukan pembayaran</p>
                        <p class="font-medium">Nomor Order: {{ $order->order_number }}</p>
                        <p class="font-medium">Total Pembayaran: Rp {{ number_format($order->final_price, 0, ',', '.') }}</p>
                    </div>

                    <div class="space-x-4">
                        <a href="{{ route('dashboard') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                            Kembali ke Dashboard
                        </a>
                        <a href="{{ route('packages.index') }}" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">
                            Lihat Paket Lainnya
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
