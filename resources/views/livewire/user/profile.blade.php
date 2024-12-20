<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}

    

    <div class="grid grid-cols-1 px-4 pt-6 xl:grid-cols-3 xl:gap-4 dark:bg-gray-900 md:mx-10">

        <div class="mt-8 mb-8 col-span-full">
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
                <div>
                    <form wire:submit.prevent="update" class="grid grid-cols-6 gap-6">
                        <!-- Profile Picture Section -->
                        <div class="col-span-6 p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                            <div class="items-center sm:flex xl:block 2xl:flex sm:space-x-4 xl:space-x-0 2xl:space-x-4">
                                {{-- @if($avatar)
                                    <img class="mb-4 rounded-lg w-28 h-28 sm:mb-0 xl:mb-4 2xl:mb-0" 
                                        src="{{ $avatar->temporaryUrl() }}" 
                                        alt="Uploaded Avatar">
                                @else --}}
                                    <img class="mb-4 rounded-lg w-28 h-28 sm:mb-0 xl:mb-4 2xl:mb-0" 
                                        src="{{ $user->avatar != null ? Storage::url($user->avatar ?? '') : 'https://openclipart.org/image/2000px/247319' }}" 
                                        alt="Profile Picture">
                                {{-- @endif --}}

                                <div>
                                    <h3 class="mb-1 text-xl font-bold text-gray-900 dark:text-white">Profile Picture</h3>
                                    <div class="mb-4 text-sm text-gray-500 dark:text-gray-400">
                                        JPG, GIF or PNG. Max size of 2mb
                                    </div>
                                    <div class="flex items-center space-x-4">
                                        <div>
                                            <label for="avatar" class="cursor-pointer">
                                                <span class="px-4 py-2 text-base font-semibold flex items-center text-white bg-gradient-to-tr from-sky-400 to-sky-500 rounded-lg hover:from-sky-500 hover:to-sky-600 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    <svg class="w-4 h-4 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z"></path>
                                                        <path d="M9 13h2v5a1 1 0 11-2 0v-5z"></path>
                                                    </svg>
                                                    Upload Image
                                                </span>
                                            </label>
                                            <input type="file" id="avatar" class="hidden" wire:model="avatar" accept="image/png, image/jpeg, image/jpg, image/gif" />
                                        </div>
                                    </div>
                                    @error('avatar')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Personal Information -->
                        <div class="col-span-6 sm:col-span-3">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" wire:model="name" required autocomplete="name" />
                            @error('name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" wire:model="email" required autocomplete="email" />
                            @error('email')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <x-input-label for="phone" :value="__('Phone')" />
                            <x-text-input id="phone" class="block mt-1 w-full" type="tel" wire:model="phone" autocomplete="phone" />
                            @error('phone')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <x-input-label for="tgl" :value="__('Tanggal Lahir')" />
                            <x-text-input id="tgl" class="block mt-1 w-full" type="date" wire:model="tgl" autocomplete="bday" />
                            @error('tgl')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <x-input-label for="jenis_kelamin" :value="__('Kelamin')" />
                            <x-select-input id="jenis_kelamin" wire:model="jenis_kelamin" required>
                                <option value="">Select Gender</option>
                                <option value="lk">Male</option>
                                <option value="pr">Female</option>
                            </x-select-input>
                            @error('jenis_kelamin')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- School Information -->
                        <div class="col-span-full">
                            <h3 class="text-2xl font-semibold dark:text-white">School Information</h3>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <x-input-label for="sekolah_id" :value="__('Sekolah')" />
                            <x-select-input wire:model="sekolah_id">
                                <option value="">Select School</option>
                                {{-- @foreach ($sekolah as $sekolahItem)
                                    <option value="{{ $sekolahItem->id }}">{{ $sekolahItem->sekolah }}</option>
                                @endforeach --}}
                            </x-select-input>
                            @error('sekolah_id')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <x-input-label for="status" :value="__('Status')" />
                            <x-select-input wire:model="status" required>
                                <option value="">Select Status</option>
                                <option value="kelas_10">10th Grade</option>
                                <option value="kelas_11">11th Grade</option>
                                <option value="kelas_12">12th Grade</option>
                                <option value="Kuliah">College</option>
                                <option value="gep_year">Gap Year</option>
                            </x-select-input>
                            @error('status')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- University Information -->
                        <div class="col-span-6 sm:col-span-3">
                            <x-input-label for="data_universitas_id" :value="__('First Choice University')" />
                            <x-select-input wire:model="data_universitas_id" class="select-university">
                                <option value="">Select First University</option>
                                @foreach ($university as $universitas)
                                    <option value="{{ $universitas->id }}">{{ $universitas->nama_universitas }}</option>
                                @endforeach
                            </x-select-input>
                            @error('data_universitas_id')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <x-input-label for="second_data_universitas_id" :value="__('Second Choice University')" />
                            <x-select-input wire:model="second_data_universitas_id" class="select-university">
                                <option value="">Select Second University</option>
                                @foreach ($university as $universitas)
                                    <option value="{{ $universitas->id }}">{{ $universitas->nama_universitas }}</option>
                                @endforeach
                            </x-select-input>
                            @error('second_data_universitas_id')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        @if (session()->has('message'))
                            <div class="col-span-6 mb-4 text-sm text-sky-600 bg-sky-50 px-3 py-2 rounded-md dark:text-sky-400">
                                {{ session('message') }}
                            </div>
                        @endif

                        <!-- Submit Button -->
                        <div class="col-span-6 sm:col-full">
                            <div class="w-fit">
                                <x-primary-button type="submit" class="">
                                    Update Profile
                                </x-primary-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-span-full xl:col-auto">
            <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <h3 class="mb-4 text-xl font-semibold dark:text-white">Password information</h3>
                @if (session()->has('message'))
                    <div class="mb-4 text-sm text-sky-600 bg-sky-50 px-3 py-2 rounded-md dark:text-sky-400">
                        {{ session('message') }}
                    </div>
                @endif
                <form wire:submit.prevent="updatePassword">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6">
                            <label for="current-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Current password</label>
                            <input wire:model="current_password" type="password" id="current-password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="••••••••">
                            @error('current_password') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-span-6">
                            <label for="new-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New password</label>
                            <input wire:model="new_password" type="password" id="new-password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="••••••••">
                            @error('new_password') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-span-6">
                            <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm password</label>
                            <input wire:model="confirm_password" type="password" id="confirm-password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="••••••••">
                            @error('confirm_password') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-span-6 sm:col-full">
                            <div class="w-fit">
                                <x-primary-button class="py-1" type="submit">Update Password</x-primary-button>
                            </div>
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