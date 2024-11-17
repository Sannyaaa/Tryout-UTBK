@extends('layouts.app')

@section('content')
    <div class="grid grid-cols-1 px-4 pt-6 xl:grid-cols-3 xl:gap-4 dark:bg-gray-900">
        <div class="mb-4 col-span-full xl:mb-2">
            <nav class="flex mb-5 mt-5" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                <li class="inline-flex items-center">
                        <a href="#" class="inline-flex items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
                        <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                    Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <a href="#" class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">Users</a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500" aria-current="page">Settings</span>
                    </div>
                </li>
                </ol>
            </nav>
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">User settings</h1>
        </div>
        <div class="col-span-2">
            <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <div class="flex justify-between">
                    <div>
                        <h3 class="mb-1 text-2xl font-semibold dark:text-white">Informasi Personal</h3>
                        <p class="text-sm mb-4">Pastikan informasi yang kamu masukan benar!</p>
                    </div>
                    <div>
                        {{-- <a href="{{ route('admin.get-universities') }}" class="px-6 py-3 bg-indigo-600 rounded-md font-semibold text-white">Ambil Univ</a> --}}
                    </div>
                </div>
                <form action="{{ route('profile.update', $user->id) }}" enctype="multipart/form-data" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="grid grid-cols-6 gap-6">
                        <!-- Nama -->
                        <div class="col-span-6 sm:col-span-3">
                            <x-input-label for="name" :value="__('Nama')" />
                            <x-text-input id="name" class="block mt-1 w-full"
                                type="text"
                                name="name"
                                value="{{ old('name', $user->name) }}"
                                required autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email -->
                        <div class="col-span-6 sm:col-span-3">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full"
                                type="email"
                                name="email"
                                value="{{ old('email', $user->email) }}"
                                required autocomplete="email" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Role -->
                        <div class="col-span-6 sm:col-span-3">
                            <x-input-label for="role" :value="__('Role')" />
                            <x-select-input id="role" name="role">
                                <option selected disabled>Pilih Role</option>
                                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="mentor" {{ old('role', $user->role) == 'mentor' ? 'selected' : '' }}>Mentor</option>
                                <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
                            </x-select-input>
                            <x-input-error :messages="$errors->get('role')" class="mt-2" />
                        </div>

                        <!-- Phone -->
                        <div class="col-span-6 sm:col-span-3">
                            <x-input-label for="phone" :value="__('Phone')" />
                            <x-text-input id="phone" class="block mt-1 w-full"
                                type="number"
                                name="phone"
                                value="{{ old('phone', $user->phone) }}"
                                autocomplete="phone" />
                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                        </div>

                        <!-- Select inputs dengan Tom Select -->
                        <div class=" col-span-6 sm:col-span-3">
                            <x-input-label for="data_universitas_id" :value="__('Universitas 1')" />
                            <x-select-input id="data_universitas_id" name="data_universitas_id" class="select-university">
                                <option value="">Pilihan Universitas 1</option>
                                @foreach ($university as $universitas)
                                    <option value="{{ $universitas->id }}" {{ old('data_universitas_id', $user->data_universitas_id) == $universitas->id ? 'selected' : '' }}>
                                        {{ $universitas->nama_universitas }}
                                    </option>
                                @endforeach
                            </x-select-input>
                        </div>

                        <div class=" col-span-6 sm:col-span-3">
                            <x-input-label for="second_data_universitas_id" :value="__('Universitas 2')" />
                            <x-select-input id="second_data_universitas_id" name="second_data_universitas_id" class="select-university">
                                <option value="">Pilihan Universitas 2</option>
                                @foreach ($university as $universitas)
                                    <option value="{{ $universitas->id }}" {{ old('second_data_universitas_id', $user->second_data_universitas_id) == $universitas->id ? 'selected' : '' }}>
                                        {{ $universitas->nama_universitas }}
                                    </option>
                                @endforeach
                            </x-select-input>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <x-input-label for="sekolah_id" :value="__('Sekolah')" />
                            <x-select-input id="sekolah_id" name="sekolah_id" class="select-sekolah" data-plugin="tomselect">
                                <option value="">Pilih Sekolah</option>
                                @foreach ($sekolah as $sekolahItem)
                                    <option value="{{ $sekolahItem->id }}" {{ old('sekolah_id', $user->sekolah->id ?? '') == $sekolahItem->id ? 'selected' : '' }}>
                                        {{ $sekolahItem->sekolah }}
                                    </option>
                                @endforeach
                            </x-select-input>
                        </div>

                        {{-- <div class="col-span-6 sm:col-span-3">
                            <x-input-label for="provinsi_id" :value="__('Provinsi Sekolah')" />
                            <x-select-input id="provinsi_id" name="provinsi_id" class="select-provinsi" data-plugin="tomselect">
                                <option value="">Pilih Provinsi</option>
                                @foreach ($provinsi as $provinsiItem)
                                    <option value="{{ $provinsiItem->id }}" {{ old('provinsi_id', $user->sekolah->provinsi_id ?? '') == $provinsiItem->id ? 'selected' : '' }}>
                                        {{ $provinsiItem->nama_provinsi }}
                                    </option>
                                @endforeach
                            </x-select-input>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <x-input-label for="kabupaten_id" :value="__('Kabupaten / Kota Sekolah')" />
                            <x-select-input id="kabupaten_id" name="kabupaten_id" class="select-kabupaten" data-plugin="tomselect">
                                <option value="">Pilih Kabupaten</option>
                                @foreach ($kota as $kabupaten_kota_Item)
                                    <option value="{{ $kabupaten_kota_Item->id }}" {{ old('kabupaten_kota_id', $user->sekolah->kabupaten_kota_id ?? '') == $kabupaten_kota_Item->id ? 'selected' : '' }}>
                                        {{ $kabupaten_kota_Item->nama_kabupaten_kota }}
                                    </option>
                                @endforeach
                            </x-select-input>
                        </div> --}}

                        <!-- Role -->
                        <div class="col-span-6 sm:col-span-3">
                            <x-input-label for="status" :value="__('Status')" />
                            <x-select-input id="status" name="status">
                                <option selected disabled>Pilih Status</option>
                                <option value="kelas_10" {{ old('status', $user->status) == 'kelas_10' ? 'selected' : '' }}>Kelas 10</option>
                                <option value="kelas_11" {{ old('status', $user->status) == 'kelas_11' ? 'selected' : '' }}>Kelas 11</option>
                                <option value="kelas_12" {{ old('status', $user->status) == 'kelas_12' ? 'selected' : '' }}>Kelas 12</option>
                                <option value="Kuliah" {{ old('status', $user->status) == 'Kuliah' ? 'selected' : '' }}>Kuliah</option>
                                <option value="gep_year" {{ old('status', $user->status) == 'gep_year' ? 'selected' : '' }}>Gap Year</option>
                            </x-select-input>
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>


                        <!-- Tombol Submit -->
                        <div class="col-span-6 sm:col-full">
                            <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="submit">Update Data</button>
                        </div>
                    </div>
                </form>

            </div>
            
        </div>
        <div class="col-span-full xl:col-auto">
            <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <h3 class="mb-4 text-xl font-semibold dark:text-white">Password information</h3>
                <form action="#">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6">
                            <label for="current-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Current password</label>
                            <input type="text" name="current-password" id="current-password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="••••••••" required>
                        </div>
                        <div class="col-span-6">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New password</label>
                            <input data-popover-target="popover-password" data-popover-placement="bottom" type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="••••••••" required>
                            <div data-popover id="popover-password" role="tooltip" class="absolute z-10 invisible inline-block text-sm font-light text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                                <div class="p-3 space-y-2">
                                    <h3 class="font-semibold text-gray-900 dark:text-white">Must have at least 6 characters</h3>
                                    <div class="grid grid-cols-4 gap-2">
                                        <div class="h-1 bg-orange-300 dark:bg-orange-400"></div>
                                        <div class="h-1 bg-orange-300 dark:bg-orange-400"></div>
                                        <div class="h-1 bg-gray-200 dark:bg-gray-600"></div>
                                        <div class="h-1 bg-gray-200 dark:bg-gray-600"></div>
                                    </div>
                                    <p>It’s better to have:</p>
                                    <ul>
                                        <li class="flex items-center mb-1">
                                            <svg class="w-4 h-4 mr-2 text-green-400 dark:text-green-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                            Upper & lower case letters
                                        </li>
                                        <li class="flex items-center mb-1">
                                            <svg class="w-4 h-4 mr-2 text-gray-300 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                            A symbol (#$&)
                                        </li>
                                        <li class="flex items-center">
                                            <svg class="w-4 h-4 mr-2 text-gray-300 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                            A longer password (min. 12 chars.)
                                        </li>
                                    </ul>
                            </div>
                            <div data-popper-arrow></div>
                            </div>
                        </div>
                        <div class="col-span-6">
                            <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm password</label>
                            <input type="text" name="confirm-password" id="confirm-password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="••••••••" required>
                        </div>
                        <div class="col-span-6 sm:col-full">
                            <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="submit">Update Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Tambahkan JavaScript Tom Select di bagian bawah body -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tom-select/2.2.2/js/tom-select.complete.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Inisialisasi Tom Select untuk semua select dengan class select-university
    const selectElements = document.querySelectorAll('.select-university');
    selectElements.forEach(function(select) {
        new TomSelect(select, {
            create: false,
            sortField: {
                field: "text",
                direction: "asc"
            },
            placeholder: 'Cari universitas...',
            plugins: {
                clear_button: {
                    title: 'Hapus pilihan'
                }
            }
        });
    });
});
</script>

