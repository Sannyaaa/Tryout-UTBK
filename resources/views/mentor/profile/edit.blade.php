@extends('layouts.app')

@section('content')
   <div class="p-4 mt-12">
        <div class="p-6 bg-white block rounded-lg shadow items-center justify-between border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div>
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
                            <a href="#" class="ml-1 text-gray-50 hover:text-sky-200 md:ml-2 dark:text-gray-300 dark:hover:text-white">Profile</a>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-50" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <span class="ml-1 text-gray-50 md:ml-2 dark:text-gray-500" aria-current="page">Edit</span>
                            </div>
                        </li>
                        </ol>
                    </nav>
                    {{-- <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">All Bimbels</h1> --}}
                </div>
            </div>
            <div class="grid grid-cols-1 px-4 pt-6 xl:grid-cols-3 xl:gap-4">
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
                        <form action="{{ route('mentor.profile.update', $user->id) }}" enctype="multipart/form-data" method="POST">
                            @method('PUT')
                            @csrf

                            <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-6 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                                <div class="items-center sm:flex xl:block 2xl:flex sm:space-x-4 xl:space-x-0 2xl:space-x-4">
                                    <img class="mb-4 rounded-lg w-28 h-28 sm:mb-0 xl:mb-4 2xl:mb-0" src="{{ $user->avatar != null ? Storage::url($user->avatar ?? '') : 'https://openclipart.org/image/2000px/247319' }}" alt="Jese picture">
                                    <div>
                                        <h3 class="mb-1 text-xl font-bold text-gray-900 dark:text-white">Profile picture</h3>
                                        <div class="mb-4 text-sm text-gray-500 dark:text-gray-400">
                                            JPG, GIF or PNG. Max size of 800K
                                        </div>
                                        <div class="flex items-center space-x-4">
                                            <div>
                                                <label for="avatar">
                                                    <span class="px-4 py-2 text-base font-semibold flex items-center text-white bg-gradient-to-tr from-sky-400 to-sky-500 rounded-lg hover:from-sky-500 hover:to-sky-600 focus:ring-4 focus:ring-blue-300 sm:w-auto dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                        <svg class="w-4 h-4 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z"></path><path d="M9 13h2v5a1 1 0 11-2 0v-5z"></path></svg>
                                                        Ambil Gambar
                                                    </span>
                                                </label>
                                                <input type="file" id="avatar" class="hidden" wire:model="avatar" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-6 gap-6">
                                <!-- Nama -->
                                <div class="col-span-6 md:col-span-3">
                                    <x-input-label for="name" :value="__('Nama')" />
                                    <x-text-input id="name" class="block mt-1 w-full"
                                        type="text"
                                        name="name"
                                        value="{{ old('name', $user->name) }}"
                                        required autocomplete="name" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <!-- Email -->
                                <div class="col-span-6 md:col-span-3">
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" class="block mt-1 w-full"
                                        type="email"
                                        name="email"
                                        value="{{ old('email', $user->email) }}"
                                        required autocomplete="email" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <!-- Phone -->
                                <div class="col-span-6 md:col-span-3">
                                    <x-input-label for="phone" :value="__('Phone')" />
                                    <x-text-input id="phone" class="block mt-1 w-full"
                                        type="number"
                                        name="phone"
                                        value="{{ old('phone', $user->phone) }}"
                                        autocomplete="phone" />
                                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                </div>

                                <!-- Phone -->
                                <div class="col-span-6 md:col-span-3">
                                    <x-input-label for="tgl" :value="__('Tanggal Lahir')" />
                                    <x-text-input id="tgl" class="block mt-1 w-full"
                                        type="date"
                                        name="tgl"
                                        value="{{ old('tgl', $user->tgl) }}"
                                        autocomplete="tgl" />
                                    <x-input-error :messages="$errors->get('tgl')" class="mt-2" />
                                </div>

                                <!-- Role -->
                                <div class="col-span-6 md:col-span-3">
                                    <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" />
                                    <x-select-input id="jenis_kelamin" name="jenis_kelamin">
                                        <option selected disabled>Pilih Jenis Kelamin</option>
                                        <option value="lk" {{ old('jenis_kelamin', $user->jenis_kelamin) == 'lk' ? 'selected' : '' }}>Laki laki</option>
                                        <option value="pr" {{ old('jenis_kelamin', $user->jenis_kelamin) == 'pr' ? 'selected' : '' }}>Perempuan</option>
                                    </x-select-input>
                                    <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2" />
                                </div>

                                <!-- Select inputs dengan Tom Select -->
                                <div class=" col-span-6 md:col-span-3">
                                    <x-input-label for="data_universitas_id" :value="__('Universitas')" />
                                    <x-select-input id="data_universitas_id" name="data_universitas_id" class="select-university">
                                        <option value="">Pilihan Universitas 1</option>
                                        @foreach ($university as $universitas)
                                            <option value="{{ $universitas->id }}" {{ old('data_universitas_id', $user->mentor->data_universitas_id ?? '') == $universitas->id ? 'selected' : '' }}>
                                                {{ $universitas->nama_universitas }}
                                            </option>
                                        @endforeach
                                    </x-select-input>
                                </div>

                                <!-- Phone -->
                                <div class="col-span-12 md:col-span-6">
                                    <x-input-label for="teach" :value="__('Teach')" />
                                    <x-text-input id="teach" class="block mt-1 w-full"
                                        type="text"
                                        name="teach"
                                        value="{{ old('teach', $user->mentor->teach ?? '') }}"
                                        autocomplete="teach" />
                                    <x-input-error :messages="$errors->get('teach')" class="mt-2" />
                                </div>

                                <div class="col-span-12 md:col-span-6">
                                    <x-input-label for="achievements" :value="__('Achievements')" />
                                    
                                    <div id="achievements-container">
                                        <!-- Loop through existing achievements -->
                                        @foreach ($user->mentor->achievements ?? [] as $index => $achievement)
                                        <div class="achievement-entry flex gap-2 mb-2">
                                            <x-text-input 
                                                class="block mt-1 w-full"
                                                type="text"
                                                name="achievements[]"
                                                placeholder="Enter achievement"
                                                value="{{ old('achievements.' . $index, $achievement->achievement) }}"
                                            />
                                            <button type="button" class="remove-achievement px-3 py-2 bg-red-500 text-white rounded hover:bg-red-600 mt-1">
                                                X
                                            </button>
                                        </div>
                                        @endforeach
                                        
                                        <!-- Add an empty input field if no achievements exist -->
                                        @if (empty($user->mentor->achievements))
                                        <div class="achievement-entry flex gap-2 mb-2">
                                            <x-text-input 
                                                class="block mt-1 w-full"
                                                type="text"
                                                name="achievements[]"
                                                placeholder="Enter achievement"
                                                value=""
                                            />
                                            <button type="button" class="remove-achievement px-3 py-2 bg-red-500 text-white rounded hover:bg-red-600 mt-1" style="display: none;">
                                                X
                                            </button>
                                        </div>
                                        @endif
                                    </div>

                                    <button type="button" id="add-achievement" class="mt-2 px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                                        + Add Achievement
                                    </button>
                                    
                                    <x-input-error :messages="$errors->get('achievements.*')" class="mt-2" />
                                </div>


                                <div class="col-span-12 sm:col-span-6">
                                    <x-input-label for="description" :value="__('Description')" />
                                    <x-text-area id="description" name="description" rows="4" value="{{ old('description') }}" placeholder="Masukan description">{!! $user->mentor->description ?? '' !!}</x-text-area>
                                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                </div>

                                <!-- Tombol Submit -->
                                <div class="col-span-6 sm:col-full">
                                    <button class="text-white bg-gradient-to-tr from-sky-400 to-sky-500 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="submit">Update Data</button>
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
                                    <button class="text-white bg-gradient-to-tr from-sky-400 to-sky-500 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="submit">Update Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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

<script>
document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('achievements-container');
    const addButton = document.getElementById('add-achievement');

    // Tambah elemen input baru
    addButton.addEventListener('click', () => {
        const entry = document.createElement('div');
        entry.classList.add('achievement-entry', 'flex', 'gap-2', 'mb-2');
        entry.innerHTML = `
            <input 
                type="text" 
                name="achievements[]" 
                class="block mt-1 w-full" 
                placeholder="Enter achievement" 
            />
            <button type="button" class="remove-achievement px-3 py-2 bg-red-500 text-white rounded hover:bg-red-600 mt-1">
                X
            </button>
        `;
        container.appendChild(entry);

        // Tambahkan event listener untuk tombol hapus
        entry.querySelector('.remove-achievement').addEventListener('click', () => {
            entry.remove();
        });
    });

    // Hapus elemen input yang ada
    container.addEventListener('click', (event) => {
        if (event.target.classList.contains('remove-achievement')) {
            event.target.parentElement.remove();
        }
    });
});

</script>
@endsection

    
