@extends('layouts.frontend')

@section('content')
    <div class="bg-sky-50">
        <div class="relative isolate px-6 lg:px-8" id="home">
            <div class="w-full lg:flex py-16 lg:py-20 px-10 lg:px-14  xl:px-32 space-y-10">
                <div class="w-4/5 lg:w-1/2 flex justify-center items-center pe-10">
                    <div class="text-left w-full">
                        <h1 class="text-5xl font-bold text-sky-900 lg:text-6xl ">{{ $homePage->hero_title }}</h1>

                        <div class="mt-6 text-lg  text-gray-600">{!! $homePage->hero_desc !!}</div>

                        <div class="mt-6 inline-flex items-center gap-x-3">
                            <x-primary-link href="{{ route('login') }}" class="py-1 px-2">
                                Login
                            </x-primary-link>
                            <x-secondary-link href="{{ route('register') }}" class="py-1 px-2">
                                Register
                            </x-secondary-link>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-1/2 px-0 lg:px-8 mx-auto my-auto">
                    <div class="overflow-hidden">
                        <img src="{{ Storage::url($homePage->hero_image) }}" alt="" class=" min-w-10">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white">
        <div class="">

            <div class="py-24" id="features">
                <div class="text-center w-3/5 md:w-2/5 mx-auto">
                    <h1 class="text-4xl font-bold  text-sky-900 md:text-5xl lg:text-6xl ">{{ $homePage->feature_title ?? '' }}</span></h1>

                    <p class="mt-6 text-lg  text-gray-600">{!! $homePage->feature_desc ?? '' !!}</p>
                </div>
                <div class="mt-6 px-4 sm:px-20 lg:px-40">
                    <div class="w-full flex flex-wrap justify-center">
                        @foreach ($features as $feature)
                            <div class="p-4 lg:p-6 max-w-xl w-full lg:w-1/2">
                                <div class="p-12 bg-sky-50 rounded-lg shadow-lg hover:shadow-xl transition-all duration-200">
                                    <div class="text-center mb-4">
                                        <div class=" w-24 flex items-center justify-center text-sky-900 aspect-square rounded-full bg-sky-500 mx-auto">
                                            <span class=" text-4xl text-sky-50"><i class="{{ $feature->image }}"></i></span>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <h2 class="text-2xl  font-bold text-sky-900">{{ $feature->name }}</h2>
                                        <p class="mt-2 text-gray-600">{{ $feature->description }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="w-full px-4 sm:px-16 lg:px-32 space-y-10 py-8 mt-16 bg-sky-50" id="aboutUs">
                <div class="px-10 lg:flex">
                    <div class="w-full lg:w-1/2 px-0 lg:px-8 mx-auto my-auto">
                        <div class="overflow-hidden">
                            <img src="{{ Storage::url($homePage->about_us_image) }}" alt="" class="min-w-10">
                        </div>
                    </div>
                    <div class="w-4/5 lg:w-1/2 flex justify-center items-center">
                        <div class="text-left w-full pb-20 lg:pt-20">
                            <h1 class="text-5xl font-bold  text-sky-900 lg:text-6xl ">{{ $homePage->about_us_title }}</h1>

                            <div class="mt-6 text-lg  text-gray-600">{!! $homePage->about_us_desc !!}</div>
                        
                            <div class="mt-6">
                                <x-primary-link class="" href="{{ route('login') }}">
                                    Hubungi Kami
                                </x-primary-link>
                                {{-- <a href="{{ route('list-menu') }}" class="px-8 py-4 transition-all bg-slate-800 text-white hover:bg-white border-slate-800 border-4 hover:text-sky-900 rounded-xl font-bold text-lg">Explore Menu</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- @if ($promotions)
                <div id="default-carousel" class="relative w-full" data-carousel="slide">
                <!-- Carousel wrapper -->
                    <div class="relative h-56 overflow-hidden bg-sky-50 rounded-lg shadow-lg md:h-96 p-1 z-20">
                        @foreach ($promotions as $promo)
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <a href="{{ route('packages') }}">
                                    <img src="{{ Storage::url($promo->image) }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <!-- Slider controls -->
                    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>
                    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                </div>
            @endif --}}

            <div class="mt-32">
                <div class="text-center w-3/5 md:w-2/5 mx-auto">
                    <h1 class="text-4xl font-bold  text-sky-900 md:text-5xl lg:text-6xl ">{{ $homePage->package_title }}</h1>

                    <p class="mt-6 text-lg  text-gray-600">{!! $homePage->package_desc !!}</p>
                </div>
                <div class="mt-12 px-4 lg:px-36 xl:px-56">
                    <div class="w-full flex flex-wrap justify-center">

                        <!-- Package Grid Section -->
                        <section class="grid grid-cols-1 space-y-12 md:space-y-0 lg:grid-cols-2 xl:grid-cols-3 md:gap-x-8 md:gap-8">
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
                                                <a href="{{ route('package.item', $package->id) }}">
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
                                                <x-primary-link href="{{ route('package.item', $package->id) }}">
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
                    <div class="text-center w-full mt-6">
                        <x-primary-link href="{{ route('packages') }}" class="px-2 py-1">
                            Lihat Semua Paket
                        </x-primary-link>
                    </div>
                </div>
            </div>

            <div class="py-32" id="teachers">
                <div class="text-center w-3/5 md:w-2/5 mx-auto">
                    <h1 class="text-4xl font-bold text-sky-900 md:text-5xl lg:text-6xl ">{{ $homePage->mentor_title }}</h1>

                    <p class="mt-6 text-lg  text-gray-600">{!! $homePage->mentor_desc !!}</p>
                </div>
                <div class="my-12  lg:px-32">
                    <div class="flex justify-center">
                        <div class="w-full flex flex-wrap justify-center">
                            @forelse ($teachers as $teacher)
                                <div class="m-4 max-w-sm">
                                    <div class="rounded-lg border bg-white px-5 pt-8 pb-5 shadow transition-all hover:shadow-xl ">
                                        <div class="relative mx-auto w-48 rounded-full bg-slate-50 p-2">
                                            <div class="absolute right-0 m-3 h-3 w-3">
                                                <span class="relative flex h-4 w-4">
                                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75"></span>
                                                    <span class="relative inline-flex rounded-full h-4 w-4 bg-sky-500"></span>
                                                </span>
                                            </div>
                                            <img class="mx-auto h-auto w-full rounded-full" src="{{ Storage::url($teacher->avatar ?? '') }}" alt="" />
                                        </div>
                                        <h1 class="my-1 text-center text-xl font-bold leading-8 capitalize text-sky-900">{{ $teacher->name }}</h1>
                                        {{-- <h3 class="font-lg text-semibold text-center leading-6 text-gray-600">{{ $teacher->mentor->teach ?? '' }}</h3> --}}
                                        <div class="text-center text-sm leading-6 text-gray-500 hover:text-gray-600">{!! Str::limit($teacher->mentor->description ?? '',150) !!}</div>
                                        <ul class="mt-3 divide-y rounded bg-sky-50 py-1 px-3 text-sky-600 shadow-sm hover:text-sky-700 hover:shadow">
                                            <li class="flex items-center py-3 text-sm">
                                                <span>Mengajar</span>
                                                <span class="ml-auto font-semibold"><span class="">{{ $teacher->mentor->teach ?? '' }}</span></span>
                                            </li>
                                            <li class="flex items-center py-3 text-sm">
                                                <span>Lulusan</span>
                                                <span class="ml-auto font-semibold"><span class="">{{ $teacher->mentor->data_universitas->nama_universitas ?? '' }}</span></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            @empty
                                <span class="text-center">
                                    Belum ada product
                                </span>
                            @endforelse
                        </div>
                    </div>
                    <div class="text-center w-full mt-6">
                        <x-primary-link href="{{ route('mentor-page') }}" class="px-2 py-1">
                            Lihat Semua Mentor
                        </x-primary-link>
                    </div>
                </div>
            </div>

            <div class="w-full bg-sky-50" id="testimonials">
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
                                perView: 2.5,
                                spacing: 32,
                            },
                            },
                        },
                        },
                        []
                    )

                    const keenSliderPrevious = document.getElementById('keen-slider-previous')
                    const keenSliderNext = document.getElementById('keen-slider-next')

                    keenSliderPrevious.addEventListener('click', () => keenSlider.prev())
                    keenSliderNext.addEventListener('click', () => keenSlider.next())
                    </script>

                    <section class="w-full">
                        <div class="mx-auto max-w-[1340px] px-4 py-12 sm:px-6 lg:py-16 lg:pe-0 lg:ps-8 xl:py-24">
                            <div class="max-w-7xl items-end justify-between sm:flex sm:pe-6 lg:pe-8">
                                <h2 class="max-w-xl text-4xl font-bold tracking-tight text-sky-900 sm:text-5xl">
                                    {{ $homePage->testimonial_title }}
                                </h2>

                                <p class="mt-6 text-lg  text-gray-600">{!! $homePage->testimonial_desc !!}</p>

                                <div class="mt-8 flex gap-4 lg:mt-0">
                                    <button
                                    aria-label="Previous slide"
                                    id="keen-slider-previous"
                                    class="rounded-full border border-sky-500 p-3 text-sky-500 transition hover:bg-sky-500 hover:text-white"
                                    >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        class="size-5 rtl:rotate-180"
                                    >
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                                    </svg>
                                    </button>

                                    <button
                                    aria-label="Next slide"
                                    id="keen-slider-next"
                                    class="rounded-full border border-sky-500 p-3 text-sky-500 transition hover:bg-sky-500 hover:text-white"
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

                            <div class="-mx-6 mt-8 lg:col-span-2 lg:mx-0">
                                <div id="keen-slider" class="keen-slider p-8">
                                    @foreach ($testimonials as $testimonial)
                                        <div class="keen-slider__slide bg-white p-6 shadow-xl rounded-xl shadow-sky-100 sm:p-8 lg:p-10">
                                            <blockquote
                                                class="flex h-full flex-col justify-between "
                                            >
                                                <div>

                                                    <div class="">
                                                        
                                                        <div class="mb-2 leading-relaxed text-2xl font-semibold text-gray-600 italic">
                                                            "{!! $testimonial->content !!}"
                                                        </div>

                                                        <p class="text-lg text-sky-500 font-medium italic sm:text-xl">-- {{ $testimonial->package_member->name }}</p>

                                                    </div>
                                                </div>

                                                <footer class="mt-2 text-sm font-medium text-gray-700 sm:mt-3">
                                                    <div class="flex items-center mt-4 space-x-4">
                                                        <img src="{{ Storage::url($testimonial->user->avatar ?? '') }}" alt="" class="w-12 h-12 bg-center bg-cover rounded-full dark:bg-gray-500">
                                                        <div>
                                                            <p class="text-lg font-semibold">{{ $testimonial->user->name }}</p>
                                                            <p class="text-sm dark:text-gray-600">{{ $testimonial->user->email }}</p>
                                                        </div>
                                                    </div>
                                                </footer>
                                            </blockquote>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </section>
            </div>

            {{-- <div class=""> --}}
                <section id="faqs">
                    <div class="py-28 max-w-screen-lg px-12 mx-auto">
                        <h1 class="mb-8 text-center text-6xl font-bold text-sky-900">{{ $homePage->faq_title }}</h1>
                        <div id="accordion-color" data-accordion="collapse" data-active-classes="bg-sky-100 dark:bg-gray-800 text-sky-600 dark:text-white">
                            @forelse ($faqs as $i => $faq)
                                <h2 id="accordion-color-heading-{{ $i }}">
                                    <button type="button" class="flex items-center justify-between w-full p-5 font-semibold capitalize text-lg rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-sky-200 dark:focus:ring-sky-800 dark:border-gray-700 dark:text-gray-400 hover:bg-sky-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-color-body-{{ $i }}" aria-expanded="true" aria-controls="accordion-color-body-{{ $i }}">
                                        <span>{{ $faq->question }}</span>
                                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                        </svg>
                                    </button>
                                </h2>
                                <div id="accordion-color-body-{{ $i }}" class="hidden" aria-labelledby="accordion-color-heading-{{ $i }}">
                                    <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                        <div class="mb-2 text-gray-500 dark:text-gray-400">{{ $faq->answer }}</div>
                                    </div>
                                </div>
                            @empty
                                
                            @endforelse
                        </div>
                    </div>
                </section>
            {{-- </div> --}}
            
        </div>
    </div>
@endsection
