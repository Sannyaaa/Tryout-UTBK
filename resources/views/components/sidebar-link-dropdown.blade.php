{{-- @props(['disabled' => false]) --}}

{{-- <input @disabled($disabled) {{ $attributes->merge(['class' => 'bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500']) }}> --}}
<a href="{{ $link ?? '#' }}" class=" {{ request()->fullUrlIs(url($link)) ? " text-sky-500 font-medium hover:text-sky-700 bg-sky-400 bg-opacity-5 border-l-4 border-sky-500" : " text-gray-700 hover:bg-sky-400 hover:bg-opacity-5 hover:border-l-4 hover:border-sky-500" }} flex items-center py-2 px-3 text-base rounded-lg group dark:text-gray-200 dark:hover:bg-gray-700">
    <span class=" {{ request()->fullUrlIs(url($link)) ? " hover:text-gray-700  text-white" : " text-gray-100 hover:text-white" }} transition duration-75 group-hover:text-white dark:text-gray-400 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        {{ $slot }}
    </span>
    <span class="mx-3" sidebar-toggle-item>{{ $name }}</span>
</a>