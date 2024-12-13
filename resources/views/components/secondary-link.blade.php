{{-- @props(['class' => '']) --}}

<div {{ $attributes->merge(['class' => 'w-full flex px-5 py-2 text-base font-semibold text-center text-sky-600 bg-sky-50 hover:bg-sky-100 border border-sky-600 rounded-lg hover:shadow-lg hover:-translate-y-1 transition-all duration-300 focus:ring-4 focus:ring-blue-300 sm:w-auto dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800']) }}>
    <a {{ $attributes }} class="flex justify-center items-center">
        {{ $slot }}
    </a>
</div>
