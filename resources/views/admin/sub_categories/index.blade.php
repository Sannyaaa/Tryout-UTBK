@extends('layouts.app')

@section('content')

<div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
    <div class="w-full mb-1">
        <div class="mb-4">
            <nav class="flex mb-5" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                    <li class="inline-flex items-center">
                        <a href="#" class="inline-flex items-center text-gray-700 hover:text-blue-600 dark:text-gray-300 dark:hover:text-white">
                            <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <a href="#" class="ml-1 text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">sub_categories</a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500" aria-current="page">Index</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">All sub_categories</h1>
        </div>

        <div class="items-center justify-between block sm:flex md:divide-x md:divide-gray-100 dark:divide-gray-700">
            <div class="flex items-center mb-4 sm:mb-0">
                <div class="flex items-center w-full sm:justify-end">
                    <div class="flex space-x-1">
                        <button id="bulk DeleteBtn" style="display: none;" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">
                            Delete Selected
                        </button>
                    </div>
                </div>
            </div>

            <!-- Modal toggle -->
            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                Toggle modal
            </button>

            <!-- Main modal -->
            <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-lg max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Create New Product
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form action="{{ route('admin.sub_categories.store') }}" method="POST" enctype="multipart/form-data" class="p-4 md:p-5">
                            @csrf
                            @method('POST')
                            <div class="py-3">
                                <div>
                                    <x-input-label for="name" :value="__('Nama')" />
                                    <x-text-input type="text" :value="old('name')" name="name" id="name" placeholder="Masukan Nama sub_categories" required=""/>
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="description" :value="__('Description')" />
                                    <x-text-area id="description" name="description" rows="4" placeholder="Masukan Description"/>
                                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="category" :value="__('Category')" />
                                    <x-select-input id="category" name="category" >
                                        <option selected="" disabled>Select Category</option>
                                        <option value="Test Potensi Skolastik" {{ old('category') == 'Test Potensi Skolastik' ? 'selected' : '' }}>Test Potensi Skolastik</option>
                                        <option value="Test Literasi" {{ old('category') == 'Test Literasi' ? 'selected' : '' }}>Test Literasi</option>
                                    </x-select-input>
                                    <x-input-error :messages="$errors->get('category')" class="mt-2" />
                                </div>

                                <div>
                                    <input type="checkbox" id="add_duration" name="add_duration">
                                    <label for="add_duration">Add Duration</label>
                                </div>

                                <div id="duration_field" style="display: none;">
                                    <x-input-label for="duration" :value="__('Duration')" />
                                    <x-text-input type="number" name="duration" id="duration" placeholder="Enter Duration" />
                                    <x-input-error :messages="$errors->get('duration')" class="mt-2" />
                                </div>
                            </div>
                            <x-primary-button type="submit">
                                Add sub_categories
                            </x-primary-button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Edit Modal -->
            <div id="editModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-gray-900 bg-opacity-50">
                <div class="relative p-4 w-full max-w-lg max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Edit sub_categories</h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="editModal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <form id="editForm" method="POST" class="p-4 md:p-5">
                            @csrf
                            @method('PUT')
                            <div class="grid gap-4 mb-4">
                                <div>
                                    <x-input-label for="edit_name" :value="__('Nama')" />
                                    <x-text-input type="text" name="name" id="edit_name" placeholder="Masukan Nama sub_categories" required=""/>
                                    <x-input-error :messages="$errors->get('name')" class="mt-2 " />
                                </div>
                                <div>
                                    <x-input-label for="edit_description" :value="__('Deskripsi')" />
                                    <x-text-input type="text" name="description" id="edit_description" placeholder="Masukan Deskripsi sub_categories" required=""/>
                                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="edit_category" :value="__('Kategori')" />
                                    <x-text-input type="text" name="category" id="edit_category" placeholder="Masukan Kategori sub_categories" required=""/>
                                    <x-input-error :messages="$errors->get('category')" class="mt-2" />
                                </div>
                                <div>
                                    <input type="checkbox" id="edit_add_duration" name="add_duration">
                                    <label for="edit_add_duration">Add Duration</label>
                                </div>
                                <div id="edit_duration_field" style="display: none;">
                                    <x-input-label for="edit_duration" :value="__('Duration')" />
                                    <x-text-input type="number" name="duration" id="edit_duration" placeholder="Enter Duration" />
                                    <x-input-error :messages="$errors->get('duration')" class="mt-2" />
                                </div>
                            </div>
                            <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-100 px-4 py-2 text-sm font-medium text-indigo-900 hover:bg-indigo-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 focus-visible:ring-offset-2">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="flex flex-col">
    <div class="overflow-x-auto">
        <div class="inline-block min-w-full align-middle">
            <div class="overflow-hidden shadow p-6">
                <table id="sub_categoriesTable" class="min-w-full divide-y divide-gray-200 whitespace-nowrap dark:divide-gray-600">
                    <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr>
                            <th scope="col" class="p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-all" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-all" class="sr-only">checkbox</label>
                                </div>
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                Name
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                Description
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                Duration
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                Category
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                Actions
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

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
            var table = $('#sub_categoriesTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.sub_categories.index') }}",
                columns: [
                    {
                        data: 'checkbox',
                        name: 'checkbox',
                        orderable: false,
                        searchable: false,
                        width: '5%'
                    },
                    {data: 'name', name: 'name'},
                    {data: 'description', name: 'description'},
                    {data: 'duration', name: 'duration'},
                    {data: 'category', name: 'category'},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            // Handle "select all" checkbox
            $('#checkbox-all').on(' click', function() {
                $('.sub_categories-checkbox').prop('checked', this.checked);
                updateBulkDeleteButton();
            });

            // Handle individual checkbox changes
            $('#sub_categoriesTable').on('change', '.sub_categories-checkbox', function() {
                updateBulkDeleteButton();
                
                // Update "select all" checkbox
                var allChecked = $('.sub_categories-checkbox:checked').length === $('.sub_categories-checkbox').length;
                $('#checkbox-all').prop('checked', allChecked);
            });

            // Update bulk delete button visibility
            function updateBulkDeleteButton() {
                var checkedCount = $('.sub_categories-checkbox:checked').length;
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
                    $('.sub_categories-checkbox:checked').each(function() {
                        selectedIds.push($(this).val());
                    });

                    $.ajax({
                        url: "{{ route('admin.sub_categories.bulkDelete') }}",
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

            $(document).ready(function() {
                // Toggle duration field visibility for Create Modal
                $('#add_duration').on('change', function() {
                    if ($(this).is(':checked')) {
                        $('#duration_field').show(); // Show duration field
                    } else {
                        $('#duration_field').hide(); // Hide duration field
                        $('#duration').val(''); // Clear the duration input if hidden
                    }
                });

                // Toggle duration field visibility for Edit Modal
                $('#edit_add_duration').on('change', function() {
                    if ($(this).is(':checked')) {
                        $('#edit_duration_field').show(); // Show duration field
                    } else {
                        $('#edit_duration_field').hide(); // Hide duration field
                        $('#edit_duration').val(''); // Clear the duration input if hidden
                    }
                });

                // Open Edit Modal with existing data
                $(document).on('click', '.edit-btn', function(e) {
                    e.preventDefault();
                    const id = $(this).data('id');
                    const name = $(this).data('name');
                    const description = $(this).data('description');
                    const duration = $(this).data('duration'); // Get duration
                    const category = $(this).data('category');

                    // Populate the edit form fields
                    $('#editForm').attr('action', `/admin/sub_categories/${id}`);
                    $('#edit_name').val(name);
                    $('#edit_description').val(description);
                    $('#edit_category').val(category);

                    // Set duration field
                    if (duration) {
                        $('#edit_add_duration').prop('checked', true); // Check the checkbox
                        $('#edit_duration_field').show(); // Show duration field
                        $('#edit_duration').val(duration); // Set the duration input
                    } else {
                        $('#edit_add_duration').prop('checked', false); // Uncheck the checkbox
                        $('#edit_duration_field').hide(); // Hide duration field
                        $('#edit_duration').val(''); // Clear the duration input
                    }

                    $('#editModal').removeClass('hidden'); // Open modal
                });
            });

            // Handle submit form edit
            $('#editForm').on('submit', function(e) {
                e.preventDefault();
                const form = $(this);
                const url = form.attr('action');
                
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: form.serialize(),
                    success: function(response) {
                        if(response.success) {
                            // Tutup modal
                            $('#editModal').addClass('hidden');
                            // Refresh table
                            table.ajax.reload();
                            // Show success message
                            alert('sub_categories updated successfully');
                        }
                    },
                    error: function(xhr) {
                        alert('Error updating sub_categories');
                    }
                });
            });

            // Tutup modal ketika tombol close diklik
            $('[data-modal-toggle="editModal"]').on('click', function() {
                $('#editModal').addClass('hidden');
            });
        });
    </script>
@endsection