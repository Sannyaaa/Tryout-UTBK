{{-- @props(['disabled' => false]) --}}

{{-- <input @disabled($disabled) {{ $attributes->merge(['class' => 'bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500']) }}> --}}
<a href="{{ $link ?? '#' }}" class="flex items-center py-2 px-3 text-base text-gray-900 rounded-lg hover:bg-gradient-to-tr hover:from-sky-400 hover:to-sky-500 hover:text-white group dark:text-gray-200 dark:hover:bg-gray-700">
    <span class="text-gray-500 transition duration-75 group-hover:text-white dark:text-gray-400 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        {{ $slot }}
    </span>
    <span class="ml-3" sidebar-toggle-item>{{ $name }}</span>
</a>