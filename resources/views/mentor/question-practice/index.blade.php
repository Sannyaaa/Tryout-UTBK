@extends('layouts.app')

@section('content')

<div class="p-4 mt-12">
    <div class="p-6 bg-white block rounded-lg shadow sm:flex items-center justify-between \bg-b \bg-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:\bg-gray-700">
        <div class="w-full mb-1">
            <div class="mx-6 relative -mt-12 mb-6">
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
                            <a href="#" class="ml-1 text-gray-50 hover:text-sky-200 md:ml-2 dark:text-gray-300 dark:hover:text-white">Latihan</a>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-50" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <span class="ml-1 text-gray-50 md:ml-2 dark:text-gray-500" aria-current="page">Semua Latihan</span>
                            </div>
                        </li>
                        </ol>
                    </nav>
                    {{-- <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">All Bimbels</h1> --}}
                </div>
            </div>
            <div class="items-center justify-between block sm:flex md:divide-x md:divide-gray-100 dark:divide-gray-700 mb-4">
                <div class="flex items-center mb-4 sm:mb-0">
                    <div class="flex items-center w-full sm:justify-end">
                        <div class="flex space-x-1">
                            <!-- Tambahkan tombol bulk delete yang awalnya hidden -->
                            <button id="bulkDeleteBtn" style="display: none;" class="text-white  bg-gradient-to-tr from-rose-400 to-rose-500 focus:ring-4 focus:ring-red-300 font-semibold rounded-lg text-sm px-5 py-2.5 mr-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">
                                Hapus Yang dipilih
                            </button>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center items-center gap-2">
                    <div class="">
                        <select id="payment_status" class="p-2 bquestion-practice rounded">
                            <option value="">Status Pembayaran</option>
                            <option value="pending">Pending</option>
                            <option value="paid">Dibayar</option>
                        </select>
                    </div>
                    <x-primary-link href="{{ route('mentor.question-practice.create') }}">
                        + Latihan
                    </x-primary-link>
                </div>
            </div>

            <div class="flex flex-col">
                <div class="">
                    <div class="align-middle">
                        <div class=" overflow-x-scroll lg:overflow-x-hidden">
                            <table id="question-practiceTable" class="w-full divide-y divide-gray-200 whitespace-nowrap dark:divide-gray-600">
                                <thead class="bg-gray-100 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col" class="p-4">
                                            <div class="flex items-center">
                                                <input id="checkbox-all" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 bquestion-practice-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:bquestion-practice-gray-600">
                                                <label for="checkbox-all" class="sr-only">checkbox</label>
                                            </div>
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            Pertanyaan
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            Kelas
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            Tanggal
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            Actions
                                        </th>
                                    </tr>
                                </thead >
                                {{-- <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                    
                                    @foreach ($question-practice as $question-practices)
                                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                                <td class="w-4 p-4">
                                                    <div class="flex items-center">
                                                        <input id="checkbox" aria-describedby="checkbox-1" type="checkbox"
                                                            class="w-4 h-4 bquestion-practice-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:bquestion-practice-gray-600">
                                                        <label for="checkbox" class="sr-only">checkbox</label>
                                                    </div>
                                                </td>
                                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"><img src="{{ Storage::url($question-practices->image) }}" class="w-[100px]" alt=""></td>
                                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$question-practices->name}}</td>
                                                @if ($question-practices->is_free == 'free')
                                                    <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">Gratis</td>
                                                @else
                                                    <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">Berbayar</td>
                                                @endif
                                                @if ($question-practices->is_together == 'basic')
                                                    <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">Biasa</td>
                                                @else
                                                    <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">Serentak</td>
                                                @endif
                                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$question-practices->start_date}}</td>
                                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$question-practices->end_date}}</td>
                                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$question-practices->batch->name}}</td>
                                                <td class="p-4 space-x-2 whitespace-nowrap">
                                                    <div class="flex justify-start gap-1">
                                                        <a href="{{ route('mentor.question-practice.edit', $question-practices->id) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                                                            Update
                                                        </a>
                                                        <form action="{{ route('mentor.question-practice.destroy', $question-practices->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                                                Delete item
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>                   
                                        @endforeach
                                </tbody> --}}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



{{-- <div class="w-full p-4 bg-white bquestion-practice-t bquestion-practice-gray-200">
    {{ $question-practice->links() }}
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
    var table = $('#question-practiceTable').DataTable({
        processing: true,
        serverSide: true,
        order:[[4,'desc']],
        // ajax: "{{ route('mentor.question-practice.index') }}",
        ajax: {
                url: "{{ route('mentor.question-practice.index') }}",
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
            {data: 'question', name: 'question'},
            {data: 'class_bimbel.name', name: 'class_bimbel.name'},
            // {data: 'user.name', name: 'user.name'},
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
        $('.question-practice-checkbox').prop('checked', this.checked);
        updateBulkDeleteButton();
    });

    // Handle individual checkbox changes
    $('#question-practiceTable').on('change', '.question-practice-checkbox', function() {
        updateBulkDeleteButton();
        
        // Update "select all" checkbox
        var allChecked = $('.question-practice-checkbox:checked').length === $('.question-practice-checkbox').length;
        $('#checkbox-all').prop('checked', allChecked);
    });

    // Update bulk delete button visibility
    function updateBulkDeleteButton() {
        var checkedCount = $('.question-practice-checkbox:checked').length;
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
            $('.question-practice-checkbox:checked').each(function() {
                selectedIds.push($(this).val());
            });

            $.ajax({
                url: "{{ route('mentor.question-practice.bulkDelete') }}",
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
@endsection


{{-- <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    
<script type="text/javascript">
        $(document).ready(function () {
            var table = $('#question-practiceTable').DataTable({
                processing: true,
                serverSide: true,
                question-practice: [[5,'desc']],
                question-practiceing: true,
                ajax: "{{ route('mentor.question-practice.index') }}",
                columns: [
                    {data: 'image', name: 'image', question-practiceable: false, searchable: false},
                    {data: 'name', name: 'name'},
                    {data: 'description', name: 'description'},
                    {data: 'is_free', name: 'is_free'},
                    {data: 'is_together', name: 'is_together'},
                    {data: 'start_date', name: 'start_date'},
                    {data: 'end_date', name: 'end_date'},
                    {data: 'batch_id', name: 'batch_id'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action', question-practiceable: false, searchable: false},
                ]
            });
        });
    </script> --}}

