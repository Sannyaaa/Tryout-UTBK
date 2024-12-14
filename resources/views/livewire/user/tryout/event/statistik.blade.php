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
                        <a href="#" class="ml-1 text-gray-50 hover:text-sky-200 md:ml-2 dark:text-gray-300 dark:hover:text-white">Statistik</a>
                        </div>
                    </li>
                    </ol>
                </nav>
                {{-- <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">All Bimbels</h1> --}}
            </div>
        </div>

        @if ($tryout->is_together == 'together' && $results->isNotEmpty())
            <div class="mt-4">
                {{-- <div class="bg-white rounded-lg shadow px-8  py-10"> --}}
                    
                    <div>
                        <div class="mt-3">
                            <div class="bg-white shadow-lg rounded-lg overflow-hidden mb-8">
                                
                                <div class="py-8 px-10" style="width: 100%;">
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <h2 class="text-3xl font-bold text-gray-800">Hasil Pengerjaan Tryout</h2>
                                            <p class="mt-1 text-gray-600">Lihat Statistik dan Ranking dari Hasil Tryout yang sudah Kamu Selesaikan Ini.</p>
                                        </div>
                                        <div>
                                            <x-secondary-link href="{{ route('user.tryouts.event.item', $tryout->id) }}">
                                                Kembali
                                            </x-secondary-link>
                                        </div>
                                    </div>
                                    <div class="mt-5">
                                        @php
                                            $totalCorrect = $results->sum('total_correct');
                                            $totalIncorrect = $results->sum('total_incorrect');
                                            $totalUnanswered = $results->sum('total_unanswered');
                                        @endphp
                                        <div class="grid grid-cols-4 gap-4">
                                            <div>
                                                <span class="text-lg font-bold text-gray-600">Total Score</span>
                                                <h2 class="text-5xl font-bold text-sky-500">{{ $totalScore }}<span class="text-2xl font-semibold text-gray-400"> dari {{ $questions ? $questions * 4 : 0 }}</span></h2>
                                            </div>
                                            {{-- <div class="mt-4">
                                                <h2 class="text-lg font-bold text-gray-600">Hasil Jawaban</h2>
                                                <div class="grid grid-cols-2 gap-4 text-sm"> --}}
                                                    <div class="p-3 bg-sky-50 rounded-lg">
                                                        <div class="text-sky-600">Jawaban Benar</div>
                                                        <div class="font-semibold text-lg text-sky-600">{{ $totalCorrect }} Soal</div>
                                                    </div>
                                                    <div class="p-3 bg-red-50 rounded-lg">
                                                        <div class="text-red-600">Jawaban Salah</div>
                                                        <div class="font-semibold text-lg text-red-600">{{ $totalIncorrect }} Soal</div>
                                                    </div>
                                                    <div class="p-3 bg-gray-50 rounded-lg">
                                                        <div class="text-gray-600">Tidak Dijawab</div>
                                                        <div class="font-semibold text-lg text-gray-600">{{ $totalUnanswered }} Soal</div>
                                                    </div>
                                                {{-- </div>
                                            </div> --}}
                                        </div>
                                        <div class="mt-6">
                                            <h2 class="text-lg font-bold text-gray-600">Score Per Category</h2>
                                            {{-- @dd($results) --}}
                                            <div class="w-full grid md:grid-cols-2 lg:grid-cols-3 gap-4 mt-2">
                                                @foreach ($results as $result)
                                                    <div class="w-full bg-sky-50 rounded-lg py-4 px-6">
                                                        <span class="text-lg font-semibold text-sky-800">{{$result->sub_category_name }}</span>
                                                        <h2 class="text-4xl font-bold text-sky-500">{{$result->max_score }}<span class="text-xl font-semibold text-slate-500">/{{ $result->total_questions * 4 }}</span></h2>
                                                        <p class="text-slate-500">dari {{ $result->total_questions }} soal.</p>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full max-w-2xl mx-auto mt-8">
                                        <canvas id="tryoutChart"></canvas>
                                    </div>
                                </div>
                            </div>

                            @foreach ($results as $result)
                                <div class="bg-white shadow-lg rounded-lg overflow-hidden mb-8">
                                    <div class="flex justify-between items-center bg-gradient-to-tr from-sky-400 to-sky-500 text-white px-6 py-3">
                                        <h3 class="text-xl font-bold">{{ $result->sub_category_name }}</h3>
                                        @if ( \Carbon\Carbon::today() > $tryout->end_date )
                                            <span class="font-semibold hover:underline">
                                                <a href="{{ route('user.tryouts.event.results', $result->result_id) }}">Lihat Pembahasan</a>
                                            </span>
                                        @endif
                                    </div>
                                    <div class=" xl:flex justify-between w-full px-10 py-8">
                                        <div class="">
                                            <div>
                                                <h3 class="text-lg font-semibold text-gray-800 mb-4">Rincian Hasil Jawaban</h3>
                                                <div class="space-y-4">
                                                    <div class="">
                                                        <div class="bg-sky-50 text-sky-500 rounded-lg p-4 text-center">
                                                            <h2 class="text-lg font-semibold text-sky-800">Skor Anda</h2>
                                                            <span class="text-5xl font-bold text-sky-600">{{ $result->max_score }}</span>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <h2 class="text-lg font-semibold text-gray-900 mb-2">Hasil Jawaban</h2>
                                                        <div class="grid grid-cols-1 gap-2 text-gray-700">
                                                            <div class="">Jawaban Benar : <span class=" font-semibold text-sky-600">{{ $result->total_correct }} Soal</span></div>
                                                            <div class="">Jawaban Salah : <span class=" font-semibold text-rose-600">{{ $result->total_incorrect }} Soal</span></div>
                                                            <div class="">Tidak Dijawab : <span class="font-semibold">{{ $result->total_unanswered }} Soal</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <div class="w-fit lg:flex items-start gap-8"> --}}
                                            <div class="">
                                                <h3 class="text-lg font-semibold text-gray-800 mb-3">Grafik Hasil Jawaban</h3>
                                                <canvas id="pieChart-{{ $loop->index }}" class="h-64"></canvas>
                                            </div>
                                            <div>
                                                <h3 class="text-lg font-semibold text-gray-800 mb-3">Grafik Perbandingan dengan Rata-rata</h3>
                                                <canvas id="barChart-{{ $loop->index }}" class=" h-64"></canvas>
                                            </div>
                                        {{-- </div> --}}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                {{-- </div> --}}
            </div>
        @endif
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

    @if ($tryout->is_together == 'together')
        <script>
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
        </script>
    @endif

@endpush