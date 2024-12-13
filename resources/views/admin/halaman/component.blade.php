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
                            <a href="#" class="inline-flex items-center text-gray-50 hover:text-sky-200 dark:text-gray-300 dark:hover:text-white">
                            <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-50" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <a href="#" class="ml-1 text-gray-50 hover:text-sky-200 md:ml-2 dark:text-gray-300 dark:hover:text-white">Halaman</a>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-50" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <span class="ml-1 text-gray-50 md:ml-2 dark:text-gray-500" aria-current="page">Edit Component</span>
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

            
            <form action="{{ $componentPage != null ? route('admin.edit-component-page', $componentPage->id) : route('admin.create-component-page') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method( $componentPage != null ? 'PUT' : 'POST' )
                <div class="space-y-16">
                    
                    <div class="grid lg:grid-cols-2 gap-4">

                        <div class="space-y-4">
                            <div>
                                <img src="{{ $componentPage != null ? Storage::url($componentPage->navbar_image) : '' }}" class="w-[400px] mx-auto" alt="">
                            </div>

                            <div>
                                <x-input-label for="navbar_image" :value="__('Logo Navbar')" />
                                <x-file-input type="file" name="navbar_image" id="navbar_image" placeholder="Masukan Logo Navbar "/>
                                <x-input-error :messages="$errors->get('navbar_image')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="copyright" :value="__('Copyright')" />
                                <x-text-area id="copyright" name="copyright" rows="4" placeholder="Masukan Copyright">{!! $componentPage->copyright ?? '' !!}</x-text-area>
                                <x-input-error :messages="$errors->get('copyright')" class="mt-2" />
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div>
                                <img src="{{ $componentPage != null ? Storage::url($componentPage->footer_image) : '' }}" class="w-[400px] mx-auto" alt="">
                            </div>

                            <div>
                                <x-input-label for="footer_image" :value="__('Logo Footer')" />
                                <x-file-input type="file" name="footer_image" id="footer_image" placeholder="Masukan Logo Footer "/>
                                <x-input-error :messages="$errors->get('footer_image')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="short_desc" :value="__('Deskripsi Singkat')" />
                                <x-text-area id="short_desc" name="short_desc" rows="4" placeholder="Masukan Deskripsi Singkat">{!! $componentPage->short_desc ?? '' !!}</x-text-area>
                                <x-input-error :messages="$errors->get('short_desc')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div>
                            <x-input-label for="instagram" :value="__('Link Instagram')" />
                            <x-text-input type="url" name="instagram" value="{{ $componentPage->instagram ?? '' }}" id="instagram" placeholder="Masukan Link Instagram"/>
                            <x-input-error :messages="$errors->get('instagram')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="facebook" :value="__('Link Facebook')" />
                            <x-text-input type="url" name="facebook" value="{{ $componentPage->facebook ?? '' }}" id="facebook" placeholder="Masukan Link Facebook"/>
                            <x-input-error :messages="$errors->get('facebook')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="youtube" :value="__('Link Youtube')" />
                            <x-text-input type="url" name="youtube" value="{{ $componentPage->youtube ?? '' }}" id="youtube" placeholder="Masukan Link Youtube"/>
                            <x-input-error :messages="$errors->get('youtube')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="tiktok" :value="__('Link Tiktok')" />
                            <x-text-input type="url" name="tiktok" value="{{ $componentPage->tiktok ?? '' }}" id="tiktok" placeholder="Masukan Link Tiktok"/>
                            <x-input-error :messages="$errors->get('tiktok')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="x" :value="__('Link X')" />
                            <x-text-input type="url" name="x" value="{{ $componentPage->x ?? '' }}" id="x" placeholder="Masukan Link X"/>
                            <x-input-error :messages="$errors->get('x')" class="mt-2" />
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input type="email" name="email" value="{{ $componentPage->email ?? '' }}" id="email" placeholder="Masukan email"/>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="phone" :value="__('Nomer Telephone')" />
                            <x-text-input type="number" name="phone" value="{{ $componentPage->phone ?? '' }}" id="phone" placeholder="Masukan Nomer Telephone"/>
                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                        </div>
                        
                        <div class=" col-span-2">
                            <x-input-label for="address" :value="__('Alamat')" />
                            <x-text-area id="address" name="address" rows="4" placeholder="Masukan Deskripsi Hero">{!! $componentPage->address ?? '' !!}</x-text-area>
                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                        </div>
                        
                    </div>
                    
                    <div class="flex justify-between">
                        <x-secondary-link href="{{ route('admin.package_member.index') }}">
                            Kembali
                        </x-secondary-link>
                        <x-primary-button type="submit">
                            Submit
                        </x-primary-button>
                    </div>
            </form>
        </div>
    </div>
