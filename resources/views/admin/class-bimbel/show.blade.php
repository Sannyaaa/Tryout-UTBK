@extends('layouts.app')

@section('content')

<div class="p-4 mt-12">
    <div class="p-6 bg-white block rounded-lg shadow sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
        <div class="w-full mb-1">
            <div class="mx-6 relative -mt-12 mb-6">
                <div class="bg-gradient-to-tr from-sky-400 to-sky-500 rounded-lg shadow-lg py-4 px-3">
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 text-sm font-semibold md:space-x-2">
                        <li class="inline-flex items-center">
                            <a href="{{ route('dashboard') }}" class="inline-flex items-center text-gray-50 hover:text-sky-200 dark:text-gray-300 dark:hover:text-white">
                            <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-50" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <a href="{{ route('admin.class-bimbel.index') }}" class="ml-1 text-gray-50 hover:text-sky-200 md:ml-2 dark:text-gray-300 dark:hover:text-white">Kelas</a>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-50" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <span class="ml-1 text-gray-50 md:ml-2 dark:text-gray-500" aria-current="page">Detail Kelas</span>
                            </div>
                        </li>
                        </ol>
                    </nav>
                    {{-- <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">All Bimbels</h1> --}}
                </div>
            </div>


            <div class="">
                <main class="rounded-lg bg-white shadow mx-auto px-4 py-10">
                    <div class="grid lg:grid-cols-2 gap-2">
                        <div class="w-full lg:w-2/3 px-4">
                            <h3 class="text-sm text-gray-500 mb-4">Nama kelas <br>
                                <span class="text-lg font-semibold text-gray-700">{{ $classBimbel->name }}</span>
                            </h3>
                            <h3 class="text-sm text-gray-500 mb-4">Bimbel <br>
                                <span class="text-lg font-semibold text-gray-700">{{ $classBimbel->bimbel->name }}</span>
                            </h3>
                            <h3 class="text-sm text-gray-500 mb-4">Materi Pelajaran <br>
                                <span class="text-lg font-semibold text-gray-700">{{ $classBimbel->sub_categories->name }}</span>
                            </h3>
                            <h3 class="text-sm text-gray-500 mb-4">Tanggal <br>
                                <span class="text-lg font-semibold text-gray-700">{{ date('j F Y', strtotime($classBimbel->date)) .' '. date('h:i A', strtotime($classBimbel->start_time)) }}</span>
                            </h3>
                        </div>
                        <div class="w-full lg:w-1/2 px-4">
                            <h3 class="text-sm text-gray-500 mb-4">Pemateri <br>
                                <span class="text-lg font-semibold text-gray-700 mb-4">{{ $classBimbel->user->name ?? 'Belum di tambahkan' }}</span>
                            </h3>
                            <h3 class="text-sm text-gray-500 mb-4">Link Zoom <br>
                                <span class="text-lg font-semibold text-gray-700 mb-4">{{ $classBimbel->link_zoom ?? 'Belum di tambahkan' }}</span>
                            </h3>
                            <h3 class="text-sm text-gray-500  mb-4">Link Video <br>
                                <span class="text-lg font-semibold text-gray-700 mb-4">{{ $classBimbel->link_video ?? 'Belum di tambahkan' }}</span>
                            </h3>
                            <h3 class="text-sm text-gray-500  mb-4">Link Materi <br>
                                <span class="text-lg font-semibold text-gray-700 mb-4">{{ $classBimbel->materi ?? 'Belum di tambahkan' }}</span>
                            </h3>
                        </div>
                    </div>
                </main>
            </div>


        
            <div class="items-center justify-between block mt-6 mb-4 sm:flex md:divide-x md:divide-gray-100 dark:divide-gray-700">
                <h3 class="text-2xl text-gray-800 font-bold">
                    Daftar Pertanyaan
                </h3>
                <x-primary-link href="{{ route('admin.class.question.create', $classBimbel->id) }}" class="">
                    Tambah Pertanyaan
                </x-primary-link>
            </div>

            <div class="flex flex-col">
                <div class="overflow-x-auto">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden shadow">
                            <table class="min-w-full divide-y divide-gray-200 border-gray-200 border-2 whitespace-nowrap dark:divide-gray-600">
                                <thead class="bg-gradient-to-tr from-sky-400 to-sky-500 text-slate-50 text-left text-xs font-semibold uppercase tracking-wider">
                                    <tr>
                                        {{-- <th scope="col" class="p-4">
                                            <div class="flex items-center">
                                                <input id="checkbox-all" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="checkbox-all" class="sr-only">checkbox</label>
                                            </div>
                                        </th> --}}
                                        {{-- <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            Image
                                        </th> --}}
                                        <th scope="col" class="px-6 py-4">
                                            No
                                        </th>
                                        <th scope="col" class="px-6 py-4">
                                            Pertanyaan
                                        </th>
                                        <th scope="col" class="px-6 py-4">
                                            Tanggal
                                        </th>
                                        <th scope="col" class="px-6 py-4">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">    
                                    @foreach ($questions as $i => $question)
                                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <td class="p-4 text-base font-semibold text-gray-900 whitespace-nowrap dark:text-white">{{$i + 1}}</td>
                                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">{!! $question->question !!}</td>
                                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$question->created_at->format('j F Y')}}</td>
                                                <td class="p-4 space-x-2 whitespace-nowrap">
                                                    <div class="flex justify-start gap-1">
                                                        <a href="{{ route('admin.class.question.edit', [ 'class_bimbel' => $classBimbel->id, 'question' => $question->id]) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-gradient-to-tr from-sky-400 to-sky-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                            Update
                                                        </a>
                                                        <form action="{{ route('admin.question-practice.destroy',  $question->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <x-text-input type="hidden" value="{{ route('admin.class-bimbel.show', $classBimbel->id) }}" name="back" id="back" />
                                                            <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-gradient-to-tr from-rose-400 to-rose-500 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                                                Delete item
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>                   
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>


