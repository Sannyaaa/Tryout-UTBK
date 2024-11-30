{{-- @props(['disabled' => false]) --}}
@props(['link' => '#', 'token' => '', 'name' => ''])

{{-- <input @disabled($disabled) {{ $attributes->merge(['class' => 'bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500']) }}> --}}
<a href="{{ $link ?? '#' }}" data-token="{{ $token }}" class=" {{ request()->segment(1) == $token ? " hover:text-gray-100 font-semibold bg-gradient-to-tr from-sky-400 to-sky-500 text-white" : " text-gray-700 font-medium hover:text-white hover:bg-sky-300 hover:font-semibold" }} flex items-center py-2 px-3 text-base rounded-lg transition-all duration-200 group dark:text-gray-200 dark:hover:bg-gray-700">
    <span class=" {{ request()->fullUrlIs(url($link)) ? " hover:text-gray-700  text-white" : " text-gray-700  group-hover:text-slate-700" }} transition duration-200 group-hover:text-white dark:text-gray-400 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        {{ $slot }} 
    </span>
    <span class="mx-3" sidebar-toggle-item>{{ $name }}</span>
</a>