{{-- <script>
document.addEventListener('DOMContentLoaded', function() {
    // Inisialisasi Tom Select untuk semua select dengan class select-university
    const selectElements = document.querySelectorAll('.select-sekolah');
    selectElements.forEach(function(select) {
        new TomSelect(select, {
            create: false,
            sortField: {
                field: "text",
                direction: "asc"
            },
            placeholder: 'Cari sekolah...',
            plugins: {
                clear_button: {
                    title: 'Hapus pilihan'
                }
            }
        });
    });
});
</script> --}}

<script>
        document.addEventListener('DOMContentLoaded', function() {
            new TomSelect('.select-sekolah', {
                placeholder: 'Pilih sekolah',
                searchField: ['text'],
                valueField: 'value',  // Menentukan field untuk value
                labelField: 'text',   // Menentukan field untuk label
                load: function(query, callback) {
                    if (!query.length) return callback();
                    
                    // Tambahkan minimum karakter untuk pencarian (opsional)
                    if (query.length < 2) return callback();
                    
                    fetch(`/search-sekolah?search=${encodeURIComponent(query)}`)  // Sesuaikan dengan endpoint API Anda
                        .then(response => {
                            if (!response.ok) throw new Error('Network error');
                            return response.json();
                        })
                        .then(json => {
                            callback(json.data.map(item => ({
                                text: item.sekolah,
                                value: item.id
                            })));
                        })
                        .catch(err => {
                            console.error(err);
                            callback();
                        });
                },
                // Tambahkan plugin dan opsi tambahan
                plugins: {
                    clear_button: {
                        title: 'Hapus pilihan'
                    }
                },
                render: {
                    option: function(item, escape) {
                        return `<div>${escape(item.text)}</div>`;
                    },
                    item: function(item, escape) {
                        return `<div>${escape(item.text)}</div>`;
                    }
                },
                onInitialize: function() {
                    this.on('item_add', function(value, item) {
                        const hiddenInput = document.getElementById('selected-sekolah-id');
                        if (hiddenInput) {
                            hiddenInput.value = value;
                        }
                    });
                }
            });
        });
