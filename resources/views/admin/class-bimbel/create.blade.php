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
                            <a href="{{ route('admin.class-bimbel.index') }}" class="ml-1 text-gray-50 hover:text-sky-200 md:ml-2 dark:text-gray-300 dark:hover:text-white">Class</a>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-50" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <span class="ml-1 text-gray-50 md:ml-2 dark:text-gray-500" aria-current="page">Buat Class</span>
                            </div>
                        </li>
                        </ol>
                    </nav>
                    {{-- <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">All Bimbels</h1> --}}
                </div>
            </div>

        {{-- <div class="items-center justify-between block sm:flex md:divide-x md:divide-gray-100 dark:divide-gray-700">
            <div class="flex items-center mb-4 sm:mb-0">
                <form class="sm:pr-3" action="#" method="GET">
                    <label for="products-search" class="sr-only">Search</label>
                    <div class="relative w-48 mt-1 sm:w-64 xl:w-96">
                        <input type="text" name="email" id="products-search" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for products">
                    </div>
                </form>
                <div class="flex items-center w-full sm:justify-end">
                    <div class="flex pl-2 space-x-1">
                        <a href="#" class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path></svg>
                        </a>
                        <a href="#" class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                        </a>
                        <a href="#" class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                        </a>
                        <a href="#" class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
            <button id="createProductButton" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" type="button" data-drawer-target="drawer-create-product-default" data-drawer-show="drawer-create-product-default" aria-controls="drawer-create-product-default" data-drawer-placement="right">
                Add new product
            </button>
        </div> --}}
            <form action="{{ route('admin.class-bimbel.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="space-y-3">
                    <div class="grid lg:grid-cols-2 gap-3">
                        <x-text-input type="hidden" value="{{ $back ?? '' }}" name="back" id="back" />
                        <div>
                            <x-input-label for="name" :value="__('Nama')" />
                            <x-text-input type="text" :value="old('name')" name="name" id="name" placeholder="Masukan Nama Tryout" required />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="sub_categories_id" :value="__('Mapel')" />
                            <x-select-input id="sub_categories_id" name="sub_categories_id">
                                <option selected disabled>Select Mapel</option>
                                @foreach ($subCategories as $sub_categories_id)
                                    <option value="{{ $sub_categories_id->id }}" {{ old('sub_categories_id') == $sub_categories_id->id ? 'selected' : '' }}>
                                        {{ $sub_categories_id->name }}
                                    </option>
                                @endforeach
                            </x-select-input>
                            <x-input-error :messages="$errors->get('sub_categories_id')" class="mt-2" />
                        </div>
                    </div>

                    <div class="grid lg:grid-cols-2 gap-3">
                        <div>
                            <x-input-label for="bimbel_id" :value="__('Bimbel')" />
                            <x-select-input id="bimbel_id" name="bimbel_id">
                                <option selected disabled>Select Bimbel</option>
                                @foreach ($bimbels as $bimbelSelect)
                                    <option value="{{ $bimbelSelect->id }}" {{ old('bimbel_id', $bimbel->id ?? '') == $bimbelSelect->id ? 'selected' : '' }}>
                                        {{ $bimbelSelect->name }}
                                    </option>
                                @endforeach
                            </x-select-input>
                            <x-input-error :messages="$errors->get('bimbel_id')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="user_id" :value="__('Pengajar')" />
                            <x-select-input id="user_id" name="user_id">
                                <option selected disabled>Select Pengajar</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </x-select-input>
                            <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
                        </div>
                    </div>

                    <div class="grid lg:grid-cols-2 gap-3 my-1">
                        <div class="flex items-center">
                            <input id="many-class" type="checkbox" class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded" onchange="toggleDateInputs()">
                            <label for="many-class" class="w-full ms-2 text-sm font-medium text-gray-900">Buat Banyak Class</label>
                        </div>
                    </div>

                    <div id="first-date-inputs" style="display: block;">
                        <div class="grid lg:grid-cols-2 gap-3">
                            <div>
                                <x-input-label for="date" :value="__('Tanggal Mulai')" />
                                <x-text-input type="date" :value="old('date')" name="date" id="date" placeholder="Masukan tanggal mulai" required />
                                <x-input-error :messages="$errors->get('date')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="start_time" :value="__('Jam Mulai')" />
                                <x-text-input type="time" :value="old('start_time')" name="start_time" id="start_time" placeholder="Masukan tanggal selesai" required />
                                <x-input-error :messages="$errors->get('start_time')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <div id="second-date-inputs" style="display: none;">
                        <div class="grid lg:grid-cols-2 gap-3">
                            <div class="space-y-3">
                                <div>
                                    <x-input-label for="start_date" :value="__('Tanggal Mulai')" />
                                    <x-text-input type="date" :value="old('start_date')" name="start_date" id="start_date" placeholder="Masukan tanggal mulai" />
                                    <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="end_date" :value="__('Tanggal Akhir')" />
                                    <x-text-input type="date" :value="old('end_date')" name="end_date" id="end_date" placeholder="Masukan tanggal selesai" />
                                    <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="start_time_second" :value="__('Jam Mulai')" />
                                    <x-text-input type="time" :value="old('start_time_second')" name="start_time_second" id="start_time_second" placeholder="Masukan tanggal selesai" />
                                    <x-input-error :messages="$errors->get('start_time_second')" class="mt-2" />
                                </div>
                            </div>
                            <div>
                                <x-input-label for="days_of_week" :value="__('Hari Belajar')" />
                                <div class="grid lg:grid-cols-2 gap-3">
                                    <div class="flex p-4 border border-gray-200 rounded dark:border-gray-700">
                                        <input id="senin-checkbox" type="checkbox" value="1" name="days_of_week[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="senin-checkbox" class="w-full ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Hari Senin</label>
                                    </div>
                                    <div class="flex p-4 border border-gray-200 rounded dark:border-gray-700">
                                        <input id="selasa-checkbox" type="checkbox" value="2" name="days_of_week[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="selasa-checkbox" class="w-full ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Hari Selasa</label>
                                    </div>
                                    <div class="flex p-4 border border-gray-200 rounded dark:border-gray-700">
                                        <input id="rabu-checkbox" type="checkbox" value="3" name="days_of_week[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="rabu-checkbox" class="w-full ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Hari Rabu</label>
                                    </div>
                                    <div class="flex p-4 border border-gray-200 rounded dark:border-gray-700">
                                        <input id="kamis-checkbox" type="checkbox" value="4" name="days_of_week[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="kamis-checkbox" class="w-full ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Hari Kamis</label>
                                    </div>
                                    <div class="flex p-4 border border-gray-200 rounded dark:border-gray-700">
                                        <input id="jumat-checkbox" type="checkbox" value="5" name="days_of_week[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="jumat-checkbox" class="w-full ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Hari Jumat</label>
                                    </div>
                                    <div class="flex p-4 border border-gray-200 rounded dark:border-gray-700">
                                        <input id="sabtu-checkbox" type="checkbox" value="6" name="days_of_week[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="sabtu-checkbox" class="w-full ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Hari Sabtu</label>
                                    </div>
                                    <div class="flex p-4 border border-gray-200 rounded dark:border-gray-700">
                                        <input id="minggu-checkbox" type="checkbox" value="0" name="days_of_week[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="minggu-checkbox" class="w-full ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Hari Minggu</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-between">
                        <x-secondary-href href="{{ $back ?? route('admin.class-bimbel.index') }}">
                            Back
                        </x-secondary-href>
                        <x-primary-button type="submit">
                            Add Class
                        </x-primary-button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>


@endsection

@push('script')
    <script>
        function toggleDateInputs() {
            const manyClassCheckbox = document.getElementById('many-class');
            const firstDateInputs = document.getElementById('first-date-inputs');
            const secondDateInputs = document.getElementById('second-date-inputs');
            
            // Get all input elements
            const firstDateInput = document.getElementById('date');
            const firstStartTimeInput = document.getElementById('start_time');
            
            const secondStartDateInput = document.getElementById('start_date');
            const secondEndDateInput = document.getElementById('end_date');
            const secondStartTimeInput = document.getElementById('start_time_second');
            const daysOfWeekInputs = document.querySelectorAll('input[name="days_of_week[]"]');

            if (manyClassCheckbox.checked) {
                // Show second date inputs, hide first date inputs
                firstDateInputs.style.display = 'none';
                secondDateInputs.style.display = 'block';
                
                // Remove required from first date inputs
                firstDateInput.required = false;
                firstStartTimeInput.required = false;
                
                // Add required to second date inputs
                secondStartDateInput.required = true;
                secondEndDateInput.required = true;
                secondStartTimeInput.required = true;
                
                // Make at least one day of week required
                daysOfWeekInputs.forEach(input => {
                    input.addEventListener('change', validateDaysOfWeek);
                });
                validateDaysOfWeek();
            } else {
                // Show first date inputs, hide second date inputs
                firstDateInputs.style.display = 'block';
                secondDateInputs.style.display = 'none';
                
                // Add required to first date inputs
                firstDateInput.required = true;
                firstStartTimeInput.required = true;
                
                // Remove required from second date inputs
                secondStartDateInput.required = false;
                secondEndDateInput.required = false;
                secondStartTimeInput.required = false;
                
                // Remove required from days of week
                daysOfWeekInputs.forEach(input => {
                    input.required = false;
                    input.removeEventListener('change', validateDaysOfWeek);
                });
            }
        }

        // Function to validate that at least one day of week is selected
        function validateDaysOfWeek() {
            const daysOfWeekInputs = document.querySelectorAll('input[name="days_of_week[]"]');
            const anyChecked = Array.from(daysOfWeekInputs).some(input => input.checked);
            
            daysOfWeekInputs.forEach(input => {
                if (!anyChecked) {
                    input.setCustomValidity('Please select at least one day');
                } else {
                    input.setCustomValidity('');
                }
            });
        }
    </script>

    {{-- <script>
        document.getElementById('myForm').addEventListener('submit', function(event) {
            // Pilih semua checkbox dengan nama days_of_week[]
            const checkboxes = document.querySelectorAll('input[name="days_of_week[]"]');
            let isChecked = false;

            // Periksa jika setidaknya ada satu checkbox yang dicentang
            checkboxes.forEach((checkbox) => {
                if (checkbox.checked) {
                    isChecked = true;
                }
            });

            // Jika tidak ada yang dicentang, cegah form untuk dikirim dan tampilkan pesan peringatan
            if (!isChecked) {
                event.preventDefault();
                alert('Pilih setidaknya satu hari belajar!');
            }
        });
    </script> --}}
@endpush


