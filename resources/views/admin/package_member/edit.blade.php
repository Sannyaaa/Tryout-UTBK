@extends('layouts.app')

@section('content')

<div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
    <div class="w-full mb-1">
        <div class="mb-4">
            <nav class="flex mb-5" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                  <li class="inline-flex items-center">
                    <a href="#" class="inline-flex items-center text-gray-700 hover:text-blue-600 dark:text-gray-300 dark:hover:text-white">
                      <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                      Home
                    </a>
                  </li>
                  <li>
                    <div class="flex items-center">
                      <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                      <a href="{{ route('admin.package_member.index') }}" class="ml-1 text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">package_member</a>
                    </div>
                  </li>
                  <li>
                    <div class="flex items-center">
                      <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                      <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500" aria-current="page">Create</span>
                    </div>
                  </li>
                </ol>
            </nav>
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Edit package_member</h1>
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
        <form action="{{ route('admin.package_member.update', $package_member->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="space-y-4">

                <div>
                    <x-input-label for="name" :value="__('Name Package Member')" />
                    <x-text-input type="text" :value="$package_member->name ?? old('name')" name="name" id="name" placeholder="Masukan name" required=""/>
                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                </div>
                
                <div>
                    <img src="{{ Storage::url($package_member->image) }}" class="w-[300px]" alt="">
                </div>

                <div>
                    <x-input-label for="image" :value="__('Image')" />
                    <x-file-input type="file" name="image" id="image" placeholder="Masukan Image package_member" required=""/>
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="description" :value="__('description')" />
                    <x-text-area id="description" name="description" rows="4" placeholder="Masukan description">{{$package_member->description}}</x-text-area>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="benefits" :value="__('Benefits Package Member')" />
                    <div class="benefits-container space-y-3">
                        @foreach($package_member->benefits as $benefit)
                            <div class="benefit-input flex gap-2">
                                <x-text-input type="text" name="benefits[]" value="{{ $benefit->benefit }}" placeholder="Enter benefit" required/>
                                <button type="button" class="remove-benefit px-3 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-red-300">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                            </div>
                        @endforeach
                        @if($package_member->benefits->isEmpty())
                            <div class="benefit-input flex gap-2">
                                <x-text-input type="text" name="benefits[]" placeholder="Enter benefit" required/>
                                <button type="button" class="remove-benefit px-3 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-red-300">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                            </div>
                        @endif
                    </div>
                    <button type="button" class="add-benefit mt-2 px-3 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                        <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        Add Benefit
                    </button>
                </div>

                <div>
                    <x-input-label for="price" :value="__('Price')" />
                    <x-text-input type="number" :value="$package_member->price ?? old('price')" name="price" id="price" placeholder="Masukan price" required=""/>
                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                </div>

                <div class="grid lg:grid-cols-2 gap-3">
                    <div>
                        <x-input-label for="tryout_id" :value="__('Tryout')" />
                        <x-select-input id="tryout_id" name="tryout_id" >
                            <option selected="" disabled>Select Tryout</option>
                            @foreach ($tryout as $tryouts)
                                <option value="{{ $tryouts->id }}" {{ $package_member->tryout_id == $tryouts->id ? 'selected' : '' }}>{{ $tryouts->name }}</option>
                            @endforeach
                        </x-select-input>
                        <x-input-error :messages="$errors->get('tryout_id')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="bimbel_id" :value="__('Bimbel')" />
                        <x-select-input id="bimbel_id" name="bimbel_id" >
                            <option selected="" disabled>Select Bimbel</option>
                            @foreach ($bimbel as $bimbels)
                                <option value="{{ $bimbels->id }}" {{ $package_member->bimbel_id == $bimbels->id ? 'selected' : '' }}>{{ $bimbels->name }}</option>
                            @endforeach
                        </x-select-input>
                        <x-input-error :messages="$errors->get('bimbel_id')" class="mt-2" />
                    </div>
                </div>
                
                <div class="flex justify-between">
                        <x-secondary-href href="{{ route('admin.package_member.index') }}">
                            Back
                        </x-secondary-href>
                        <x-primary-button type="submit">
                            Edit Package member
                        </x-primary-button>
                </div>
        </form>
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
            document.querySelector('.add-benefit').addEventListener('click', function() {
                const newBenefit = document.createElement('div');
                newBenefit.innerHTML = benefitTemplate;
                benefitsContainer.appendChild(newBenefit.firstElementChild);
            });

            // Remove benefit input
            benefitsContainer.addEventListener('click', function(e) {
                if (e.target.closest('.remove-benefit')) {
                    const benefitInput = e.target.closest('.benefit-input');
                    if (benefitsContainer.children.length > 1) {
                        benefitInput.remove();
                    }
                }
            });
        });
        </script>
@endpush
