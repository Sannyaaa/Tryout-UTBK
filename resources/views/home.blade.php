<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <!-- Styles -->
        <style>
            

            /* ! tailwindcss v3.4.1 | MIT License | https://tailwindcss.com */*,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::after,::before{--tw-content:''}:host,html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:Figtree, ui-sans-serif, system-ui, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;font-feature-settings:normal;font-variation-settings:normal;-webkit-tap-highlight-color:transparent}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;font-feature-settings:normal;font-variation-settings:normal;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-feature-settings:inherit;font-variation-settings:inherit;font-size:100%;font-weight:inherit;line-height:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}[type=button],[type=reset],[type=submit],button{-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}menu,ol,ul{list-style:none;margin:0;padding:0}dialog{padding:0}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}[role=button],button{cursor:pointer}:disabled{cursor:default}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]{display:none}*, ::before, ::after{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }.absolute{position:absolute}.relative{position:relative}.-left-20{left:-5rem}.top-0{top:0px}.-bottom-16{bottom:-4rem}.-left-16{left:-4rem}.-mx-3{margin-left:-0.75rem;margin-right:-0.75rem}.mt-4{margin-top:1rem}.mt-6{margin-top:1.5rem}.flex{display:flex}.grid{display:grid}.hidden{display:none}.aspect-video{aspect-ratio:16 / 9}.size-12{width:3rem;height:3rem}.size-5{width:1.25rem;height:1.25rem}.size-6{width:1.5rem;height:1.5rem}.h-12{height:3rem}.h-40{height:10rem}.h-full{height:100%}.min-h-screen{min-height:100vh}.w-full{width:100%}.w-\[calc\(100\%\+8rem\)\]{width:calc(100% + 8rem)}.w-auto{width:auto}.max-w-\[877px\]{max-width:877px}.max-w-2xl{max-width:42rem}.flex-1{flex:1 1 0%}.shrink-0{flex-shrink:0}.grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}.flex-col{flex-direction:column}.items-start{align-items:flex-start}.items-center{align-items:center}.items-stretch{align-items:stretch}.justify-end{justify-content:flex-end}.justify-center{justify-content:center}.gap-2{gap:0.5rem}.gap-4{gap:1rem}.gap-6{gap:1.5rem}.self-center{align-self:center}.overflow-hidden{overflow:hidden}.rounded-\[10px\]{border-radius:10px}.rounded-full{border-radius:9999px}.rounded-lg{border-radius:0.5rem}.rounded-md{border-radius:0.375rem}.rounded-sm{border-radius:0.125rem}.bg-\[\#FF2D20\]\/10{background-color:rgb(255 45 32 / 0.1)}.bg-white{--tw-bg-opacity:1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-gradient-to-b{background-image:linear-gradient(to bottom, var(--tw-gradient-stops))}.from-transparent{--tw-gradient-from:transparent var(--tw-gradient-from-position);--tw-gradient-to:rgb(0 0 0 / 0) var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), var(--tw-gradient-to)}.via-white{--tw-gradient-to:rgb(255 255 255 / 0)  var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), #fff var(--tw-gradient-via-position), var(--tw-gradient-to)}.to-white{--tw-gradient-to:#fff var(--tw-gradient-to-position)}.stroke-\[\#FF2D20\]{stroke:#FF2D20}.object-cover{object-fit:cover}.object-top{object-position:top}.p-6{padding:1.5rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.py-10{padding-top:2.5rem;padding-bottom:2.5rem}.px-3{padding-left:0.75rem;padding-right:0.75rem}.py-16{padding-top:4rem;padding-bottom:4rem}.py-2{padding-top:0.5rem;padding-bottom:0.5rem}.pt-3{padding-top:0.75rem}.text-center{text-align:center}.font-sans{font-family:Figtree, ui-sans-serif, system-ui, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji}.text-sm{font-size:0.875rem;line-height:1.25rem}.text-sm\/relaxed{font-size:0.875rem;line-height:1.625}.text-xl{font-size:1.25rem;line-height:1.75rem}.font-semibold{font-weight:600}.text-black{--tw-text-opacity:1;color:rgb(0 0 0 / var(--tw-text-opacity))}.text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.underline{-webkit-text-decoration-line:underline;text-decoration-line:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.shadow-\[0px_14px_34px_0px_rgba\(0\2c 0\2c 0\2c 0\.08\)\]{--tw-shadow:0px 14px 34px 0px rgba(0,0,0,0.08);--tw-shadow-colored:0px 14px 34px 0px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.ring-1{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.ring-transparent{--tw-ring-color:transparent}.ring-white\/\[0\.05\]{--tw-ring-color:rgb(255 255 255 / 0.05)}.drop-shadow-\[0px_4px_34px_rgba\(0\2c 0\2c 0\2c 0\.06\)\]{--tw-drop-shadow:drop-shadow(0px 4px 34px rgba(0,0,0,0.06));filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)}.drop-shadow-\[0px_4px_34px_rgba\(0\2c 0\2c 0\2c 0\.25\)\]{--tw-drop-shadow:drop-shadow(0px 4px 34px rgba(0,0,0,0.25));filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)}.transition{transition-property:color, background-color, border-color, fill, stroke, opacity, box-shadow, transform, filter, -webkit-text-decoration-color, -webkit-backdrop-filter;transition-property:color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;transition-property:color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-text-decoration-color, -webkit-backdrop-filter;transition-timing-function:cubic-bezier(0.4, 0, 0.2, 1);transition-duration:150ms}.duration-300{transition-duration:300ms}.selection\:bg-\[\#FF2D20\] *::selection{--tw-bg-opacity:1;background-color:rgb(255 45 32 / var(--tw-bg-opacity))}.selection\:text-white *::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.selection\:bg-\[\#FF2D20\]::selection{--tw-bg-opacity:1;background-color:rgb(255 45 32 / var(--tw-bg-opacity))}.selection\:text-white::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.hover\:text-black:hover{--tw-text-opacity:1;color:rgb(0 0 0 / var(--tw-text-opacity))}.hover\:text-black\/70:hover{color:rgb(0 0 0 / 0.7)}.hover\:ring-black\/20:hover{--tw-ring-color:rgb(0 0 0 / 0.2)}.focus\:outline-none:focus{outline:2px solid transparent;outline-offset:2px}.focus-visible\:ring-1:focus-visible{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.focus-visible\:ring-\[\#FF2D20\]:focus-visible{--tw-ring-opacity:1;--tw-ring-color:rgb(255 45 32 / var(--tw-ring-opacity))}@media (min-width: 640px){.sm\:size-16{width:4rem;height:4rem}.sm\:size-6{width:1.5rem;height:1.5rem}.sm\:pt-5{padding-top:1.25rem}}@media (min-width: 768px){.md\:row-span-3{grid-row:span 3 / span 3}}@media (min-width: 1024px){.lg\:col-start-2{grid-column-start:2}.lg\:h-16{height:4rem}.lg\:max-w-7xl{max-width:80rem}.lg\:grid-cols-3{grid-template-columns:repeat(3, minmax(0, 1fr))}.lg\:grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}.lg\:flex-col{flex-direction:column}.lg\:items-end{align-items:flex-end}.lg\:justify-center{justify-content:center}.lg\:gap-8{gap:2rem}.lg\:p-10{padding:2.5rem}.lg\:pb-10{padding-bottom:2.5rem}.lg\:pt-0{padding-top:0px}.lg\:text-\[\#FF2D20\]{--tw-text-opacity:1;color:rgb(255 45 32 / var(--tw-text-opacity))}}@media (prefers-color-scheme: dark){.dark\:block{display:block}.dark\:hidden{display:none}.dark\:bg-black{--tw-bg-opacity:1;background-color:rgb(0 0 0 / var(--tw-bg-opacity))}.dark\:bg-zinc-900{--tw-bg-opacity:1;background-color:rgb(24 24 27 / var(--tw-bg-opacity))}.dark\:via-zinc-900{--tw-gradient-to:rgb(24 24 27 / 0)  var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), #18181b var(--tw-gradient-via-position), var(--tw-gradient-to)}.dark\:to-zinc-900{--tw-gradient-to:#18181b var(--tw-gradient-to-position)}.dark\:text-white\/50{color:rgb(255 255 255 / 0.5)}.dark\:text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:text-white\/70{color:rgb(255 255 255 / 0.7)}.dark\:ring-zinc-800{--tw-ring-opacity:1;--tw-ring-color:rgb(39 39 42 / var(--tw-ring-opacity))}.dark\:hover\:text-white:hover{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:hover\:text-white\/70:hover{color:rgb(255 255 255 / 0.7)}.dark\:hover\:text-white\/80:hover{color:rgb(255 255 255 / 0.8)}.dark\:hover\:ring-zinc-700:hover{--tw-ring-opacity:1;--tw-ring-color:rgb(63 63 70 / var(--tw-ring-opacity))}.dark\:focus-visible\:ring-\[\#FF2D20\]:focus-visible{--tw-ring-opacity:1;--tw-ring-color:rgb(255 45 32 / var(--tw-ring-opacity))}.dark\:focus-visible\:ring-white:focus-visible{--tw-ring-opacity:1;--tw-ring-color:rgb(255 255 255 / var(--tw-ring-opacity))}}
        </style>

        {{-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script> --}}

        {{-- CDN font awesome --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/tom-select/2.2.2/css/tom-select.min.css" rel="stylesheet">
        <style>
        /* Optional: Custom styling untuk Tom Select */
        .ts-wrapper {
            width: 100%;
        }

        .ts-control {
            border-radius: 0.375rem;
            border-color: #d1d5db;
            padding: 0.5rem;
        }

        .ts-dropdown {
            border-radius: 0.375rem;
            border-color: #d1d5db;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .ts-dropdown .option {
            padding: 0.5rem;
        }

        .ts-dropdown .active {
            background-color: #e5e7eb;
        }
        </style>

    </head>
    <body>

        {{-- Content --}}

        {{-- Root --}}
        <div class="bg-gray-50">
            {{-- Navbar --}}
            <div id="header" class="w-full fixed bg-white">
                <header class="max-w-screen-xl w-full mx-auto z-10 bg-white border-gray-200 dark:bg-gray-900">
                    <nav class="flex flex-wrap items-center justify-between mx-auto p-4">
                        {{-- Logo --}}
                        <div class="max-h-10 h-full">
                            <img class="max-h-10 m-auto" src="https://seeklogo.com/images/G/graduation-logo-9BC4C93202-seeklogo.com.png" alt="">
                            {{-- <a href="#" class="flex justify-center py-4 bg-sky-50 rounded-lg">
                                <span class="self-center text-3xl font-semibold sm:text-4xl whitespace-nowrap text-sky-800 dark:text-white bg-sky-50">Flowbite</span>
                            </a> --}}
                        </div>

                        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                            </svg>
                        </button>
                        {{-- Navigation --}}
                        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                            <ul class="text-lg flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                                <li>
                                    <a href="#" class="block py-2 px-3 text-white bg-sky-400 rounded-lg" aria-current="page">Login</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-3 text-sky-400 rounded hover:bg-gray-100 hover:text-black dark:text-white dark:hover:bg-gray-700 dark:hover:text-white">Register</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </header>
            </div>
            {{-- Main Content --}}
            <div>
                <main>
                    {{-- Header Section --}}
                    <section class="bg-sky-100">
                        <div class="max-w-screen-xl mx-auto h-screen flex items-center">
                            <div class="w-1/2 h-full flex">
                                <div class="w-full h-1/2 my-auto p-6 flex flex-col justify-center items-start text-black">
                                    <h1 class="mb-4 text-6xl font-semibold">{{ $homePage->hero_title }}</h1>
                                    <p class="mb-4 text-gray-500">
                                        {!! $homePage->hero_desc !!}
                                    </p>
                                    <div>
                                        <span class="me-4">
                                            <button class="py-2 px-4 bg-sky-400 rounded-lg shadow text-lg text-white">
                                                Button
                                            </button>
                                        </span>
                                        <span>
                                            <button class="py-2 px-4 text-lg text-sky-400">
                                                Button
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="w-1/2 h-full flex">
                                <div class="my-auto h-1/2 ms-auto">
                                    <img class="h-full rounded-xl" src="{{ Storage::url($homePage->hero_image) }}" alt="">
                                </div>
                            </div>
                        </div>
                    </section>
                    {{-- <section style="background: linear-gradient(180deg, rgb(14 165 233) 50%, #fff 50%);">
                        <div class="max-w-screen-xl mx-auto flex justify-between items-center">
                            <div class="w-1/4">
                                <div class="bg-white rounded-xl mx-4 p-6 shadow-lg">
                                    <h4 class="text-2xl font-semibold text-rose-600">Feedback</h4>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tristique, neque vel efficitur mollis, velit lectus facilisis velit, sit amet consectetur neque neque ac velit. 
                                    </p>
                                </div>
                            </div>
                            <div class="w-1/4">
                                <div class="bg-white rounded-xl mx-4 p-6 shadow-lg">
                                    <h4 class="text-2xl font-semibold text-cyan-500">Feedback</h4>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tristique, neque vel efficitur mollis, velit lectus facilisis velit, sit amet consectetur neque neque ac velit. 
                                    </p>
                                </div>
                            </div>
                            <div class="w-1/4">
                                <div class="bg-white rounded-xl mx-4 p-6 shadow-lg">
                                    <h4 class="text-2xl font-semibold text-yellow-400">Feedback</h4>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tristique, neque vel efficitur mollis, velit lectus facilisis velit, sit amet consectetur neque neque ac velit. 
                                    </p>
                                </div>
                            </div>
                            <div class="w-1/4">
                                <div class="bg-white rounded-xl mx-4 p-6 shadow-lg">
                                    <h4 class="text-2xl font-semibold text-green-400">Feedback</h4>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tristique, neque vel efficitur mollis, velit lectus facilisis velit, sit amet consectetur neque neque ac velit. 
                                    </p>
                                </div>
                            </div>
                        </div>
                    </section> --}}
                    {{-- Appeals --}}
                    <section style="background: linear-gradient(180deg, rgb(224 242 254) 50%, rgb(249 250 251) 50%);">
                        <div class="max-w-screen-xl mx-auto py-24">
                            {{-- <h1 class="mb-12 text-center text-6xl text-sky-400 font-bold">Features</h1> --}}
                            <div class="bg-sky-400 rounded-lg shadow-lg flex items-center text-white">
                                <div class="w-1/4 py-5 px-10 my-5 border-e-2 border-white">
                                    <h4 class="mb-2 text-center text-6xl font-bold">150+</h4>
                                    <h6 class="text-center text-lg font-semibold">Total Tryout</h6>
                                </div>
                                <div class="w-1/4 py-5 px-10 my-5 border-e-2 border-white">
                                    <h4 class="mb-2 text-center text-6xl font-bold">5+</h4>
                                    <h6 class="text-center text-lg font-semibold">Event Bulanan</h6>
                                </div>
                                <div class="w-1/4 py-5 px-10 my-5 border-e-2 border-white">
                                    <h4 class="mb-2 text-center text-6xl font-bold">50+</h4>
                                    <h6 class="text-center text-lg font-semibold">Bimbel Telah Berjalan</h6>
                                </div>
                                <div class="w-1/4 py-5 px-10 my-5">
                                    <h4 class="mb-2 text-center text-6xl font-bold">80%</h4>
                                    <h6 class="text-center text-lg font-semibold">Diskon Hingga</h6>
                                </div>
                            </div>
                        </div>
                    </section>
                    {{-- Latest Courses --}}
                    <section>
                        <div class="max-w-screen-xl mx-auto py-24">
                            <h1 class="mb-12 text-center text-6xl text-sky-400 font-bold">Kursus Terbaru</h1>
                            <div>
                                <div class="grid grid-cols-3 gap-4">
                                    <div class="flex flex-col max-w-lg">
                                        <div class="text-gray-900 bg-white hover:shadow-lg transition-all border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                                            <div class="relative aspect-video overflow-hidden bg-cover align-middle p-2">
                                                <img class="object-cover object-center w-full h-full rounded-md" 
                                                    src="https://files.catbox.moe/kkm4kz.jpg" 
                                                    alt="package image" />
                                                <span class="relative bottom-10 -right-3 py-1 px-4 bg-sky-500 border-sky-400 border-2 text-white rounded-lg font-semibold">
                                                    Tryout
                                                </span>
                                            </div>
                                            <div class="px-5 py-3">
                                                <div>
                                                    <a href="#">
                                                        <h5 class="text-2xl font-semibold hover:underline text-gray-900 dark:text-white">
                                                            Package Name
                                                        </h5>
                                                    </a>
                                                </div>
                                                <p class="font-medium text-gray-500 dark:text-gray-400 mb-3">
                                                    Deskripsi Package
                                                </p>
                                                <div class="flex justify-between items-baseline mb-2">
                                                    <x-primary-link href="#">
                                                        Lihat Detail
                                                    </x-primary-link>
                                                    <span class="mt-auto text-3xl font-bold">
                                                        Rp 120.000
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    {{-- Features --}}
                    <section>
                        <div class="max-w-screen-xl mx-auto">
                            <h1 class="mb-12 text-center text-6xl text-sky-400 font-bold">Fitur-fitur kami</h1>
                            <div class="grid grid-cols-3 gap-12 text-white">
                                <div class="p-8 bg-sky-400 rounded-lg shadow-lg">
                                    <div class="w-min mb-6 px-6 py-4 bg-white rounded-lg text-2xl text-sky-400">
                                        <i class="fa-solid fa-file"></i>
                                    </div>
                                    <h2 class="mb-2 text-4xl font-bold">Doing</h2>
                                    <div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tristique, neque vel efficitur mollis, velit lectus facilisis velit, sit amet consectetur neque neque ac velit.
                                        </p>
                                    </div>
                                </div>
                                <div class="p-8 bg-sky-400 rounded-lg">
                                    <div class="w-min mb-6 px-6 py-4 bg-white rounded-lg text-2xl text-sky-400">
                                        <i class="fa-solid fa-hourglass-end"></i>
                                    </div>
                                    <h2 class="mb-2 text-4xl font-bold">Doing</h2>
                                    <div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tristique, neque vel efficitur mollis, velit lectus facilisis velit, sit amet consectetur neque neque ac velit.
                                        </p>
                                    </div>
                                </div>
                                <div class="p-8 bg-sky-400 rounded-lg">
                                    <div class="w-min mb-6 px-6 py-4 bg-white rounded-lg text-2xl text-sky-400">
                                        <i class="fa-solid fa-chart-pie"></i>
                                    </div>
                                    <h2 class="mb-2 text-4xl font-bold">Doing</h2>
                                    <div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tristique, neque vel efficitur mollis, velit lectus facilisis velit, sit amet consectetur neque neque ac velit.
                                        </p>
                                    </div>
                                </div>
                                <div class="p-8 bg-sky-400 rounded-lg">
                                    <div class="w-min mb-6 px-6 py-4 bg-white rounded-lg text-2xl text-sky-400">
                                        <i class="fa-solid fa-ranking-star"></i>
                                    </div>
                                    <h2 class="mb-2 text-4xl font-bold">Doing</h2>
                                    <div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tristique, neque vel efficitur mollis, velit lectus facilisis velit, sit amet consectetur neque neque ac velit.
                                        </p>
                                    </div>
                                </div>
                                <div class="p-8 bg-sky-400 rounded-lg">
                                    <div class="w-min mb-6 px-6 py-4 bg-white rounded-lg text-2xl text-sky-400">
                                        <i class="fa-solid fa-calendar-day"></i>
                                    </div>
                                    <h2 class="mb-2 text-4xl font-bold">Doing</h2>
                                    <div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tristique, neque vel efficitur mollis, velit lectus facilisis velit, sit amet consectetur neque neque ac velit.
                                        </p>
                                    </div>
                                </div>
                                <div class="p-8 bg-sky-400 rounded-lg">
                                    <div class="w-min mb-6 px-6 py-4 bg-white rounded-lg text-2xl text-sky-400">
                                        <i class="fa-solid fa-skull"></i>
                                    </div>
                                    <h2 class="mb-2 text-4xl font-bold">Doing</h2>
                                    <div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tristique, neque vel efficitur mollis, velit lectus facilisis velit, sit amet consectetur neque neque ac velit.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    {{-- Card Grids: Feedbacks --}}
                    <section>
                        <div class="max-w-screen-xl mx-auto py-24">
                            <h1 class="text-center text-6xl font-bold text-sky-500">Ulasan</h1>
                            {{-- <p class="w-3/4 mx-auto mt-4 mb-8 text-center text-gray-500">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas in excepturi explicabo omnis architecto molestiae ea ab, ratione iste nisi obcaecati aliquid inventore eveniet ducimus dolores perspiciatis ipsam dignissimos maxime?
                            </p> --}}
                            <div class="mt-4 grid grid-cols-3 gap-4">
                                <div class="p-8 bg-white border rounded-lg shadow-sm hover:shadow-lg">
                                    <h3 class="text-4xl font-bold">Andi</h3>
                                    <span class="text-md text-gray-500 font-semibold">Pelajar</span>
                                    <p class="mt-4">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tristique, neque vel efficitur mollis, velit lectus facilisis velit, sit amet consectetur neque neque ac velit.
                                    </p>
                                    <div class="mt-4">
                                        <span class="fa fa-star text-yellow-400"></span>
                                        <span class="fa fa-star text-yellow-400"></span>
                                        <span class="fa fa-star text-yellow-400"></span>
                                        <span class="fa fa-star text-yellow-400"></span>
                                        <span class="fa fa-star text-yellow-400"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    {{-- Card Grids: Teachers --}}
                    <section>
                        <div class="max-w-screen-xl mx-auto py-20">
                            <h1 class="text-center text-6xl font-bold text-sky-500">Teachers</h1>
                            {{-- <p class="w-3/4 mx-auto mt-4 mb-8 text-center text-gray-500">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas in excepturi explicabo omnis architecto molestiae ea ab, ratione iste nisi obcaecati aliquid inventore eveniet ducimus dolores perspiciatis ipsam dignissimos maxime?
                            </p> --}}
                            <div class="mt-4 grid grid-cols-3 gap-4">
                                <div class="bg-white border rounded-lg shadow-sm hover:shadow-lg overflow-hidden">
                                    <img class="w-full max-h-80 object-cover" src="https://images.unsplash.com/photo-1502823403499-6ccfcf4fb453?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                                    <div class="p-8">
                                        <h3 class="text-3xl font-semibold">Nama orang</h3>
                                        <div>
                                            <h6 class="mb-4 text-md text-gray-500 font-medium">Geometry Teacher</h6>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tristique, neque vel efficitur mollis, velit lectus facilisis velit, sit amet consectetur neque neque ac velit.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    {{-- Section Card --}}
                    <section>
                        <div class="max-w-screen-xl mx-auto flex items-top bg-sky-400 rounded-lg shadow-lg">
                            <div class="w-1/2 h-full flex">
                                <div class="m-auto h-1/2 w-full">
                                    <img class="h-full" src="{{ Storage::url($homePage->about_us_image) }}" alt="">
                                </div>
                            </div>
                            <div class="w-1/2 h-full flex">
                                <div class="my-10 p-20 ps-10 text-white">
                                    <h1 class="text-5xl font-bold mb-4">{{ $homePage->about_us_title }}</h1>
                                    <p>
                                        {!! $homePage->about_us_desc !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </section>
                    {{--  --}}
                    {{-- <section>
                        <div class="max-w-screen-xl mx-auto flex items-top">
                            <div class="w-1/2 h-full flex">
                                <div class="my-10 p-20 pe-10">
                                    <h1 class="text-4xl font-bold">Judul</h1>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tristique, neque vel efficitur mollis, velit lectus facilisis velit, sit amet consectetur neque neque ac velit.
                                    </p>
                                </div>
                            </div>
                            <div class="w-1/2 h-full flex">
                                <div class="m-auto h-1/2">
                                    <img class="h-full rounded-xl" src="https://www.ashkeebs.com/wp-content/uploads/2024/11/QK80-MK2-Limited-Edition-Product-Image-400x510.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </section> --}}
                    {{-- Product Cards --}}
                    <section>
                        <div class="mb-20"></div>
                    </section>
                    {{-- FAQ --}}
                    <section>
                        <div class="mb-20 max-w-screen-xl mx-auto">
                            <h1 class="mb-8 text-center text-6xl font-bold text-sky-500">Pertanyaan Umum</h1>
                            <div id="accordion-collapse" data-accordion="collapse" class="rounded-lg shadow-sm mx-20">
                                @forelse ($faqs as $i => $faq)
                                    <h2 id="accordion-collapse-heading-{{ $i }}">
                                        <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-{{ $i }}" aria-expanded="false" aria-controls="accordion-collapse-body-{{ $i }}">
                                            <span>{{ $faq->question }}</span>
                                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                            </svg>
                                        </button>
                                    </h2>
                                    <div id="accordion-collapse-body-{{ $i }}" class="hidden" aria-labelledby="accordion-collapse-heading-{{ $i }}">
                                        <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700 rounded-b-lg">
                                            <p class="mb-2 text-gray-500 dark:text-gray-400">{{ $faq->answer }}.</p>
                                        </div>
                                    </div>
                                @empty
                                    
                                @endforelse
                            </div>
                        </div>
                    </section>
                </main>
                <footer class="bg-gradient-to-r from-sky-900 to-sky-950 text-white">
                    <div class="max-w-screen-xl px-4 py-16 mx-auto sm:px-6 lg:px-8">
                        <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
                            <div>
                                <img src="#" class="mr-5 h-6 sm:h-9" alt="logo" />
                                <p class="max-w-xs mt-4 text-sm text-zinc-200">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, accusantium.
                                </p>
                                <div class="flex mt-8 space-x-6 text-zinc-200">
                                    <a class="hover:opacity-75" href target="_blank" rel="noreferrer">
                                        <span class="sr-only"> Facebook </span>
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                            <path fillRule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clipRule="evenodd" />
                                        </svg>
                                    </a>
                                    <a class="hover:opacity-75" href target="_blank" rel="noreferrer">
                                        <span class="sr-only"> Instagram </span>
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                            <path fillRule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clipRule="evenodd" />
                                        </svg>
                                    </a>
                                    <a class="hover:opacity-75" href target="_blank" rel="noreferrer">
                                        <span class="sr-only"> Twitter </span>
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                            <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                                        </svg>
                                    </a>
                                    <a class="hover:opacity-75" href target="_blank" rel="noreferrer">
                                        <span class="sr-only"> GitHub </span>
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                            <path fillRule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clipRule="evenodd" />
                                        </svg>
                                    </a>
                                    <a class="hover:opacity-75" href target="_blank" rel="noreferrer">
                                        <span class="sr-only"> Dribbble </span>
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                            <path fillRule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z" clipRule="evenodd" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 gap-8 lg:col-span-2 sm:grid-cols-2 lg:grid-cols-4">
                                <div>
                                    <p class="font-medium">
                                        Company
                                    </p>
                                    <nav class="flex flex-col mt-4 space-y-2 text-sm text-zinc-200">
                                        <a class="hover:opacity-75" href> About </a>
                                        <a class="hover:opacity-75" href> Meet the Team </a>
                                        <a class="hover:opacity-75" href> History </a>
                                        <a class="hover:opacity-75" href> Careers </a>
                                    </nav>
                                </div>
                                <div>
                                    <p class="font-medium">
                                        Services
                                    </p>
                                    <nav class="flex flex-col mt-4 space-y-2 text-sm text-zinc-200">
                                        <a class="hover:opacity-75" href> 1on1 Coaching </a>
                                        <a class="hover:opacity-75" href> Company Review </a>
                                        <a class="hover:opacity-75" href> Accounts Review </a>
                                        <a class="hover:opacity-75" href> HR Consulting </a>
                                        <a class="hover:opacity-75" href> SEO Optimisation </a>
                                    </nav>
                                </div>
                                <div>
                                    <p class="font-medium">
                                        Helpful Links
                                    </p>
                                    <nav class="flex flex-col mt-4 space-y-2 text-sm text-zinc-200">
                                        <a class="hover:opacity-75" href> Contact </a>
                                        <a class="hover:opacity-75" href> FAQs </a>
                                        <a class="hover:opacity-75" href> Live Chat </a>
                                    </nav>
                                </div>
                                <div>
                                    <p class="font-medium">
                                        Legal
                                    </p>
                                    <nav class="flex flex-col mt-4 space-y-2 text-sm text-zinc-200">
                                        <a class="hover:opacity-75" href> Privacy Policy </a>
                                        <a class="hover:opacity-75" href> Terms &amp; Conditions </a>
                                        <a class="hover:opacity-75" href> Returns Policy </a>
                                        <a class="hover:opacity-75" href> Accessibility </a>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <p class="mt-8 text-xs text-zinc-200">
                            © 2024 by Sannyaa Works
                        </p>
                    </div>
                </footer>
            </div>
        </div>
        
        {{--  --}}

        <script type="module" src="{{ asset('js/index.js') }}"></script>
        <script src="{{ asset('js/sidebar.js') }}"></script>
        <script src="{{ asset('js/dark-mode.js') }}"></script>
        <script src="{{ asset('js/charts.js') }}"></script>
        <script src="./path/to/flowbite/dist/flowbite.js"></script>
        
        <!-- DataTables CSS -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>                                                                          
        <!-- DataTables JS -->
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        {{-- <script src="./path/to/flowbite/dist/flowbite.js"></script> --}}

    </body>
</html>
