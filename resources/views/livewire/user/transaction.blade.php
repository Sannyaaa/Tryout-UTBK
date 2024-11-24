<div class="p-4 mt-12">
    <div class="mx-10">
        <div class="">
            <div class="relative mb-8">
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
                                <a href="#" class="ml-1 text-gray-50 hover:text-sky-200 md:ml-2 dark:text-gray-300 dark:hover:text-white">Transaksi</a>
                                </div>
                            </li>
                        </ol>
                    </nav>
                    {{-- <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">All Bimbels</h1> --}}
                </div>
            </div>
            <div class="bg-white block rounded-lg px-8 py-6 shadow border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-between items-center mb-2">
                    {{-- <span class="py-2 px-4 bg-gradient-to-tr from-sky-400 to-sky-500 rounded-lg font-semibold text-white">{{ $bimbel->tryout_id != null ? 'Tryout' : 'Bimbel' }}</span> --}}
                    <div>
                        <h1 class="text-3xl font-bold text-gray-800 sm:text-4xl sm:leading-none sm:tracking-tight dark:text-white">Riwayat Transaksi</h1>
                        <p class="mb-4 font-normal text-gray-500 text-md dark:text-gray-400">Berikut daftar semua transaksi yang pernah anda lakukan</p>
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
                                    wire:model.live="paymentStatus"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500"
                                >
                                    <option value="">Semua Status</option>
                                    <option value="pending">Pending</option>
                                    <option value="paid">Paid</option>
                                    <option value="calcel">Cancel</option>
                                </x-select-input>
                            </div>
                        </form>

                        <!-- Table -->
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gradient-to-tr from-sky-400 to-sky-500 text-slate-50 text-left text-xs uppercase tracking-wider">
                                    <tr>
                                        <th class="py-4 px-6 font-semibold">
                                            No
                                        </th>
                                        <th class="py-4 px-6 font-semibold">
                                            Invoice
                                        </th>
                                        <th class="py-4 px-6 font-semibold">
                                            Paket
                                        </th>
                                        <th class="py-4 px-6 font-semibold">
                                            Harga
                                        </th>
                                        <th class="py-4 px-6 font-semibold">
                                            Status
                                        </th>
                                        <th class="py-4 px-6 font-semibold">
                                            Waktu
                                        </th>
                                        <th class="py-4 px-6 font-semibold">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                {{-- @dd($transactions) --}}
                                <tbody class="bg-white divide-y divide-gray-200 text-gray-700 text-sm">
                                    @forelse($transactions as $i => $item)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $i + 1 }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $item->invoice }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <a href="{{ route('user.package.item', $item->package_member_id) }}" class=" hover:underline">
                                                    {{ $item->package_member->name }}
                                                </a>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap gap-3">
                                                Rp.{{ number_format($item->final_price) }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if ($item->payment_status == 'paid')
                                                    <span class="px-4 py-2 capitalize bg-gradient-to-tr from-emerald-400 to-emerald-500 rounded-xl font-semibold text-white">
                                                        {{ $item->payment_status }}
                                                    </span>
                                                @elseif ($item->payment_status == 'pending')
                                                    <span class="px-4 py-2 capitalize bg-gradient-to-tr from-yellow-300 to-yellow-400 rounded-xl font-semibold text-white">
                                                        {{ $item->payment_status }}
                                                    </span>
                                                @else
                                                    <span class="px-4 py-2 capitalize bg-gradient-to-tr from-rose-400 to-rose-500 rounded-xl font-semibold text-white">
                                                        {{ $item->payment_status }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ \Carbon\Carbon::parse($item->created_at)->format('j F Y') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if ($item->payment_status == 'pending')
                                                    <a href="https://app.sandbox.midtrans.com/snap/v4/redirection/{{ $item->snap_token }}#/payment-list" target="_blank" class="text-sky-500 hover:text-sky-600 bg-sky-50 bg-opacity-50 px-4 py-2 border-2 border-sky-200 rounded-lg">
                                                        <i class="fa-solid fa-money-bill-wave me-1"></i> Bayar
                                                    </a>
                                                @elseif ($item->payment_status == 'paid')
                                                    @if ($item->package_member->bimbel_id != null)
                                                        <a href="{{ route('user.my-bimbel', $item->package_member->bimbel_id) }}" title="Riwayat" target="_blank" class="text-sky-50 bg-sky-500 hover:bg-sky-600 px-4 py-2 border-2 border-sky-200 rounded-lg">
                                                            <i class="fa-solid fa-eye me-1"></i> Lihat Bimbel
                                                        </a>
                                                    @else
                                                        <a href="{{ $item->package_member->tryout->is_together == 'together' ? route('user.tryouts.event.item', $item->package_member->tryout_id) : route('user.tryouts.item', $item->package_member->tryout_id) }}" title="Riwayat" target="_blank" class="text-sky-50 bg-sky-500 hover:bg-sky-600 px-4 py-2 border-2 border-sky-200 rounded-lg">
                                                            <i class="fa-solid fa-eye me-1"></i> Lihat Tryout
                                                        </a>
                                                    @endif
                                                @else
                                                    <a href="{{ route('user.package.item', $item->package_member_id) }}" target="_blank" class="text-sky-500 hover:text-sky-600 bg-sky-50 bg-opacity-50 px-4 py-2 border-2 border-sky-200 rounded-lg">
                                                        <i class="fa-solid fa-tags"></i> Beli Lagi
                                                    </a>
                                                @endif
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
                        <!-- Pagination -->
                        <div class="mt-4" wire:loading.class="opacity-50">
                            {{ $transactions->links() }}
                        </div>
                    </div>
                </div>
                <div>
                    <x-primary-link href="{{ route('user.dashboard') }}" class="">
                        Kembali
                    </x-primary-link>
                </div>
            </div>
        </div>
    </div>
</div>
