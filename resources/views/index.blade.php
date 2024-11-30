@extends('layouts.frontend')

@section('content')
    <div class="bg-sky-50">
        <div class="relative isolate px-6 lg:px-8">
            <div class="w-full md:flex py-16 lg:py-20 px-10 md:px-14 lg:px-20 xl:px-32 space-y-10">
                <div class="w-4/5 md:w-1/2 flex justify-center items-center pe-10">
                    <div class="text-left w-full">
                        <h1 class="text-5xl font-bold text-sky-950 md:text-6xl lg:text-7xl ">{{ $homePage->hero_title }}</h1>

                        <div class="mt-6 text-lg  text-gray-600">{!! $homePage->hero_desc !!}</div>

                        <div class="mt-6 inline-flex items-center gap-x-6">
                            <x-primary-link href="{{ route('login') }}" class="py-1 px-2 rounded-full">
                                Login
                            </x-primary-link>
                            
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 px-0 md:px-8 mx-auto my-auto">
                    <div class="overflow-hidden">
                        <img src="{{ Storage::url($homePage->hero_image) }}" alt="" class=" min-w-10">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white">
        <div class="py-24">

            <div class="mt-6">
                <div class="text-center w-3/5 md:w-2/5 mx-auto">
                    <h1 class="text-4xl font-bold  text-sky-950 md:text-5xl lg:text-6xl ">Our <span class="">Feature</span></h1>

                    <p class="mt-6 text-lg  text-gray-600">Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat aliqua.</p>
                </div>
                <div class="mt-6 px-4 sm:px-20 lg:px-40">
                    <div class="w-full flex flex-wrap justify-center">
                        @foreach ($features as $feature)
                            <div class="p-4 lg:p-6 max-w-xl w-full md:w-1/2">
                                <div class="p-12 bg-sky-50 hover:bg-sky-200 rounded-lg shadow-lg hover:shadow-xl transition-all duration-200">
                                    <div class="text-center mb-4">
                                        <div class=" w-24 flex items-center justify-center text-sky-900 aspect-square rounded-full bg-sky-950 mx-auto">
                                            <span class=" text-4xl text-sky-50"><i class="{{ $feature->image }}"></i></span>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <h2 class="text-2xl  font-bold text-gray-800">{{ $feature->name }}</h2>
                                        <p class="mt-2 text-gray-600">{{ $feature->description }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="my-32">
                <div class="text-center w-3/5 md:w-2/5 mx-auto">
                    <h1 class="text-4xl font-bold text-sky-900 md:text-5xl lg:text-6xl ">Categories <span class="text-yellow-300">Menu</span></h1>

                    <p class="mt-6 text-lg  text-gray-600">Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat aliqua.</p>
                </div>
                <div class="my-12 px-4 sm:px-16 lg:px-32">
                    <div class="flex justify-center px-10">
                        <div class="w-full flex flex-wrap justify-center">
                            {{-- @forelse ($categories as $category)
                                <div class="p-3 md:p-4 max-w-sm bg-opacity-100">
                                    <a href="{{ route('list-menu-category',$category->id) }}" class="flex flex-col justify-center items-center">
                                        <div class="rounded-full border-8 {{ isset($selectedCategory) && $selectedCategory->id == $category->id ? 'border-slate-800' : 'border-yellow-200' }}  group-hover:border-yellow-100 overflow-hidden shadow-lg hover:shadow-2xl">
                                            <img class="w-full" src="{{ Storage::url($category->image) }}" alt="category image" />
                                        </div>
                                        <span class="text-base px-6 py-3  rounded-full {{ isset($selectedCategory) && $selectedCategory->id == $category->id ? 'bg-slate-800 text-white font-semibold' : 'bg-white' }} -mt-8 shadow-lg hover:shadow-2xl transition-all">{{ $category->name }}</span>
                                    </a>
                                </div>
                            @empty
                                <span class="text-center">
                                    Belum ada product
                                </span>
                            @endforelse --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full px-4 sm:px-16 lg:px-32 space-y-10 mt-16 bg-sky-50">
                <div class="px-10 md:flex">
                    <div class="w-full md:w-1/2 px-0 md:px-8 mx-auto my-auto">
                        <div class="overflow-hidden">
                            <img src="{{ Storage::url($homePage->about_us_image) }}" alt="" class="min-w-10">
                        </div>
                    </div>
                    <div class="w-4/5 md:w-1/2 flex justify-center items-center">
                        <div class="text-left w-full pb-20 md:pt-20">
                            <h1 class="text-5xl font-bold  text-sky-950 md:text-6xl lg:text-7xl ">{{ $homePage->about_us_title }}</h1>

                            <div class="mt-6 text-lg  text-gray-600">{!! $homePage->about_us_desc !!}</div>
                        
                            <div class="mt-10">
                                {{-- <a href="{{ route('list-menu') }}" class="px-8 py-4 transition-all bg-slate-800 text-white hover:bg-white border-slate-800 border-4 hover:text-sky-900 rounded-xl font-bold text-lg">Explore Menu</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-32">
                <div class="text-center w-3/5 md:w-2/5 mx-auto">
                    <h1 class="text-4xl font-bold  text-sky-900 md:text-5xl lg:text-6xl ">Paket Terbaru Kami</h1>

                    <p class="mt-6 text-lg  text-gray-600">Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat aliqua.</p>
                </div>
                <div class="mt-12 px-4 md:px-32 lg:px-40 xl:px-56">
                    <div class="w-full flex flex-wrap justify-center">

                        <!-- Package Grid Section -->
                        <section class="grid grid-cols-1 space-y-12 md:space-y-0 md:grid-cols-2 lg:grid-cols-3 md:gap-x-8 md:gap-8">
                            @foreach ($packages as $package)
                                <div class="flex flex-col max-w-lg">
                                    <div class="text-gray-900 bg-white hover:shadow-xl transition-all border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                                        <div class="relative aspect-video overflow-hidden bg-cover align-middle p-2">
                                            <img class="object-cover object-center w-full h-full rounded-md" 
                                                src="{{ $package->image != null ? Storage::url($package->image) : asset('build/assets/Photo-Image-Icon-Graphics-10388619-1-1-580x386.jpg') }}" 
                                                alt="package image" />
                                            {{-- <span class="relative bottom-10 -right-3 py-1 px-4 bg-sky-500 border-sky-400 border-2 text-white rounded-lg font-semibold">
                                                {{ $package->tryout_id != null ? 'Tryout' : 'Bimbel' }}
                                            </span> --}}
                                        </div>
                                        <div class="px-5 py-2">
                                            <div>
                                                <a href="{{ route('user.package.item', $package->id) }}">
                                                    <h5 class="text-3xl font-bold hover:underline text-gray-800 uppercase dark:text-white mb-0">
                                                        {{ $package->name }}
                                                    </h5>
                                                </a>
                                            </div>
                                            {{-- <p class="font-medium text-gray-500 dark:text-gray-400 mb-3">
                                                {!! Str::limit($package->description, 100, '...') !!}
                                            </p> --}}
                                            <div class="space-y-1 my-2">
                                                @foreach ($package->benefits as $benefit)
                                                    <div class="flex items-center space-x-3 text-gray-500 font-medium text-sm">
                                                        <!-- Icon -->
                                                        <div class="p-1 bg-sky-400 rounded-full">
                                                            <svg class="flex-shrink-0 w-4 h-4 text-gray-100 dark:text-gray-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                                        </div>
                                                        <span>{{ $benefit->benefit }}</span>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="flex justify-between items-baseline my-3">
                                                <x-primary-link href="{{ route('user.package.item', $package->id) }}">
                                                    Lihat Detail
                                                </x-primary-link>
                                                <span class="mt-auto text-3xl font-bold">
                                                    Rp.{{ number_format($package->price) }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </section>

                    </div>

                </div>
            </div>

            <div class="flex px-4 sm:px-16 lg:px-32 mt-40">
                <!--
                    Heads up! 👋

                    This component comes with some `rtl` classes. Please remove them if they are not needed in your project.
                    -->

                    <link href="https://cdn.jsdelivr.net/npm/keen-slider@6.8.6/keen-slider.min.css" rel="stylesheet" />

                    <script type="module">
                    import KeenSlider from 'https://cdn.jsdelivr.net/npm/keen-slider@6.8.6/+esm'

                    const keenSlider = new KeenSlider(
                        '#keen-slider',
                        {
                        loop: true,
                        slides: {
                            origin: 'center',
                            perView: 1.25,
                            spacing: 16,
                        },
                        breakpoints: {
                            '(min-width: 1024px)': {
                            slides: {
                                origin: 'auto',
                                perView: 1.5,
                                spacing: 32,
                            },
                            },
                        },
                        },
                        []
                    )

                    const keenSliderPrevious = document.getElementById('keen-slider-previous')
                    const keenSliderNext = document.getElementById('keen-slider-next')

                    const keenSliderPreviousDesktop = document.getElementById('keen-slider-previous-desktop')
                    const keenSliderNextDesktop = document.getElementById('keen-slider-next-desktop')

                    keenSliderPrevious.addEventListener('click', () => keenSlider.prev())
                    keenSliderNext.addEventListener('click', () => keenSlider.next())

                    keenSliderPreviousDesktop.addEventListener('click', () => keenSlider.prev())
                    keenSliderNextDesktop.addEventListener('click', () => keenSlider.next())
                    </script>

                    <section class="bg-gray-50 mx-auto">
                    <div class="mx-auto max-w-[1340px] px-4 py-12 sm:px-6 lg:me-0 lg:py-16 xl:py-24">
                        <div class="grid grid-cols-1 gap-8 lg:grid-cols-3 lg:items-center lg:gap-16">
                        <div class="max-w-2xl ltr:sm:text-left rtl:sm:text-right">
                            <div class="px-12 sm:px-20 lg:px-0">
                                <h2 class="text-4xl font-bold  text-sky-900 md:text-5xl lg:text-6xl ">
                                    <span class="text-yellow-300">Testimonials</span> Our Customers
                                </h2>

                                <p class="mt-4 text-gray-700">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptas veritatis illo placeat
                                harum porro optio fugit a culpa sunt id!
                                </p>
                            </div>

                            <div class="hidden lg:mt-8 lg:flex lg:gap-4 p-3">
                            <button
                                aria-label="Previous slide"
                                id="keen-slider-previous-desktop"
                                class="rounded-full border border-rose-600 p-3 text-rose-600 transition hover:bg-rose-600 hover:text-white"
                            >
                                <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="size-5 rtl:rotate-180"
                                >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M15.75 19.5L8.25 12l7.5-7.5"
                                />
                                </svg>
                            </button>

                            <button
                                aria-label="Next slide"
                                id="keen-slider-next-desktop"
                                class="rounded-full border border-sky-600 p-3 text-sky-600 transition hover:bg-sky-600 hover:text-white"
                            >
                                <svg
                                class="size-5 rtl:rotate-180"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                                >
                                <path
                                    d="M9 5l7 7-7 7"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                />
                                </svg>
                            </button>
                            </div>
                        </div>

                        <div class="-mx-6 lg:col-span-2 lg:mx-0">
                            <div id="keen-slider" class="keen-slider p-6">

                                {{-- @forelse ($feedbacks as $feedback)
                                    <div class="keen-slider__slide shadow-lg ">
                                        <div class="swiper-slide group hover:bg-yellow-300 bg-white shadow-xl border-solid border-slate-800 rounded-2xl p-6 transition-all duration-500 hover:shadow-xl">
                                            <div class="flex items-center gap-5 mb-5 sm:mb-5">
                                                <img class="rounded-full border-white border-4 h-14 w-14" src="{{ $feedback->user->avatar ? Storage::url($feedback->user->avatar) : 'https://pagedone.io/asset/uploads/1696229969.png' }}" alt="avatar">
                                                <div class="grid gap-1">
                                                    <h5 class="text-sky-900 font-semibold transition-all duration-500  ">{{ $feedback->name }}</h5>
                                                    <span class="text-sm leading-6 text-gray-500">{{ $feedback->email }}</span>
                                                </div>
                                            </div>
                                            <div
                                                class="flex items-center mb-5 sm:mb-5 gap-2 text-sky-900 transition-all duration-500  ">
                                                @for ($i = 0;$i < $feedback->rating;$i++)
                                                    <svg class="w-5 h-5" viewBox="0 0 18 17" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M8.10326 1.31699C8.47008 0.57374 9.52992 0.57374 9.89674 1.31699L11.7063 4.98347C11.8519 5.27862 12.1335 5.48319 12.4592 5.53051L16.5054 6.11846C17.3256 6.23765 17.6531 7.24562 17.0596 7.82416L14.1318 10.6781C13.8961 10.9079 13.7885 11.2389 13.8442 11.5632L14.5353 15.5931C14.6754 16.41 13.818 17.033 13.0844 16.6473L9.46534 14.7446C9.17402 14.5915 8.82598 14.5915 8.53466 14.7446L4.91562 16.6473C4.18199 17.033 3.32456 16.41 3.46467 15.5931L4.15585 11.5632C4.21148 11.2389 4.10393 10.9079 3.86825 10.6781L0.940384 7.82416C0.346867 7.24562 0.674378 6.23765 1.4946 6.11846L5.54081 5.53051C5.86652 5.48319 6.14808 5.27862 6.29374 4.98347L8.10326 1.31699Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                @endfor
                                            </div>
                                            <p
                                                class="text-sm text-gray-500 leading-6 transition-all duration-500 min-h-24  group-hover:text-gray-800">
                                                {{ $feedback->message }}
                                            </p>

                                        </div>
                                    </div>
                                @empty
                                    <span>Testimonial Not Found</span>
                                @endforelse --}}
                                
                            </div>
                        </div>
                        </div>

                        <div class="mt-8 flex justify-center gap-4 lg:hidden">
                        <button
                            aria-label="Previous slide"
                            id="keen-slider-previous"
                            class="rounded-full border-4 border-slate-800 p-4 text-sky-900 transition hover:bg-yellow-300 hover:text-sky-900"
                        >
                            <svg
                            class="size-5 -rotate-180 transform"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                            >
                            <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                            </svg>
                        </button>

                        <button
                            aria-label="Next slide"
                            id="keen-slider-next"
                            class="rounded-full border-4 border-slate-800 p-4 text-sky-900 transition hover:bg-yellow-300 hover:text-sky-900"
                        >
                            <svg
                            class="h-5 w-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                            >
                            <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                            </svg>
                        </button>
                        </div>
                    </div>
                    </section>
            </div>

            <div class="flex">
                
            </div>
            
        </div>
    </div>
@endsection
