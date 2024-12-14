@extends('layouts.app')

@section('content')
    <div class="px-4 pt-10">
        <div class="grid gap-4 xl:grid-cols-2 2xl:grid-cols-4">
            <!-- Main widget -->
            <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-lg 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <div class="flex items-center justify-between mb-4">
                <div class="flex-shrink-0">
                    <span class="text-sm font-bold leading-none text-gray-900 sm:text-2xl dark:text-white">Hi, {{ Auth::user()->name }} 🎉</span>
                    <h3 class="pt-3 text-base font-light text-gray-500 dark:text-gray-400">Ingatlah admin, Ada {{ $upcoming_tryouts ?? '' }} tryout akan segera dimulai. Pastikan semua <br>persiapan sudah selesai agar semua sistem berfungsi dengan baik.</h3>
                </div>
                {{-- <div class="flex items-center justify-end flex-1 text-base font-medium text-green-500 dark:text-green-400">
                    12.5%
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                    </svg>
                </div> --}}
                </div>
                <div id="main-chart"></div>
                {{-- <!-- Card Footer -->
                <div class="flex items-center justify-between pt-3 mt-4 border-t border-gray-200 sm:pt-6 dark:border-gray-700">
                    <div>
                        <button class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 rounded-lg hover:text-gray-900 dark:text-gray-400 dark:hover:text-white" type="button" data-dropdown-toggle="weekly-sales-dropdown">Last 7 days <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
                        <!-- Dropdown menu -->
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="weekly-sales-dropdown">
                            <div class="px-4 py-3" role="none">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white" role="none">
                                Sep 16, 2021 - Sep 22, 2021
                            </p>
                            </div>
                            <ul class="py-1" role="none">
                            <li>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Yesterday</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Today</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Last 7 days</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Last 30 days</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Last 90 days</a>
                            </li>
                            </ul>
                            <div class="py-1" role="none">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Custom...</a>
                            </div>
                        </div>
                    </div>
                    <div class="flex-shrink-0">
                        <a href="#" class="inline-flex items-center p-2 text-xs font-medium uppercase rounded-lg text-primary-700 sm:text-sm hover:bg-gray-100 dark:text-primary-500 dark:hover:bg-gray-700">
                        Sales Report
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>
                </div> --}}
            </div>
            <!--Tabs widget -->
            <div class="p-4 bg-white border border-gray-200 rounded-lg 2xl:col-span-2 shadow-lg dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <h3 class="font-sans text-sm font-semibold leading-normal uppercase text-gray-500 dark:text-white dark:opacity-60">Total Pendapatan
                {{-- <button data-popover-target="popover-description" data-popover-placement="bottom-end" type="button"><svg class="w-4 h-4 ml-2 text-gray-400 hover:text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg><span class="sr-only">Show information</span></button> --}}
                </h3>
                {{-- <div data-popover id="popover-description" role="tooltip" class="absolute z-10 invisible inline-block text-sm font-light text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                    <div class="p-3 space-y-2">
                        <h3 class="font-semibold text-gray-900 dark:text-white">Statistics</h3>
                        <p>Statistics is a branch of applied mathematics that involves the collection, description, analysis, and inference of conclusions from quantitative data.</p>
                        <a href="#" class="flex items-center font-medium text-primary-600 dark:text-primary-500 dark:hover:text-primary-600 hover:text-primary-700">Read more <svg class="w-4 h-4 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg></a>
                    </div>
                    <div data-popper-arrow></div>
                </div> --}}
                {{-- <div class="sm:hidden">
                    <label for="tabs" class="sr-only">Select tab</label>
                    <select id="tabs" class="bg-gray-50 border-0 border-b border-gray-200 text-gray-900 text-sm rounded-t-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option>Statistics</option>
                        <option>Services</option>
                        <option>FAQ</option>
                    </select>
                </div> --}}
                {{-- <ul class="hidden text-sm font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-lg sm:flex dark:divide-gray-600 dark:text-gray-400" id="fullWidthTab" data-tabs-toggle="#fullWidthTabContent" role="tablist">
                    <li class="w-full">
                        <button id="faq-tab" data-tabs-target="#faq" type="button" role="tab" aria-controls="faq" aria-selected="true" class="inline-block w-full p-4 rounded-tl-lg bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Top products</button>
                    </li>
                    <li class="w-full">
                        <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="false" class="inline-block w-full p-4 rounded-tr-lg bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Top Customers</button>
                    </li>
                </ul> --}}
                <!-- Card Footer -->
                <div class="flex items-center justify-between sm:pt-6 ">
                    <div>
                        <a href="#" class="font-semibold text-slate-700 text-3xl dark:text-white">
                        Rp {{ number_format($order) ?? '' }}
                        {{-- <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg> --}}
                        </a>
                    </div>
                    <div class="px-3 text-right basis-1/3">
                        <div class="flex justify-center items-center ms-auto w-12 h-12 text-center rounded-xl bg-gradient-to-tl from-sky-400 to-sky-500">
                        <i class="fa-solid fa-money-bill-1-wave text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid col-span-1 md:grid-cols-2 lg:grid-cols-2 my-6 gap-6">

            <!-- card2 -->
            <div class="">
                <div class="relative flex flex-col min-w-0 break-words bg-white shadow-lg dark:bg-slate-850 rounded-lg dark:shadow-dark-xl">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                            <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase text-gray-500 dark:text-white dark:opacity-60">Event Tryout Akan Datang</p>
                            <h5 class="mb-2 font-semibold text-slate-700 text-lg dark:text-white">{{ $upcoming_tryouts ?? '' }} </h5>
                            {{-- <p class="mb-0 dark:text-white dark:opacity-60">
                                <span class="text-sm font-bold leading-normal {{ $revenueDifference > 0 ? 'text-green-500' : ($revenueDifference < 0 ? 'text-red-500' : 'text-gray-500') }}">{{ $revenueDifference > 0 ? '+' : ''}}{{ number_format($revenueDifference) }}</span>
                                than yesterday
                            </p> --}}
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div class="flex justify-center items-center ms-auto w-12 h-12 text-center rounded-xl bg-gradient-to-tl from-sky-400 to-sky-500">
                            <i class="fa-solid fa-file-invoice text-white"></i>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- card3 -->
            <div class="">
                <div class="relative flex flex-col min-w-0 break-words bg-white shadow-lg dark:bg-slate-850 rounded-lg dark:shadow-dark-xl">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase text-gray-500 dark:text-white dark:opacity-60">Event Tryout Berlangsung</p>
                                <h5 class="mb-2 font-semibold text-slate-700 text-lg dark:text-white">{{ $ongoing_tryouts }} </h5>
                                {{-- <p class="mb-0 dark:text-white dark:opacity-60">
                                    <span class="text-sm font-bold leading-normal {{ $salesMonthDifference > 0 ? 'text-green-500' : ($salesMonthDifference < 0 ? 'text-red-500' : 'text-gray-500') }}">{{ $salesMonthDifference > 0 ? '+' : ''}}{{ number_format($salesMonthDifference) }}</span>
                                    than last month
                                </p> --}}
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div class="flex justify-center items-center ms-auto w-12 h-12 text-center rounded-xl bg-gradient-to-tl from-sky-400 to-sky-500">
                            <i class="fa-solid fa-file-invoice text-white"></i>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid col-span-1 md:grid-cols-2 lg:grid-cols-2 my-6 gap-6">
            <!-- card1 -->
            <div class="">
                <div class="relative flex flex-col min-w-0 break-words bg-white shadow-lg dark:bg-slate-850 rounded-lg dark:shadow-dark-xl">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <div>
                                    <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase text-gray-500 dark:text-white dark:opacity-60">Total Bimbel</p>
                                    <h5 class="mb-2 font-semibold text-slate-700 text-lg dark:text-white"> {{ $total_bimbel }} Bimbel</h5>
                                    {{-- <x-primary-link class="p-1">
                                        <span class="text-sm leading-normal dark:text-white">More Details</span>
                                    </x-primary-link> --}}
                                </div>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div class="flex justify-center items-center ms-auto w-12 h-12 text-center rounded-xl bg-gradient-to-tl from-sky-400 to-sky-500">
                                <i class="fa-solid fa-graduation-cap text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- card2 -->
            <div class="">
                <div class="relative flex flex-col min-w-0 break-words bg-white shadow-lg dark:bg-slate-850 rounded-lg dark:shadow-dark-xl">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <div>
                                <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase text-gray-500 dark:text-white dark:opacity-60">Total Paket</p>
                                <h5 class="mb-2 font-semibold text-slate-700 text-lg dark:text-white"> {{ $total_paket }} Paket</h5>
                                {{-- <p class="mb-0 dark:text-white dark:opacity-60">
                                    <span class="text-sm font-bold leading-normal {{ $revenueDifference > 0 ? 'text-green-500' : ($revenueDifference < 0 ? 'text-red-500' : 'text-gray-500') }}">{{ $revenueDifference > 0 ? '+' : ''}}{{ number_format($revenueDifference) }}</span>
                                    than yesterday
                                </p> --}}
                                </div>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div class="flex justify-center items-center ms-auto w-12 h-12 text-center rounded-xl bg-gradient-to-tl from-sky-400 to-sky-500">
                                <i class="fa-solid fa-box-open text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- 2 columns -->
        <div class="grid grid-cols-1 my-4 xl:grid-cols-2 space-y-4 xl:space-y-0 xl:gap-4">
           <!-- Doughnut Chart for Traffic Source -->
            <div class="shadow-lg rounded-md p-4 bg-white">
                <h5 class="font-semibold text-xl mb-4">Total User Berdasarkan Jenis Kelamin</h5>
                <canvas id="doughnutChartJenis"></canvas>
            </div>

            <div class="shadow-lg rounded-md p-4 bg-white">
                <h5 class="font-semibold text-xl mb-4">Total User Berdasarkan Status</h5>
                <canvas id="doughnutChart"></canvas>
            </div>
        </div>
        <!-- 2 columns -->
        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-lg dark:border-gray-700 sm:p-6 dark:bg-gray-800">

            <!-- Bar Chart for Monthly Sales -->
            <div class="p-4 bg-white">
                <h5 class="font-semibold text-xl mb-4">Total Paket yang di beli</h5>
                <canvas id="packageSalesChart" width="400" height="200"></canvas>
            </div>
        </div>
        
        <div class="p-4 mt-4 bg-white border border-gray-200 rounded-lg shadow-lg dark:border-gray-700 sm:p-6 dark:bg-gray-800">

            <div class="p-4 bg">
                <h1 class="font-semibold text-xl mb-4">Data Peserta yang Menyelesaikan Tryout Serentak</h1>
                <canvas id="resultChart"></canvas>
            </div>
        </div>

    </div>
@endsection

@section('scripts')

    <script type="module">
      import Chart from 'chart.js/auto';
  </script>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>

        
        
    document.addEventListener('DOMContentLoaded', function () {
        // Chart 1: Doughnut (Kelas)
        const doughnutChart = document.getElementById('doughnutChart');
        if (doughnutChart) {
            new Chart(doughnutChart, {
                type: 'doughnut',
                data: {
                    labels: ['Kelas 10', 'Kelas 11', 'Kelas 12', 'Kuliah', 'Gep Year'],
                    datasets: [{
                        label: 'Total',
                        data: [{{ $total_user_kelas_10 }}, {{ $total_user_kelas_11 }}, {{ $total_user_kelas_12 }}, {{ $total_user_kuliah }}, {{ $total_user_gep_year }}],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(76, 212, 245, 0.2)',
                            'rgba(222, 245, 76, 0.2)',
                            'rgba(245, 193, 76, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(76, 212, 245, 1)',
                            'rgba(222, 245, 76, 1)',
                            'rgba(245, 193, 76, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: { responsive: true }
            });
        }

        // Chart 2: Doughnut (Jenis Kelamin)
        const doughnutChartJenis = document.getElementById('doughnutChartJenis');
        if (doughnutChartJenis) {
            new Chart(doughnutChartJenis, {
                type: 'doughnut',
                data: {
                    labels: ['Laki-laki', 'Perempuan'],
                    datasets: [{
                        label: 'Total',
                        data: [{{ $total_user_lk }}, {{ $total_user_pr }}],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(75, 192, 192, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(75, 192, 192, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: { responsive: true }
            });
        }

        // Chart 3: Bar Chart (Package Sales)
        const packageSalesChart = document.getElementById('packageSalesChart');
        if (packageSalesChart) {
            const packageSales = @json($packageSales);
            const labels = packageSales.map(data => data.package_name);
            const data = packageSales.map(data => data.total_sales);

            new Chart(packageSalesChart, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Total Pembelian',
                        data: data,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: { scales: { y: { beginAtZero: true } } }
            });
        }

        var ctx = document.getElementById('resultChart').getContext('2d');
        var resultChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    label: 'Jumlah Peserta Yang Telah Menyelesaikan Seluruh Sub Kategori',
                    data: {!! json_encode($data) !!},
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(255, 99, 132, 0.6)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1,
                            callback: function(value) {
                                return value + ' peserta';
                            }
                        },
                        title: {
                            display: true,
                            text: 'Jumlah Peserta'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Nama Tryout'
                        }
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Statistik Penyelesaian Tryout',
                        font: {
                            size: 16
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `${context.dataset.label}: ${context.parsed.y} peserta`;
                            }
                        }
                    }
                }
            }
        });
    });


    </script>

@endsection
