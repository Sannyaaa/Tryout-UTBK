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
                    <li>
                        <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-50" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 text-gray-50 md:ml-2 dark:text-gray-500" aria-current="page">Leaderboard</span>
                        </div>
                    </li>
                    </ol>
                </nav>
                {{-- <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">All Bimbels</h1> --}}
            </div>
        </div>

        {{-- @dd($firstRank) --}}

        {{-- @if ($tryout->is_together == 'together' && $results->isNotEmpty()) --}}
            <div class="mt-4">
                {{-- <div class="bg-white rounded-lg shadow px-8  py-10"> --}}
                    {{-- <div>
                        <h2 class="text-3xl font-bold text-gray-800">Hasil Pengerjaan Tryout</h2>
                        <p class="mt-2 text-gray-600">Lihat Statistik dan Ranking dari Hasil Tryout yang sudah Kamu Selesaikan Ini.</p>
                    </div> --}}
                    
                    <div class="mt-6 bg-white shadow-lg rounded-lg overflow-hidden">
                        @if ($tryout->is_together == 'together' && $firstFilters->isNotEmpty())
                            <div>
                                <div class="my-8 mx-10">
                                    <div class="flex justify-between items-center mb-6">
                                        <div>
                                            <h2 class="text-3xl font-bold text-gray-700">Urutan Ranking dari Hasil Tryout</h2>
                                            <p class="mt-1 text-gray-600">Lihat Statistik dan Ranking dari Hasil Tryout yang sudah Kamu Selesaikan Ini.</p>
                                        </div>
                                        <div>
                                            <x-secondary-link href="{{ route('user.tryouts.event.item', $tryout->id) }}">
                                                Kembali
                                            </x-secondary-link>
                                        </div>
                                    </div>
                                    @if (Auth::user()->data_universitas_id != null && Auth::user()->second_data_universitas_id != null)
                                        {{-- Tabs Navigation --}}
                                        <ol class="hidden sm:flex text-sm font-medium text-center divide-none text-gray-500 rounded-lg mx-6 gap-8  dark:text-gray-400" id="tabNavigation" data-tabs-toggle="#tabContent" role="tablist">
                                            <li class="w-full">
                                                <button 
                                                    wire:click="setActiveTab('first')"
                                                    id="first-tab" 
                                                    data-tabs-target="#first-content" 
                                                    type="button" 
                                                    role="tab" 
                                                    aria-controls="first-content" 
                                                    aria-selected="true"
                                                    class="inline-block w-full p-4 rounded-lg bg-gray-100 hover:bg-gray-200 focus:outline-none  {{ $activeTab === 'first' ? 'bg-sky-500 text-white' : '' }}">
                                                    {{ Auth::user()->data_universitas->nama_universitas }}
                                                </button>
                                            </li>
                                            <li class="w-full">
                                                <button 
                                                    wire:click="setActiveTab('second')"
                                                    id="second-tab" 
                                                    data-tabs-target="#second-content" 
                                                    type="button" 
                                                    role="tab" 
                                                    aria-controls="second-content" 
                                                    aria-selected="false"
                                                    class="inline-block w-full p-4 rounded-lg bg-gray-50 hover:bg-gray-200 focus:outline-none  {{ $activeTab === 'second' ? 'bg-sky-500 text-white' : '' }}">
                                                    {{ Auth::user()->second_data_universitas->nama_universitas }}
                                                </button>
                                            </li>
                                            <li class="h-full py-auto">
                                                {{-- Search and Pagination Controls --}}
                                                <div class="flex justify-between items-center mb-4 mx-6 my-auto">
                                                    <form wire:submit.prevent class="mb-4 flex justify-between gap-4">
                                                        <!-- Search Input -->
                                                        {{-- <div class="w-40">
                                                            <x-text-input 
                                                                type="text" 
                                                                wire:model.live.debounce.300ms="search" 
                                                                placeholder="Cari kelas..."
                                                                class=" rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500"
                                                            />
                                                        </div> --}}

                                                        <select
                                                            wire:model.live="perPage"
                                                            class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-sky-500"
                                                        >
                                                            <option value="1">1 per halaman</option>
                                                            <option value="2">2 per halaman</option>
                                                            <option value="50">50 per halaman</option>
                                                            <option value="100">100 per halaman</option>
                                                        </select>
                                                    </form>
                                                </div>
                                            </li>
                                        </ol>

                                        
                                        @if ($isPaid->isNotEmpty())
                                            {{-- Tabs Content --}}
                                            <div id="tabContent" class=" border-gray-200 dark:border-gray-600">
                                                {{-- Tab 1 Content --}}
                                                <div class="{{ $activeTab === 'first' ? '' : 'hidden' }} pt-4" id="first-content" role="tabpanel" aria-labelledby="first-tab">
                                                    <div wire:loading class="w-full text-center py-4">
                                                        <div class="animate-spin inline-block w-6 h-6 border-[3px] border-current border-t-transparent text-sky-500 rounded-full" role="status" aria-label="loading">
                                                            <span class="sr-only">Loading...</span>
                                                        </div>
                                                    </div>

                                                    <table class="min-w-full divide-y divide-gray-200">
                                                        <thead class="bg-gradient-to-tr from-sky-400 to-sky-500 text-slate-50 text-left text-xs uppercase tracking-wider">
                                                            <tr>
                                                                <th class="px-6 py-4 font-semibold">Rank</th>
                                                                <th class="px-6 py-4 font-semibold">Nama</th>
                                                                <th class="px-6 py-4 font-semibold">Total Score</th>
                                                                @foreach (explode(',', $firstFilters->first()->sub_scores) as $subCategory)
                                                                    <th class="px-6 py-4 font-semibold">{{ explode(':', $subCategory)[0] }}</th>
                                                                @endforeach
                                                            </tr>
                                                        </thead>
                                                        <tbody class="bg-white divide-y divide-gray-200 text-gray-700 text-sm">
                                                            @forelse ($firstFilters as $i => $item)
                                                                <tr class="{{ Auth::id() == $item->user_id ? 'bg-sky-50 text-sky-600 font-semibold' : '' }}">
                                                                    <td class="px-6 py-4 whitespace-nowrap">{{ $i + 1 }}</td>
                                                                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->user_name }}</td>
                                                                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->total_score }}</td>
                                                                    @foreach (explode(',', $item->sub_scores) as $subScore)
                                                                        <td class="px-6 py-4 whitespace-nowrap">{{ explode(':', $subScore)[1] }}</td>
                                                                    @endforeach
                                                                </tr>
                                                            @empty
                                                                <tr>
                                                                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                                                        Tidak ada data yang ditemukan
                                                                    </td>
                                                                </tr>
                                                            @endforelse
                                                                <tr>
                                                                    <td colspan="5" class="font-semibold text-xl text-slate-700 py-3">
                                                                        Peringkatmu Saat ini
                                                                    </td>
                                                                </tr>
                                                                <tr class="{{ Auth::id() == $firstRank['user_id'] ? 'bg-sky-50 text-sky-600 font-semibold' : '' }}">
                                                                    <td class="px-6 py-4 whitespace-nowrap">{{ $firstRank['rank'] }}</td>
                                                                    <td class="px-6 py-4 whitespace-nowrap">{{ $firstRank['user_name'] }}</td>
                                                                    <td class="px-6 py-4 whitespace-nowrap">{{ $firstRank['total_score'] }}</td>
                                                                    @foreach ($firstRank['sub_categories'] as $subScore)
                                                                        <td class="px-6 py-4 whitespace-nowrap">{{ $subScore['score'] }}</td>
                                                                    @endforeach
                                                                </tr>
                                                        </tbody>
                                                    </table>
                                                    <!-- Pagination -->
                                                    <div class="mt-4">
                                                        {{ $firstFilters->links() }}
                                                    </div>
                                                </div>

                                                {{-- Tab 2 Content --}}
                                                <div class="{{ $activeTab === 'second' ? '' : 'hidden' }} pt-4" id="second-content" role="tabpanel" aria-labelledby="second-tab">
                                                    <div wire:loading class="w-full text-center py-4">
                                                        <div class="animate-spin inline-block w-6 h-6 border-[3px] border-current border-t-transparent text-sky-500 rounded-full" role="status" aria-label="loading">
                                                            <span class="sr-only">Loading...</span>
                                                        </div>
                                                    </div>

                                                    <table class="min-w-full divide-y divide-gray-200">
                                                        <thead class="bg-gradient-to-tr from-sky-400 to-sky-500 text-slate-50 text-left text-xs uppercase tracking-wider">
                                                            <tr>
                                                                <th class="px-6 py-4 font-semibold">Rank</th>
                                                                <th class="px-6 py-4 font-semibold">Nama</th>
                                                                <th class="px-6 py-4 font-semibold">Total Score</th>
                                                                @foreach (explode(',', $secondFilters->first()->sub_scores) as $subCategory)
                                                                    <th class="px-6 py-4 font-semibold">{{ explode(':', $subCategory)[0] }}</th>
                                                                @endforeach
                                                            </tr>
                                                        </thead>
                                                        <tbody class="bg-white divide-y divide-gray-200 text-gray-700 text-sm">
                                                            @forelse ($secondFilters as $i => $item)
                                                                <tr class="{{ Auth::id() == $item->user_id ? 'bg-sky-50 text-sky-600 font-semibold' : '' }}">
                                                                    <td class="px-6 py-4 whitespace-nowrap">{{ $i + 1 }}</td>
                                                                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->user_name }}</td>
                                                                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->total_score }}</td>
                                                                    @foreach (explode(',', $item->sub_scores) as $subScore)
                                                                        <td class="px-6 py-4 whitespace-nowrap">{{ explode(':', $subScore)[1] }}</td>
                                                                    @endforeach
                                                                </tr>
                                                            @empty
                                                                <tr>
                                                                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                                                        Tidak ada data yang ditemukan
                                                                    </td>
                                                                </tr>
                                                            @endforelse
                                                                <tr>
                                                                    <td colspan="5" class="font-semibold text-xl text-gray-600 py-3">
                                                                        Peringkatmu Saat ini
                                                                    </td>
                                                                </tr>
                                                                <tr class="{{ Auth::id() == $firstRank['user_id'] ? 'bg-sky-50 text-sky-600 font-semibold' : '' }}">
                                                                    <td class="px-6 py-4 whitespace-nowrap">{{ $secondRank['rank'] }}</td>
                                                                    <td class="px-6 py-4 whitespace-nowrap">{{ $secondRank['user_name'] }}</td>
                                                                    <td class="px-6 py-4 whitespace-nowrap">{{ $secondRank['total_score'] }}</td>
                                                                    @foreach ($secondRank['sub_categories'] as $subScore)
                                                                        <td class="px-6 py-4 whitespace-nowrap">{{ $subScore['score'] }}</td>
                                                                    @endforeach
                                                                </tr>
                                                        </tbody>
                                                    </table>
                                                    <!-- Pagination -->
                                                    <div class="mt-4">
                                                        {{ $secondFilters->links() }}
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-span-full text-center py-12">
                                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                                </svg>
                                                <p class="mt-1 text-sm text-gray-800">Beli paket tryout ini untuk melihat urutan ranking dari hasil tryout ini.</p>
                                                <div class="mt-6">
                                                    {{-- @dd($package->id) --}}
                                                    @if ($package)
                                                        <a href="{{ route('package.item', $package->id) }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-sky-500 hover:bg-sky-600">
                                                            Lihat Paket
                                                        </a>
                                                    @else
                                                        <span class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-slate-600 border-slate-600 bg-slate-50 hover:bg-slate-100">
                                                            Belum ada paket tryout yang tersedia. 
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                                    @else
                                        <div>
                                            Tolong Pilih Universitas Impianmu Untuk Melihat Peringkatmu <a href="{{ route('user.profile') }}" class="text-sky-500 hover:underline">Disini.</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @else
                            <div>
                            </div>
                        @endif
                    </div>
                {{-- </div> --}}
            </div>
        {{-- @endif --}}
    </div>
