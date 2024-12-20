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
                            <a href="{{ route('admin.tryout.index') }}" class="ml-1 text-gray-50 hover:text-sky-200 md:ml-2 dark:text-gray-300 dark:hover:text-white">Paket</a>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-50" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <span class="ml-1 text-gray-50 md:ml-2 dark:text-gray-500" aria-current="page">Buat Paket</span>
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
            <form action="{{ route('admin.package_member.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="space-y-4">

                    <div>
                        <x-input-label for="name" :value="__('Nama Paket')" />
                        <x-text-input type="text" :value="old('name')" name="name" id="name" placeholder="Masukan Nama" required=""/>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="image" :value="__('Image')" />
                        <x-file-input type="file" name="image" id="image" placeholder="Masukan Image Package member" />
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="description" :value="__('Deskripsi')" />
                        <x-text-area id="description" name="description" rows="4" placeholder="Masukan description"/>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="benefits" :value="__('Benefits Package Member')" />
                        <div class="benefits-container space-y-3">
                            <div class="benefit-input flex gap-2">
                                <x-text-input type="text" name="benefits[]" placeholder="Enter benefit" required/>
                                <button type="button" class="add-benefit px-3 py-2 text-sm font-medium text-white bg-gradient-to-tr from-sky-400 to-sky-500 rounded-lg focus:ring-4 focus:ring-blue-300">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div>
                        <x-input-label for="price" :value="__('Harga')" />
                        <x-text-input type="number" :value="old('price')" name="price" id="price" placeholder="Masukan Harga"/>
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                    </div>

                    <div class="space-y-4">
                        <!-- Input Radio untuk memilih antara Tryout dan Bimbel -->
                        <div>
                            <x-input-label :value="__('Pilih Jenis')" />
                            <div class="flex items-center">
                                <label class="mr-4">
                                    <input type="radio" name="type" value="tryout" class="mr-2" id="tryoutRadio" checked>
                                    Tryout
                                </label>
                                <label>
                                    <input type="radio" name="type" value="bimbel" class="mr-2" id="bimbelRadio">
                                    Bimbel
                                </label>
                            </div>
                        </div>

                        <!-- Dropdown untuk Tryout -->
                        <div id="tryoutContainer">
                            <x-input-label for="tryout_id" :value="__('Tryout')" />
                            <x-select-input id="tryout_id" name="tryout_id">
                                <option selected="" disabled>Pilih Tryout</option>
                                @foreach ($tryout as $tryouts)
                                    <option value="{{ $tryouts->id }}" {{ old('tryout_id') == $tryouts->id ? 'selected' : '' }}>{{ $tryouts->name }}</option>
                                @endforeach
                            </x-select-input>
                            <x-input-error :messages="$errors->get('tryout_id')" class="mt-2" />
                        </div>

                        <!-- Dropdown untuk Bimbel -->
                        <div id="bimbelContainer" style="display: none;">
                            <x-input-label for="bimbel_id" :value="__('Bimbel')" />
                            <x-select-input id="bimbel_id" name="bimbel_id">
                                <option selected="" disabled>Pilih Bimbel</option>
                                @foreach ($bimbel as $bimbels)
                                    <option value="{{ $bimbels->id }}" {{ old('bimbel_id') == $bimbels->id ? 'selected' : '' }}>{{ $bimbels->name }}</option>
                                @endforeach
                            </x-select-input>
                            <x-input-error :messages="$errors->get('bimbel_id')" class="mt-2" />
                        </div>
                    </div>

                    <div>
                        <x-input-label>Pilih Discount:</x-input-label>
                        <ul class="grid w-full gap-6 md:grid-cols-3">
                            @forelse ($discounts as $discount)
                                <li>
                                    <input type="checkbox" id="discount-{{ $discount->id }}" value="{{ $discount->id }}" name="discounts[]" class="hidden peer" >
                                    <label for="discount-{{ $discount->id }}" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 ">                           
                                        <div class="block">
                                            <div class="w-full text-lg font-semibold">{{ $discount->name }}</div>
                                            <div class="w-full text-sm">Potongan Harga Sebesar {{ number_format($discount->discount_value) }} {{ $discount->discount_type == 'percentage' ? '%' : 'rupiah' }}.</div>
                                        </div>
                                    </label>
                                </li>
                            @empty
                                <span class="bg-sky-50 text-sky-600 border border-sky-500 text-sm px-3 py-2 rounded-md">
                                    * Buat Voucher Discount Terlebih Dahulu
                                </span>
                            @endforelse
                        </ul>
                    </div>
                    
                    <div class="flex justify-between">
                        <x-secondary-link href="{{ route('admin.package_member.index') }}">
                            Kembali
                        </x-secondary-link>
                        <x-primary-button type="submit">
                            Submit
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
        document.getElementById('is_together').addEventListener('change', function() {
            var dateInputs = document.getElementById('date-inputs');
            dateInputs.style.display = this.value === 'together' ? 'block' : 'none';
            
            // Toggle required attribute
            var inputs = dateInputs.getElementsByTagName('input');
            for(var i = 0; i < inputs.length; i++) {
                inputs[i].required = this.value === 'together';
            }
        });
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const benefitsContainer = document.querySelector('.benefits-container');
        
        // Template for new benefit input
        const benefitTemplate = `
            <div class="benefit-input flex gap-2">
                <x-text-input type="text" name="benefits[]" placeholder="Enter benefit" required/>
                <button type="button" class="remove-benefit px-3 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-red-300">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        `;

        // Add new benefit input
        document.addEventListener('click', function(e) {
            if (e.target.closest('.add-benefit')) {
                const newBenefit = document.createElement('div');
                newBenefit.innerHTML = benefitTemplate;
                benefitsContainer.appendChild(newBenefit);
            }
        });

        // Remove benefit input
        document.addEventListener('click', function(e) {
            if (e.target.closest('.remove-benefit')) {
                const benefitInput = e.target.closest('.benefit-input');
                if (benefitsContainer.children.length > 1) {
                    benefitInput.remove();
                }
            }
        });
    });
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const tryoutRadio = document.getElementById('tryoutRadio');
        const bimbelRadio = document.getElementById('bimbelRadio');
        const tryoutContainer = document.getElementById('tryoutContainer');
        const bimbelContainer = document.getElementById('bimbelContainer');

        // Fungsi untuk memperbarui tampilan dropdown berdasarkan pilihan
        function updateVisibility() {
            if (tryoutRadio.checked) {
                tryoutContainer.style.display = 'block';
                bimbelContainer.style.display = 'none';
            } else if (bimbelRadio.checked) {
                tryoutContainer.style.display = 'none';
                bimbelContainer.style.display = 'block';
            }
        }

        // Event listener untuk radio buttons
        tryoutRadio.addEventListener('change', updateVisibility);
        bimbelRadio.addEventListener('change', updateVisibility);

        // Inisialisasi tampilan
        updateVisibility();
    });
</script>
@endpush