</script>
{{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Provinsi
            new TomSelect('.select-provinsi', {
                placeholder: 'Pilih Provinsi',
                searchField: ['text'],
                load: function(query, callback) {
                    if (!query.length) return callback();
                    fetch('{{ route('profile.edit') }}?provinsi=' + encodeURIComponent(query))
                        .then(response => response.json())
                        .then(json => callback(json.data.map(item => ({ text: item.provinsi, value: item.provinsi }))))
                        .catch(() => callback());
                }
            });

            // Kota
            new TomSelect('.select-kota', {
                placeholder: 'Pilih Kota',
                searchField: ['text'],
                load: function(query, callback) {
                    if (!query.length) return callback();
                    fetch('{{ route('profile.edit') }}?provinsi=' + encodeURIComponent($('.select-provinsi').val()) + '&kota=' + encodeURIComponent(query))
                        .then(response => response.json())
                        .then(json => callback(json.data.map(item => ({ text: item.kabupaten_kota, value: item.kabupaten_kota }))))
                        .catch(() => callback());
                }
            });

            // Sekolah
            new TomSelect('.select-sekolah', {
                placeholder: 'Pilih Sekolah',
                searchField: ['text'],
                load: function(query, callback) {
                    if (!query.length) return callback();
                    fetch('{{ route('profile.edit') }}?provinsi=' + encodeURIComponent($('.select-provinsi').val()) + '&kota=' + encodeURIComponent($('.select-kota').val()) + '&search=' + encodeURIComponent(query))
                        .then(response => response.json())
                        .then(json => callback(json.data.map(item => ({ text: item.sekolah, value: item.id }))))
                        .catch(() => callback());
                }
            });
        });
    </script> --}}
