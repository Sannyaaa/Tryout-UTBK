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
                                <a href="{{ route('admin.tryout.index') }}" class="ml-1 text-gray-50 hover:text-sky-200 md:ml-2 dark:text-gray-300 dark:hover:text-white">Class</a>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-50" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                <span class="ml-1 text-gray-50 md:ml-2 dark:text-gray-500" aria-current="page">Detail Tryout</span>
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
                            <h2 class="text-sm text-gray-500 mb-4">Name Tryout <br><span class="text-lg font-bold text-gray-800">{{ $tryout->name }}</span></h2>
                            <p class="text-sm text-gray-500">Description <br><span class="text-lg font-bold text-gray-800">{!! $tryout->description !!}</span></p>
                        </div>
                        <div class="w-full px-4">
                        <h3 class="text-sm text-gray-500 mb-4">Berbayar / Gratis <br>
                            @if ( $tryout->is_free == 'free' )
                                <span class="text-lg font-bold text-gray-800 mb-4">Gratis</span>
                            @else
                                <span class="text-lg font-bold text-gray-800 mb-4">Berbayar</span>
                            @endif
                        </h3>
                        @php
                            use Carbon\Carbon;
                        @endphp
                        <h3 class="text-sm text-gray-500  mb-4">Biasa / Serentak <br>
                            @if ( $tryout->is_together == 'together' )
                                <p class="text-lg font-bold text-gray-800 mb-4">Serentak</p>
                                <span class="text-sm text-gray-500">Tanggal</span>
                                <p class="text-lg font-bold text-gray-800 mb-4">{{ Carbon::parse($tryout->start_date)->format('d F Y') }} - {{ Carbon::parse($tryout->end_date)->format('d F Y') }} </p>
                            @else
                                <span class="text-lg font-bold text-black mb-4">Biasa</span>
                            @endif
                        </h3>
                    </div>
                    </div>
                </main>
            </div>

            <div class="items-center justify-between block my-6 sm:flex md:divide-x md:divide-gray-100 dark:divide-gray-700">
                <h3 class="text-2xl text-gray-800 font-bold">
                    Daftar Pertanyaan {{ $tryout->name }}
                </h3>
                <div class="flex justify-center gap-3">
                    <a href="{{ route('admin.tryout.sub-category', ['tryout' => $tryout->id, 'sub_categories' => $sub_categories->id, 'export_excel' => true]) }}" 
                        class="inline-flex items-center px-3 py-2 text-sm font-semibold text-center text-white rounded-lg bg-gradient-to-tr from-green-400 to-green-500 hover:bg-green-800 focus:ring-4 focus:ring-green-300">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                        </svg>
                        Export Excel
                    </a>
                    <x-primary-link href="{{ route('admin.tryout.question.create', $tryout->id) }}">
                        Buat Pertanyaan
                    </x-primary-link>
                </div>
            </div>

            <div class="flex flex-col">
                <div class="overflow-x-auto">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden shadow">
                            <table class="min-w-full divide-y divide-gray-200 border-gray-200 border-2 whitespace-nowrap dark:divide-gray-600">
                                <thead class="bg-gradient-to-tr from-sky-400 to-sky-500 text-slate-50 text-left text-xs uppercase tracking-wider">
                                    <tr>
                                        <th scope="col" class="p-4">
                                            No
                                        </th>
                                        <th scope="col" class="p-4">
                                            Pertanyaan
                                        </th>
                                        <th scope="col" class="p-4">
                                            Jawaban Benar
                                        </th>
                                        <th scope="col" class="p-4">
                                            Tanggal
                                        </th>
                                        <th scope="col" class="p-4">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">    
                                    @foreach ($questions as $i => $question)
                                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <td class="p-4 text-base font-semibold text-gray-900 whitespace-nowrap dark:text-white">{{$i + 1}}</td>
                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">{!! $question->question !!}</td>
                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$question->correct_answer}}</td>
                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ Carbon::parse($question->created_at)->format('d F Y') }}</td>
                                            <td class="p-4 space-x-2 whitespace-nowrap">
                                                <div class="flex justify-start gap-1">
                                                    <a href="{{ route('admin.tryout.question.edit', [$tryout->id, $question->id]) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-sky-500 hover:bg-sky-600 focus:ring-4 focus:ring-sky-300 dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800">
                                                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                                                        Update
                                                    </a>
                                                    <form action="{{ route('admin.tryout.question.destroy', [$tryout->id, $question->id]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-rose-500 rounded-lg hover:bg-rose-600 focus:ring-4 focus:ring-rose-300 dark:focus:ring-rose-900">
                                                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
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

            <div class="items-center justify-between block my-6 sm:flex md:divide-x md:divide-gray-100 dark:divide-gray-700">
                <h3 class="text-2xl text-gray-800 font-bold">
                    Daftar Hasil Peserta
                </h3>
                {{-- <a href="{{ route('admin.tryout.question.create', $tryout->id) }}" class="text-white bg-gradient-to-tr from-sky-400 to-sky-500 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" type="button" data-drawer-target="drawer-create-product-default" data-drawer-show="drawer-create-product-default" aria-controls="drawer-create-product-default" data-drawer-placement="right">
                    Add new Question
                </a> --}}
                {{-- <x-primary-link href="{{ route('admin.tryout.question.create', $tryout->id) }}">
                    Buat Pertanyaan
                </x-primary-link> --}}
            </div>

            <div class="flex flex-col">
                <div class="overflow-x-auto">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden shadow">
                            <table class="min-w-full divide-y divide-gray-200 border-gray-200 border-2 whitespace-nowrap dark:divide-gray-600">
                                <thead class="bg-gradient-to-tr from-sky-400 to-sky-500 text-slate-50 text-left text-xs uppercase tracking-wider">
                                    <tr>
                                        <th scope="col" class="p-4">
                                            No
                                        </th>
                                        <th scope="col" class="p-4">
                                            Email Peserta
                                        </th>
                                        <th scope="col" class="p-4">
                                            Total Poin
                                        </th>
                                        <th scope="col" class="p-4">
                                            Benar
                                        </th>
                                        <th scope="col" class="p-4">
                                            Salah
                                        </th>
                                        <th scope="col" class="p-4">
                                            Tidak Dijawab
                                        </th>
                                        <th scope="col" class="p-4">
                                            Tanggal Submit
                                        </th>
                                        <th scope="col" class="p-4">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">    
                                    @forelse ($results as $i => $result)
                                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <td class="p-4 text-base font-semibold text-gray-900 whitespace-nowrap dark:text-white">{{$i + 1}}</td>
                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"> <a href="{{ route('admin.user.edit', $result->user_id) }}">{{$result->user->email}}</a></td>
                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$result->score}}</td>
                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$result->correct_answers}}</td>
                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$result->incorrect_answers}}</td>
                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$result->unanswered}}</td>
                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ Carbon::parse($result->created_at)->format('d F Y') }}</td>
                                            <td class="p-4 space-x-2 whitespace-nowrap">
                                                {{-- @dd($result->sub_category_id) --}}
                                                <div class="flex justify-start gap-1">
                                                    <a href="{{ route('admin.tryout.result', [$result->tryout_id, $result->sub_category_id, $result->id]) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-emerald-700 hover:bg-emerald-800 focus:ring-4 focus:ring-emerald-300 dark:bg-emerald-600 dark:hover:bg-emerald-700 dark:focus:ring-emerald-800">
                                                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                                                        Detail
                                                    </a>
                                                    <a href="{{ route('admin.user.edit', $result->user_id) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-sky-500 hover:bg-sky-600 focus:ring-4 focus:ring-sky-300 dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800">
                                                        User
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>  
                                    @empty
                                        <tr class="text-center text-gray-900">
                                            <td class="py-5 text-center" colspan="7">
                                                <p class="text-sm">Belum ada peserta untuk tryout ini.</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>  

            <div class="mt-6 inline-block">
                <x-secondary-link href="{{ route('admin.tryout.show', $tryout->id) }}" class="">
                    Kembali
                </x-secondary-link>
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

