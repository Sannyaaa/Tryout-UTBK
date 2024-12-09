@extends('layouts.app')

@section('content')

<div class="p-4 mt-12">
    {{-- <div class="p-6 bg-white block rounded-lg shadow sm:flex items-center justify-between lg:mt-1.5 dark:bg-gray-800 dark"> --}}
        <div class="w-full mb-1">
            <div class="p-6 bg-white block rounded-lg shadow sm:flex items-center justify-between lg:mt-1.5 dark:bg-gray-800 dark">
                <div class="w-full mb-1">
                    <div class="mx-6 relative -mt-12 mb-6">
                        <div class="bg-gradient-to-tr from-sky-400 to-sky-500 rounded-lg shadow-lg py-4 px-3">
                            <nav class="flex" aria-label="Breadcrumb">
                                <ol class="inline-flex items-center space-x-1 text-sm font-semibold md:space-x-2">
                                <li class="inline-flex items-center">
                                    <a href="#" class="inline-flex items-center text-white">
                                    <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                                        Dashboard
                                    </a>
                                </li>
                                <li>
                                    <div class="flex items-center">
                                    <svg class="w-6 h-6 text-gray-50" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                    <a href="#" class="ml-1 text-white md:ml-2">Laporan</a>
                                    </div>
                                </li>
                                {{-- <li>
                                    <div class="flex items-center">
                                    <svg class="w-6 h-6 text-gray-50" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                    <span class="ml-1 text-white" aria-current="page">Semua Laporan</span>
                                    </div>
                                </li> --}}
                                </ol>
                            </nav>
                            {{-- <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">All Bimbels</h1> --}}
                        </div>
                    </div>

                    <div>
                        <form method="GET" action="{{ route('admin.report.index') }}" class="flex gap-4">
                            <div>
                                <x-select-input name="year" class="">
                                    @foreach($years as $year)
                                        <option value="{{ $year }}" {{ $selectedYear == $year ? 'selected' : '' }}>
                                            {{ $year }}
                                        </option>
                                    @endforeach
                                </x-select-input>
                            </div>
                            <button class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white rounded-lg bg-gradient-to-tr from-sky-400 to-sky-500" type="submit">Filter</button>
                        </form>

                        <div style="width: 80%; margin: auto;">
                            <canvas id="revenueChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shadow-lg rounded-md p-6 bg-white mt-10">
                <div class="items-center justify-between block sm:flex md:divide-x md:divide-gray-100 dark:divide-gray-700 mb-4">
                    <form method="GET" action="{{ route('admin.report.index') }}">
                        <div class="flex justify-center gap-4">
                            <!-- Dropdown Tahun -->
                            <x-select-input name="year" class="p-2 border rounded">
                                <option value="" >Pilih Tahun</option>
                                @foreach($years as $year)
                                    <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>
                                        {{ $year }}
                                    </option>
                                @endforeach
                            </x-select-input>

                            <!-- Dropdown Bulan (Statis) -->
                            <x-select-input name="month" class="p-2 border rounded">
                                <option value="">Pilih Bulan</option>
                                <option value="1" {{ request('month') == '1' ? 'selected' : '' }}>Januari</option>
                                <option value="2" {{ request('month') == '2' ? 'selected' : '' }}>Februari</option>
                                <option value="3" {{ request('month') == '3' ? 'selected' : '' }}>Maret</option>
                                <option value="4" {{ request('month') == '4' ? 'selected' : '' }}>April</option>
                                <option value="5" {{ request('month') == '5' ? 'selected' : '' }}>Mei</option>
                                <option value="6" {{ request('month') == '6' ? 'selected' : '' }}>Juni</option>
                                <option value="7" {{ request('month') == '7' ? 'selected' : '' }}>Juli</option>
                                <option value="8" {{ request('month') == '8' ? 'selected' : '' }}>Agustus</option>
                                <option value="9" {{ request('month') == '9' ? 'selected' : '' }}>September</option>
                                <option value="10" {{ request('month') == '10' ? 'selected' : '' }}>Oktober</option>
                                <option value="11" {{ request('month') == '11' ? 'selected' : '' }}>November</option>
                                <option value="12" {{ request('month') == '12' ? 'selected' : '' }}>Desember</option>
                            </x-select-input>

                            <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white rounded-lg bg-gradient-to-tr from-sky-400 to-sky-500">Filter</button>
                        </div>
                    </form>

                    <form method="GET" action="{{ route('admin.report.index') }}">
                        @if($selectedYear)
                            <input type="hidden" name="year" value="{{ $selectedYear }}">
                        @endif
                        
                        @if(request('month'))
                            <input type="hidden" name="month" value="{{ request('month') }}">
                        @endif
                        
                        <input type="hidden" name="export" value="1">
                        
                        <button type="submit" class="px-4 py-2 bg-gradient-to-tr from-emerald-400 to-emerald-500 text-white rounded-lg">
                            Export to Excel
                        </button>
                    </form>
                </div>

                {{-- <div class="p-4 bg-white">
                    <h5 class="font-semibold text-xl mb-4">Total Paket yang di beli</h5>
                    <canvas id="laporan" width="400" height="200"></canvas>
                </div> --}}

                <div class="flex flex-col">
                    <div class="">
                        <div class="align-middle">
                            <div class=" overflow-x-scroll lg:overflow-x-hidden">
                                <table class="w-full divide-y divide-gray-200 whitespace-nowrap dark:divide-gray-600">
                                    <thead class="bg-gradient-to-tr from-sky-400 to-sky-500 text-slate-50 text-left text-xs font-semibold uppercase tracking-wider">
                                        <tr>
                                            {{-- <th scope="col" class="p-4">
                                                <div class="flex items-center">
                                                    <input id="checkbox-all" type="checkbox" class="w-4 h-4 text-blue-600rounded focus:ring-blue-500 dark:focus:ring-blue-600">
                                                    <label for="checkbox-all" class="sr-only">checkbox</label>
                                                </div>
                                            </th> --}}
                                            <th scope="col" class="p-4 ">
                                                Invoice
                                            </th>
                                            <th scope="col" class="p-4 ">
                                                Paket
                                            </th>
                                            <th scope="col" class="p-4 ">
                                                Total harga
                                            </th>
                                            <th scope="col" class="p-4 ">
                                                Status
                                            </th>
                                            <th scope="col" class="p-4 ">
                                                Tanggal
                                            </th>
                                            {{-- <th scope="col" class="p-4 ">
                                                Actions
                                            </th> --}}
                                        </tr>
                                    </thead >
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        
                                        @foreach ($report as $reports)
                                            <tr class="hoverdark:hover:bg-gray-700">
                                                    {{-- <td class="w-4 p-4">
                                                        <div class="flex items-center">
                                                            <input id="checkbox" aria-describedby="checkbox-1" type="checkbox"
                                                                class="w-4 h-4 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:focus:ring-blue-600">
                                                            <label for="checkbox" class="sr-only">checkbox</label>
                                                        </div>
                                                    </td> --}}
                                                    <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap">{{$reports->invoice}}</td>
                                                    <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap">{{$reports->package_member->name}}</td>
                                                    <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap">{{ number_format($reports->final_price)}}</td>
                                                    <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap">{{$reports->payment_status}}</td>
                                                    <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap">{{ \Carbon\Carbon::parse($reports->created_at)->format('d F Y') }}</td>
                                                    {{-- <td class="p-4 space-x-2 whitespace-nowrap">
                                                        <div class="flex justify-start gap-1">
                                                            <a href="{{ route('admin.report.edit', $reports->id) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                                                                Update
                                                            </a>
                                                            <form action="{{ route('admin.report.destroy', $reports->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                                                    Delete item
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td> --}}
                                                </tr>                   
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shadow-xl bg-gradient-to-tr from-sky-400 to-sky-500 text-white rounded px-6 py-4">
                    <ul class="flex justify-between">
                        <li class="font-bold text-xl">
                            Total Pendapatan 
                        </li>
                        <li class="font-bold text-xl">
                            Rp. {{ number_format($total) }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    {{-- </div> --}}
</div>



{{-- <div class="w-full p-4 bg-white bpromotio">
    {{ $report->links() }}
</div>   --}}


@endsection


@section('scripts')
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<!-- DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    var table = $('#reportTable').DataTable({
        processing: true,
        serverSide: true,
        order:[[4,'desc']],
        // ajax: "{{ route('admin.report.index') }}",
        ajax: {
                url: "{{ route('admin.report.index') }}",
                data: function (d) {
                    d.payment_status = $('#payment_status').val();
                }
            },
        columns: [
            {
                data: 'checkbox',
                name: 'checkbox',
                orderable: false,
                searchable: false,
                width: '5%'
            },
            {data: 'content', name: 'content'},
            {data: 'package_member.name', name: 'package_member.name'},
            {data: 'user.name', name: 'user.name'},
            {data: 'created_at', name: 'created_at'},
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            }
        ]
    });

    $('#payment_status').change(function(){
        table.draw();
    });

    // Handle "select all" checkbox
    $('#checkbox-all').on('click', function() {
        $('.report-checkbox').prop('checked', this.checked);
        updateBulkDeleteButton();
    });

    // Handle individual checkbox changes
    $('#reportTable').on('change', '.report-checkbox', function() {
        updateBulkDeleteButton();
        
        // Update "select all" checkbox
        var allChecked = $('.report-checkbox:checked').length === $('.report-checkbox').length;
        $('#checkbox-all').prop('checked', allChecked);
    });

    // Update bulk delete button visibility
    function updateBulkDeleteButton() {
        var checkedCount = $('.report-checkbox:checked').length;
        if (checkedCount > 0) {
            $('#bulkDeleteBtn').show();
        } else {
            $('#bulkDeleteBtn').hide();
        }
    }

    // Handle bulk delete
    $('#bulkDeleteBtn').on('click', function() {
        if (confirm('Are you sure you want to delete selected items?')) {
            var selectedIds = [];
            $('.report-checkbox:checked').each(function() {
                selectedIds.push($(this).val());
            });

            $.ajax({
                url: "{{ route('admin.report.bulkDelete') }}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    ids: selectedIds
                },
                success: function(response) {
                    if (response.success) {
                        // Refresh table
                        table.ajax.reload();
                        // Hide bulk delete button
                        $('#bulkDeleteBtn').hide();
                        // Uncheck "select all"
                        $('#checkbox-all').prop('checked', false);
                        // Show success message
                        alert('Selected items have been deleted successfully');
                    }
                },
                error: function(error) {
                    alert('Error deleting selected items');
                }
            });
        }
    });
});
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('revenueChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 
                'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'
            ],
            datasets: [{
                label: 'Pendapatan Bulanan (Rp)',
                data: @json($monthlyRevenueData),
                backgroundColor: 'rgba(75, 192, 192, 0.6)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Total Pendapatan (Rp)'
                    },
                    ticks: {
                        callback: function(value) {
                            return 'Rp ' + value.toLocaleString('id-ID');
                        }
                    }
                }
            },
            plugins: {
                title: {
                    display: true,
                    text: `Pendapatan Bulanan Tahun ${@json($selectedYear)}`
                }
            }
        }
    });
});
</script>

@endsection


{{-- <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    
<script type="text/javascript">
        $(document).ready(function () {
            var table = $('#reportTable').DataTable({
                processing: true,
                serverSide: true,
                report: [[5,'desc']],
                reporting: true,
                ajax: "{{ route('admin.report.index') }}",
                columns: [
                    {data: 'image', name: 'image', orderable: false, searchable: false},
                    {data: 'name', name: 'name'},
                    {data: 'description', name: 'description'},
                    {data: 'is_free', name: 'is_free'},
                    {data: 'is_together', name: 'is_together'},
                    {data: 'start_date', name: 'start_date'},
                    {data: 'end_date', name: 'end_date'},
                    {data: 'batch_id', name: 'batch_id'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });
    </script> --}}