@endsection
{{-- @push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Provinsi
            new TomSelect('.select-provinsi', {
                placeholder: 'Pilih Provinsi',
                searchField: ['text'],
                load: function(query, callback) {
                    if (!query.length) return callback();
                    fetch('{{ route('profile.edit') }}?provinsi=' + encodeURIComponent(query))
                        .then(response => response.json())
                        .then(json => callback(json.data.map(item => ({ text: item.provinsi, value: item.provinsi }))))
                        .catch(() => callback());
                }
            });

            // Kota
            new TomSelect('.select-kota', {
                placeholder: 'Pilih Kota',
                searchField: ['text'],
                load: function(query, callback) {
                    if (!query.length) return callback();
                    fetch('{{ route('profile.edit') }}?provinsi=' + encodeURIComponent($('.select-provinsi').val()) + '&kota=' + encodeURIComponent(query))
                        .then(response => response.json())
                        .then(json => callback(json.data.map(item => ({ text: item.kabupaten_kota, value: item.kabupaten_kota }))))
                        .catch(() => callback());
                }
            });

            // Sekolah
            new TomSelect('.select-sekolah', {
                placeholder: 'Pilih Sekolah',
                searchField: ['text'],
                load: function(query, callback) {
                    if (!query.length) return callback();
                    fetch('{{ route('profile.edit') }}?provinsi=' + encodeURIComponent($('.select-provinsi').val()) + '&kota=' + encodeURIComponent($('.select-kota').val()) + '&search=' + encodeURIComponent(query))
                        .then(response => response.json())
                        .then(json => callback(json.data.map(item => ({ text: item.sekolah, value: item.id }))))
                        .catch(() => callback());
                }
            });
        });
    </script>
@endpush --}}

{{-- @push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Provinsi
            new TomSelect('.select-provinsi', {
                placeholder: 'Pilih Provinsi',
                onInitialize: function() {
                    this.on('item_add', function(value, item) {
                        loadKabupaten(value);
                    });
                }
            });

            // Kabupaten
            new TomSelect('.select-kabupaten', {
                placeholder: 'Pilih Kabupaten',
                onInitialize: function() {
                    this.on('item_add', function(value, item) {
                        loadSekolah(value);
                    });
                }
            });

            // Sekolah
            new TomSelect('.select-sekolah', {
                placeholder: 'Pilih Sekolah'
            });

            function loadProvinsi() {
                fetch('{{ route('admin.get-provinsi') }}')
                    .then(response => response.json())
                    .then(data => {
                        const provinsiSelect = document.querySelector('.select-provinsi').tomselect;
                        data.forEach(provinsi => {
                            provinsiSelect.addOption({
                                text: provinsi.provinsi,
                                value: provinsi.provinsi
                            });
                        });
                    });
            }

            function loadKabupaten(provinsi) {
                fetch(`{{ route('admin.get-kabupaten', ':provinsi') }}`.replace(':provinsi', provinsi))
                    .then(response => response.json())
                    .then(data => {
                        const kabupatenSelect = document.querySelector('.select-kabupaten').tomselect;
                        kabupatenSelect.clear();
                        kabupatenSelect.clearOptions();
                        data.forEach(kabupaten => {
                            kabupatenSelect.addOption({
                                text: kabupaten.kabupaten_kota,
                                value: kabupaten.kabupaten_kota
                            });
                        });
                    });
            }

            function loadSekolah(kabupaten) {
                const provinsi = document.querySelector('.select-provinsi').value;
                fetch(`{{ route('admin.get-sekolah', [':provinsi', ':kabupaten']) }}`.replace(':provinsi', provinsi).replace(':kabupaten', kabupaten))
                    .then(response => response.json())
                    .then(data => {
                        const sekolahSelect = document.querySelector('.select-sekolah').tomselect;
                        sekolahSelect.clear();
                        sekolahSelect.clearOptions();
                        data.forEach(sekolah => {
                            sekolahSelect.addOption({
                                text: sekolah.sekolah,
                                value: sekolah.id
                            });
                        });
                    });
            }

            loadProvinsi();
        });
    </script>
