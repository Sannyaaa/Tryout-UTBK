<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}

    

    <div class="grid grid-cols-1 px-4 pt-6 xl:grid-cols-3 xl:gap-4 dark:bg-gray-900">

        <div class="mt-8 mb-2 col-span-full">
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
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-span-2">
            {{-- <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <div class="items-center sm:flex xl:block 2xl:flex sm:space-x-4 xl:space-x-0 2xl:space-x-4">
                    <img class="mb-4 rounded-lg w-28 h-28 sm:mb-0 xl:mb-4 2xl:mb-0" src="/images/users/bonnie-green-2x.png" alt="Jese picture">
                    <div>
                        <h3 class="mb-1 text-xl font-bold text-gray-900 dark:text-white">Profile picture</h3>
                        <div class="mb-4 text-sm text-gray-500 dark:text-gray-400">
                            JPG, GIF or PNG. Max size of 800K
                        </div>
                        <div class="flex items-center space-x-4">
                            <div>
                                <x-primary-button class="m-0 flex items-center">
                                    <svg class="w-4 h-4 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z"></path><path d="M9 13h2v5a1 1 0 11-2 0v-5z"></path></svg>
                                    Ambil Gambar
                                </x-primary-button>
                            </div>
                            <button type="button" class="py-2 px-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                
                <div class="flex justify-between">
                    <div>
                        <h3 class="mb-1 text-2xl font-semibold dark:text-white">Informasi Personal</h3>
                        <p class="text-sm mb-4">Pastikan informasi yang kamu masukan benar!</p>
                    </div>
                </div>
                <form wire:submit.prevent="update" class="grid grid-cols-6 gap-6">
                    <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-6 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                        <div class="items-center sm:flex xl:block 2xl:flex sm:space-x-4 xl:space-x-0 2xl:space-x-4">
                            <img class="mb-4 rounded-lg w-28 h-28 sm:mb-0 xl:mb-4 2xl:mb-0" src="{{ Storage::url($user->avatar) }}" alt="Jese picture">
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
                                    <button type="button" class="py-2 px-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Nama -->
                    <div class="col-span-6 sm:col-span-3">
                        <x-input-label for="name" :value="__('Nama')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" wire:model.defer="name" required autocomplete="name" />
                        @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <!-- Email -->
                    <div class="col-span-6 sm:col-span-3">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" wire:model.defer="email" required autocomplete="email" />
                        @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <!-- Phone -->
                    <div class="col-span-6 sm:col-span-3">
                        <x-input-label for="phone" :value="__('Phone')" />
                        <x-text-input id="phone" class="block mt-1 w-full" type="number" wire:model.defer="phone" autocomplete="phone" />
                        @error('phone') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <!-- Phone -->
                    <div class="col-span-6 sm:col-span-3">
                        <x-input-label for="tgl" :value="__('Tanggal Lahir')" />
                        <x-text-input id="tgl" class="block mt-1 w-full"
                            type="date"
                            name="tgl"
                            value="{{ old('tgl', $user->tgl) }}"
                            autocomplete="tgl" />
                        <x-input-error :messages="$errors->get('tgl')" class="mt-2" />
                    </div>

                    <!-- Role -->
                    <div class="col-span-6 sm:col-span-3">
                        <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" />
                        <x-select-input id="jenis_kelamin" name="jenis_kelamin">
                            <option selected disabled>Pilih Jenis Kelamin</option>
                            <option value="lk" {{ old('jenis_kelamin', $user->jenis_kelamin) == 'lk' ? 'selected' : '' }}>Laki laki</option>
                            <option value="pr" {{ old('jenis_kelamin', $user->jenis_kelamin) == 'pr' ? 'selected' : '' }}>Perempuan</option>
                        </x-select-input>
                        <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2" />
                    </div>

                    <!-- Data Sekolah -->
                    <div class="col-span-full">
                        <h3 class="text-2xl font-semibold dark:text-white">Data Sekolah</h3>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <x-input-label for="sekolah_id" :value="__('Sekolah')" />
                        <x-select-input wire:model.defer="sekolah_id" class="select-sekolah">
                            <option value="">Pilih Sekolah</option>
                            @foreach ($sekolah as $sekolahItem)
                                <option value="{{ $sekolahItem->id }}">{{ $sekolahItem->sekolah }}</option>
                            @endforeach
                        </x-select-input>
                    </div>

                    <!-- Status -->
                    <div class="col-span-6 sm:col-span-3">
                        <x-input-label for="status" :value="__('Status')" />
                        <x-select-input wire:model.defer="status">
                            <option selected disabled>Pilih Status</option>
                            <option value="kelas_10">Kelas 10</option>
                            <option value="kelas_11">Kelas 11</option>
                            <option value="kelas_12">Kelas 12</option>
                            <option value="Kuliah">Kuliah</option>
                            <option value="gep_year">Gap Year</option>
                        </x-select-input>
                        @error('status') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <!-- Universitas -->
                    <div class="col-span-6 sm:col-span-3">
                        <x-input-label for="data_universitas_id" :value="__('Universitas Pertama')" />
                        <x-select-input wire:model.defer="data_universitas_id" class="select-university">
                            <option value="">Pilihan Universitas 1</option>
                            @foreach ($university as $universitas)
                                <option value="{{ $universitas->id }}">{{ $universitas->nama_universitas }}</option>
                            @endforeach
                        </x-select-input>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <x-input-label for="second_data_universitas_id" :value="__('Universitas Kedua')" />
                        <x-select-input wire:model.defer="second_data_universitas_id" class="select-university">
                            <option value="">Pilihan Universitas 2</option>
                            @foreach ($university as $universitas)
                                <option value="{{ $universitas->id }}">{{ $universitas->nama_universitas }}</option>
                            @endforeach
                        </x-select-input>
                    </div>

                    <!-- Tombol Submit -->
                    <div class="col-span-6 sm:col-full">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                            Update Data
                        </button>
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
    
</div>

@push('body-scripts')
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
@endpush