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
                        <div class="grid grid-cols-4 gap-4">
                            <div>
                                <span class="text-lg font-bold text-gray-600">Total Score</span>
                                <h2 class="text-5xl font-bold text-sky-500">{{ $result->score }}<span class="text-2xl font-semibold text-gray-400"> dari {{ $questions ? $questions * 4 : 0 }}</span></h2>
                            </div>
                            {{-- <div class="mt-4">
                                <h2 class="text-lg font-bold text-gray-600">Hasil Jawaban</h2>
                                <div class="grid grid-cols-2 gap-4 text-sm"> --}}
                                    <div class="p-3 bg-sky-50 rounded-lg">
                                        <div class="text-sky-600">Jawaban Benar</div>
                                        <div class="font-semibold text-lg text-sky-600">{{ $result->correct_answers }} Soal</div>
                                    </div>
                                    <div class="p-3 bg-red-50 rounded-lg">
                                        <div class="text-red-600">Jawaban Salah</div>
                                        <div class="font-semibold text-lg text-red-600">{{ $result->incorrect_answers }} Soal</div>
                                    </div>
                                    <div class="p-3 bg-gray-50 rounded-lg">
                                        <div class="text-gray-600">Tidak Dijawab</div>
                                        <div class="font-semibold text-lg text-gray-600">{{ $result->unanswered }} Soal</div>
                                    </div>
                                {{-- </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="w-full flex justify-between mt-8">
                        <div class="">
                            <h3 class="text-lg font-semibold text-gray-800 mb-3">Grafik Hasil Jawaban</h3>
                            <canvas id="pieChart" class="h-64"></canvas>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-3">Grafik Perbandingan dengan Rata-rata</h3>
                            <canvas id="barChart" class=" h-64"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('body-scripts')

    <script>
        // Data dari server
        const correct = {{ $result->correct_answers }};
        const wrong = {{ $result->incorrect_answers }};
        const unanswered = {{ $result->unanswered }};

        // Konfigurasi Chart.js
        const pieCtx = document.getElementById('pieChart').getContext('2d');
        new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: ['Benar', 'Salah', 'Tidak Dijawab'],
                datasets: [{
                    data: [correct, wrong, unanswered],
                    backgroundColor: ['#4CAF50', '#F44336', '#FFC107'], // Warna untuk setiap kategori
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                const total = correct + wrong + unanswered;
                                const value = tooltipItem.raw;
                                const percentage = ((value / total) * 100).toFixed(1);
                                return `${tooltipItem.label}: ${value} (${percentage}%)`;
                            }
                        }
                    }
                }
            }
        });

        const barCtx = document.getElementById('barChart').getContext('2d');
        const scoreChart = new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: ['Skormu', 'Skor Rata-rata'],
                datasets: [{
                    label: 'Scores',
                    data: [{{ $userScore }}, {{ $averageScore }}],
                    backgroundColor: [
                        'rgba(14, 165, 233, 0.6)',
                        'rgba(125, 211, 252, 0.6)',
                    ],
                    borderColor: [
                        'rgba(14, 165, 233, 1)',
                        'rgba(125, 211, 252, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

@endpush