@endpush --}}

{{-- @push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi Provinsi
            const provinsiSelect = new TomSelect('.select-provinsi', {
                placeholder: 'Pilih Provinsi',
                onChange: function(value) {
                    // Jika Provinsi berubah, muat Kabupaten
                    if (value) {
                        loadKabupaten(value);  // Panggil loadKabupaten saat provinsi berubah
                    }
                }
            });

            // Inisialisasi Kabupaten
            const kabupatenSelect = new TomSelect('.select-kabupaten', {
                placeholder: 'Pilih Kabupaten',
                onChange: function(value) {
                    // Jika Kabupaten berubah, muat Sekolah
                    if (value) {
                        loadSekolah(value);  // Panggil loadSekolah saat kabupaten berubah
                    }
                }
            });

            // Inisialisasi Sekolah
            const sekolahSelect = new TomSelect('.select-sekolah', {
                placeholder: 'Pilih Sekolah'
            });

            // Fungsi untuk memuat provinsi
            function loadProvinsi() {
                fetch('{{ route('admin.get-provinsi') }}')
                    .then(response => response.json())
                    .then(data => {
                        const provinsiSelect = document.querySelector('.select-provinsi').tomselect;
                        data.forEach(provinsi => {
                            provinsiSelect.addOption({
                                text: provinsi.nama_provinsi,
                                value: provinsi.id
                            });
                        });
                    });
            }

            // Fungsi untuk memuat kabupaten berdasarkan provinsi
            function loadKabupaten(provinsiId) {
                fetch(`{{ route('admin.get-kabupaten', ':provinsi') }}`.replace(':provinsi', provinsiId))
                    .then(response => response.json())
                    .then(data => {
                        kabupatenSelect.clearOptions();
                        data.forEach(kabupaten => {
                            kabupatenSelect.addOption({
                                text: kabupaten.nama_kabupaten_kota,
                                value: kabupaten.id
                            });
                        });
                    });
            }

            // Fungsi untuk memuat sekolah berdasarkan provinsi dan kabupaten
            function loadSekolah(kabupatenId) {
                const provinsiId = document.querySelector('.select-provinsi').value;
                fetch(`{{ route('admin.get-sekolah', [':provinsi', ':kabupaten']) }}`.replace(':provinsi', provinsiId).replace(':kabupaten', kabupatenId))
                    .then(response => response.json())
                    .then(data => {
                        sekolahSelect.clearOptions();
                        data.forEach(sekolah => {
                            sekolahSelect.addOption({
                                text: sekolah.sekolah,
                                value: sekolah.id
                            });
                        });
                    });
            }

            // Panggil loadProvinsi pada saat halaman dimuat untuk memastikan data provinsi dimuat
            loadProvinsi();

            // Pastikan jika user sudah memilih provinsi atau kabupaten sebelumnya, kabupaten dan sekolah juga terisi
            const selectedProvinsiId = '{{ old('provinsi_id', $user->sekolah->provinsi_id) }}';
            if (selectedProvinsiId) {
                loadKabupaten(selectedProvinsiId);
            }

            const selectedKabupatenId = '{{ old('kabupaten_kota_id', $user->sekolah->kabupaten_kota_id) }}';
            if (selectedKabupatenId) {
                loadSekolah(selectedKabupatenId);
            }
        });
    </script>
@endpush --}}

    
