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
                    {{-- <h1>Informasi</h1> --}}
                    <div class="grid lg:grid-cols-2 gap-2">
                        <div class="w-full lg:w-1/2 px-4 space-y-3 text-sm text-gray-500">
                            <h2 class="">Name Peserta 
                                <br>
                                <a href="{{ route('admin.user.edit',$result->user_id) }}"><span class="text-xl font-semibold text-gray-700">{{ $result->user->name }}</span></a>
                            </h2>
                            <h2 class="">Email Peserta 
                                <br>
                                <a href="{{ route('admin.user.edit',$result->user_id) }}"><span class="text-xl font-semibold text-gray-700">{{ $result->user->email }}</span></a>
                            </h2>
                            <h2 class="">Name Tryout 
                                <br>
                                <a href="{{ route('admin.tryout.show', $result->tryout_id) }}"><span class="text-xl font-semibold text-gray-700">{{ $result->tryout->name }}</span></a>
                            </h2>
                            <h2 class="">Materi <br><span class="text-xl font-semibold text-gray-700">{{ $result->sub_category->name }}</span></h2>
                            
                        </div>
                        <div class="w-full lg:w-1/2 px-4 space-y-3 text-sm text-gray-500">
                            <h2 class="">Total Skor <br><span class="text-xl font-semibold text-gray-700">{{ $result->score }} Poin</span></h2>
                            <h2 class="">Jawaban Benar <br><span class="text-xl font-semibold text-gray-700">{{ $result->correct_answers }} soal</span></h2>
                            <h2 class="">Jawaban Salah <br><span class="text-xl font-semibold text-gray-700">{{ $result->incorrect_answers }} soal</span></h2>
                            <h2 class="">Tidak Dijawab <br><span class="text-xl font-semibold text-gray-700">{{ $result->unanswered }} soal</span></h2>
                        </div>
                    </div>
                </main>
            </div>

            <div class="items-center justify-between block my-6 sm:flex md:divide-x md:divide-gray-100 dark:divide-gray-700">
                <h3 class="text-2xl text-gray-800 font-bold">
                    Daftar Jawaban 
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
                                <thead class="bg-gray-100 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col" class="p-4 text-xs font-semibold text-left text-gray-500 uppercase dark:text-gray-400">
                                            No
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            Pertanyaan
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            Jawaban
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            Jawaban Benar
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            Keterangan
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            Skor
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">    
                                    @forelse ($results as $i => $result)
                                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                            {{-- @dd($result) --}}
                                            <td class="p-4 text-base font-semibold text-gray-900 whitespace-nowrap dark:text-white">{{$i + 1}}</td>
                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$result->question->question}}</td>
                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$result->question->correct_answer}}</td>
                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$result->answer}}</td>
                                            {{-- <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$result->score}}</td> --}}
                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                @if ($result->answer == $result->question->correct_answer)
                                                    <span class="text-green-500">Benar</span>
                                                @else
                                                    <span class="text-red-500">Salah</span>
                                                @endif  
                                            </td>
                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                @if ($result->answer == $result->question->correct_answer)
                                                    <span class="text-green-500">4 Poin</span>
                                                @else
                                                    <span class="text-red-500">-1 Poin</span>
                                                @endif  
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="text-center text-gray-900">
                                            <td class="py-5 text-center" colspan="7">
                                                <p class="text-sm">Belum ada hasil yang ditemukan.</p>
                                                <p class="text-sm">Silahkan lakukan pencarian atau cetak hasil di halaman yang sama.</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                        {{-- <tr>
                                            <th scope="col" class="p-4 text-xs font-semibold text-left text-gray-500 uppercase dark:text-gray-400">
                                                Total Poin {{ $result->score }}
                                            </th>
                                        </tr> --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>  

            <x-primary-link href="{{ route('admin.tryout.sub-category', [$tryout->id, $sub_categories->id]) }}" class="mt-4">
                Kembali
            </x-primary-link>
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