</div>

@push('body-scripts')
    <script>
        document.querySelectorAll('[data-tabs-target]').forEach(tab => {
            tab.addEventListener('click', function () {
                const target = document.querySelector(this.dataset.tabsTarget);

                // Sembunyikan semua tab konten
                document.querySelectorAll('[role="tabpanel"]').forEach(panel => panel.classList.add('hidden'));

                // Reset semua tab navigasi
                document.querySelectorAll('[role="tab"]').forEach(tab => {
                    tab.classList.remove('bg-blue-500', 'text-white');
                    tab.classList.add('bg-gray-50', 'text-gray-500');
                });

                // Tampilkan konten tab yang dipilih
                target.classList.remove('hidden');
                this.classList.add('bg-blue-500', 'text-white');
            });
        });

    </script>
    <script>
        // Initialize tabs
        document.addEventListener('livewire:load', function () {
            const tabs = document.querySelectorAll('[data-tabs-target]');
            const contents = document.querySelectorAll('[role="tabpanel"]');

            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    // Hide all contents
                    contents.forEach(content => {
                        content.classList.add('hidden');
                    });

                    // Show selected content
                    const target = document.querySelector(tab.dataset.tabsTarget);
                    target.classList.remove('hidden');

                    // Update aria-selected
                    tabs.forEach(t => t.setAttribute('aria-selected', 'false'));
                    tab.setAttribute('aria-selected', 'true');
                });
            });

            // Show first tab by default
            if (tabs.length > 0) {
                tabs[0].click();
            }
        });
    </script>

    {{-- @if ($tryout->is_together == 'together') --}}
        {{-- <script>
            const chartData = @json($results); // Mengambil data dari PHP
            const labels = chartData.map(item => item.sub_category_name); // Label kategori
            const totalScores = chartData.map(item => item.max_score); // Total skor
            const avgScores = chartData.map(item => item.avg_score); // Rata-rata skor

            const ctx = document.getElementById('tryoutChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels, // Nama sub_category
                    datasets: [
                        {
                            label: 'Total Skor',
                            data: totalScores, // Total skor
                            backgroundColor: 'rgba(14, 165, 233, 0.6)',
                            borderColor: 'rgba(14, 165, 233, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Rata-rata Skor',
                            data: avgScores, // Rata-rata skor
                            backgroundColor: 'rgba(125, 211, 252, 0.6)',
                            borderColor: 'rgba(125, 211, 252, 1)',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { position: 'top' },
                        tooltip: { enabled: true }
                    },
                    scales: {
                        x: { beginAtZero: true },
                        y: { beginAtZero: true }
                    }
                }
            });
        </script>

        <script>
            const results = @json($results); // Data dari PHP

            results.forEach((result, index) => {
                // Bar Chart untuk Score dan Average
                const barCtx = document.getElementById(`barChart-${index}`).getContext('2d');
                new Chart(barCtx, {
                    type: 'bar',
                    data: {
                        labels: ['Total Skor', 'Rata-rata Skor'],
                        datasets: [{
                            label: 'Scores',
                            data: [result.max_score, result.avg_score],
                            backgroundColor: ['rgba(14, 165, 233, 0.6)', 'rgba(125, 211, 252, 0.6)'],
                            borderColor: ['rgba(14, 165, 233, 1)', 'rgba(125, 211, 252, 1)'],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: { legend: { display: false } },
                        scales: { y: { beginAtZero: true } }
                    }
                });

                // Pie Chart untuk Jawaban
                const pieCtx = document.getElementById(`pieChart-${index}`).getContext('2d');
                new Chart(pieCtx, {
                    type: 'pie',
                    data: {
                        labels: ['Benar', 'Salah', 'Tidak Dijawab'],
                        datasets: [{
                            data: [result.total_correct, result.total_incorrect, result.total_unanswered],
                            backgroundColor: ['rgba(54, 162, 235, 0.6)', 'rgba(255, 99, 132, 0.6)', 'rgba(255, 206, 86, 0.6)'],
                            borderColor: ['rgba(54, 162, 235, 1)', 'rgba(255, 99, 132, 1)', 'rgba(255, 206, 86, 1)'],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: { legend: { position: 'top' } }
                    }
                });
            });
        </script> --}}
    {{-- @endif --}}

@endpush