</div>


@endsection

@push('script')

    
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const faqsContainer = document.querySelector('.faqs-container');
            
            // Template for new faq input
            const faqTemplate = `
                <div class="faq-input gap-2">
                    <div>
                        <div>
                            <x-input-label for="question" :value="__('question Package Member')" />
                            <x-text-input type="text" name="question[]" id="question" placeholder="Masukan question"/>
                            <x-input-error :messages="$errors->get('question')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="answer" :value="__('answer')" />
                            <textarea id="answer" name="answer[]" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan answer"></textarea>
                            <x-input-error :messages="$errors->get('answer')" class="mt-2" />
                        </div>
                    </div>
                    <div class="mt-2 text-right">
                        <button type="button" class="remove-faq px-3 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-red-300">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>
            `;

            // Add new faq input
            document.querySelector('.add-faq').addEventListener('click', function() {
                const newFaq = document.createElement('div');
                newFaq.innerHTML = faqTemplate;
                faqsContainer.appendChild(newFaq.firstElementChild);
            });

            // Remove faq input
            faqsContainer.addEventListener('click', function(e) {
                if (e.target.closest('.remove-faq')) {
                    const faqInput = e.target.closest('.faq-input');
                    if (faqsContainer.children.length > 1) {
                        faqInput.remove();
                    }
                }
            });
        });
    </script> --}}

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const featuresContainer = document.querySelector('.features-container');
            
            // Template for new feature input
            const featureTemplate = `
                <div class="feature-input gap-2">
                    <div>

                        <!-- Trigger Button -->
                        <button id="openPopup" type="button" class="bg-blue-500 text-white px-4 py-2 rounded">
                            Pilih Ikon
                        </button>

                        <!-- Popup -->
                        <div id="iconPopup" class="fixed inset-0 z-30 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
                            <div class="bg-white py-16 px-20 rounded-lg w-4/5 max-h-[80vh] overflow-y-auto">
                                <!-- Header -->
                                <div class="flex justify-between items-center mb-4">
                                    <h2 class="text-lg font-semibold">Pilih Ikon</h2>
                                    <button id="closePopup" type="button" class="text-gray-500 hover:text-gray-700">&times;</button>
                                </div>
                                
                                <!-- Search Input -->
                                <input
                                    type="text"
                                    id="iconSearch"
                                    class="border border-gray-300 rounded-lg px-3 py-2 mb-4 w-full"
                                    placeholder="Cari ikon...">
                                
                                <!-- Icon List -->
                                <div id="iconList" class="grid grid-cols-4 lg:grid-cols-6 gap-4">
                                    <!-- Ikon akan dimuat di sini -->
                                </div>
                                
                                <!-- Submit Button -->
                                <button id="submitIcon" type="button" class="bg-green-500 text-white px-4 py-2 rounded mt-4">
                                    Pilih
                                </button>
                            </div>
                        </div>

                        <div id="selectedIconDisplay" class="mt-4">
                            <i id="selectedIconPreview" class="text-3xl"></i>
                            <input type="hidden" id="selectedIconInput" name="feature_icon[]">
                        </div>

                        <div>
                            <x-input-label for="feature_name" :value="__('feature_name Package Member')" />
                            <x-text-input type="text" name="feature_name[]" id="feature_name" placeholder="Masukan feature_name"/>
                            <x-input-error :messages="$errors->get('feature_name')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="feature_desc" :value="__('feature_desc')" />
                            <textarea id="feature_desc" name="feature_desc[]" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan feature_desc">{!! $feature->feature_desc ?? '' !!}</textarea>
                            <x-input-error :messages="$errors->get('feature_desc')" class="mt-2" />
                        </div>
                    </div>
                    <div class="mt-2 text-right">
                        <button type="button" class="remove-feature px-3 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-red-300">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>
            `;

            // Add new feature input
            document.querySelector('.add-feature').addEventListener('click', function() {
                const newfeature = document.createElement('div');
                newfeature.innerHTML = featureTemplate;
                featuresContainer.appendChild(newfeature.firstElementChild);    
            });

            // Remove feature input
            featuresContainer.addEventListener('click', function(e) {
                if (e.target.closest('.remove-feature')) {
                    const featureInput = e.target.closest('.feature-input');
                    if (featuresContainer.children.length > 1) {
                        featureInput.remove();
                    }
                }
            });
        });
    </script> --}}

    {{-- <script>
        document.addEventListener('DOMContentLoaded', () => {
            const popups = [
                { open: 'openPopup1', close: 'closePopup1', popup: 'iconPopup1', search: 'iconSearch1', list: 'iconList1', submit: 'submitIcon1', input: 'selectedIconInput1', preview: 'selectedIconPreview1' },
                { open: 'openPopup2', close: 'closePopup2', popup: 'iconPopup2', search: 'iconSearch2', list: 'iconList2', submit: 'submitIcon2', input: 'selectedIconInput2', preview: 'selectedIconPreview2' },
                { open: 'openPopup3', close: 'closePopup3', popup: 'iconPopup3', search: 'iconSearch3', list: 'iconList3', submit: 'submitIcon3', input: 'selectedIconInput3', preview: 'selectedIconPreview3' },
                { open: 'openPopup4', close: 'closePopup4', popup: 'iconPopup4', search: 'iconSearch4', list: 'iconList4', submit: 'submitIcon4', input: 'selectedIconInput4', preview: 'selectedIconPreview4' }
            ];

            const icons = @json($icons); // Dummy data

            popups.forEach(({ open, close, popup, search, list, submit, input, preview }) => {
                const openPopup = document.getElementById(open);
                const closePopup = document.getElementById(close);
                const iconPopup = document.getElementById(popup);
                const iconSearch = document.getElementById(search);
                const iconList = document.getElementById(list);
                const submitIcon = document.getElementById(submit);

                // Fungsi render ikon tetap sama
                function renderIcons(searchQuery = '') {
                    iconList.innerHTML = '';
                    Object.keys(icons).forEach(icon => {
                        const details = icons[icon];
                        if (searchQuery === '' || icon.toLowerCase().includes(searchQuery.toLowerCase())) {
                            details.styles.forEach(style => {
                                const iconClass = `fa-${style} fa-${icon}`;
                                const iconItem = document.createElement('div');
                                iconItem.className = 'flex flex-col items-center justify-center bg-white space-y-2 h-36';
                                iconItem.innerHTML = `
                                    <div class="w-full h-full">
                                        <input type="radio" id="${iconClass}" name="icon" value="${iconClass}" class="hidden peer" required />
                                        <label for="${iconClass}" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-sky-500 peer-checked:border-sky-600 peer-checked:text-sky-600 peer-checked:bg-sky-100 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">                           
                                            <div class="flex flex-col w-full justify-center items-center">
                                                <i class="${iconClass} text-3xl font-bold mb-2"></i>
                                                <span class="text-sm">${icon}</span>
                                            </div>
                                        </label>
                                    </div>
                                `;
                                iconList.appendChild(iconItem);
                            });
                        }
                    });
                }

                openPopup.addEventListener('click', () => {
                    iconPopup.classList.remove('hidden');
                    renderIcons();
                });

                closePopup.addEventListener('click', () => {
                    iconPopup.classList.add('hidden');
                });

                iconSearch.addEventListener('input', () => {
                    renderIcons(iconSearch.value);
                });

                submitIcon.addEventListener('click', () => {
                    const selectedRadio = document.querySelector(`#${list} input[name="icon"]:checked`);
                    if (selectedRadio) {
                        const selectedIcon = selectedRadio.value;
                        document.getElementById(input).value = selectedIcon;
                        iconPopup.classList.add('hidden');
                        document.getElementById(preview).className = selectedIcon;
                    } else {
                        alert('Pilih salah satu ikon!');
                    }
                });
            });
        });

    </script> --}}

@endpush