{{-- <div class="w-full p-4 bg-white border-t border-gray-200">
    {{ $question->links() }}
</div>   --}}


@endsection


{{-- @section('scripts')
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<!-- DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    var table = $('#tryoutTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.tryout.index') }}",
        columns: [
            {
                data: 'checkbox',
                name: 'checkbox',
                orderable: false,
                searchable: false,
                width: '5%'
            },
            {data: 'name', name: 'name'},
            {
                data: 'is_free',
                name: 'is_free', 
                render: function(data, type, row) {
                    if(data == 'free') {
                        return '<span class="text-success">Gratis</span>';
                    } else {
                        return '<span class="text-danger">Berbayar</span>';
                    }
                }
            },
            {
                data: 'is_together',
                name: 'is_together',
                render: function(data, type, row) {
                    if(data == 'together') {
                        return '<span class="text-success">Serentak</span>';
                    } else {
                        return '<span class="text-danger">Biasa</span>';
                    }
                }
            },
            {data: 'start_date', name: 'start_date'},
            {data: 'end_date', name: 'end_date'},
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            }
        ]
    });

    // Handle "select all" checkbox
    $('#checkbox-all').on('click', function() {
        $('.tryout-checkbox').prop('checked', this.checked);
        updateBulkDeleteButton();
    });

    // Handle individual checkbox changes
    $('#tryoutTable').on('change', '.tryout-checkbox', function() {
        updateBulkDeleteButton();
        
        // Update "select all" checkbox
        var allChecked = $('.tryout-checkbox:checked').length === $('.tryout-checkbox').length;
        $('#checkbox-all').prop('checked', allChecked);
    });

    // Update bulk delete button visibility
    function updateBulkDeleteButton() {
        var checkedCount = $('.tryout-checkbox:checked').length;
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
            $('.tryout-checkbox:checked').each(function() {
                selectedIds.push($(this).val());
            });

            $.ajax({
                url: "{{ route('admin.tryout.bulkDelete') }}",
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
@endsection --}}


{{-- <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    
<script type="text/javascript">
        $(document).ready(function () {
            var table = $('#tryoutTable').DataTable({
                processing: true,
                serverSide: true,
                order: [[5,'desc']],
                ordering: true,
                ajax: "{{ route('admin.tryout.index') }}",
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

