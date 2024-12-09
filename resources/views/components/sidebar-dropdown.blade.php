{{-- @props(['disabled' => false]) --}}

{{-- <input @disabled($disabled) {{ $attributes->merge(['class' => 'bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500']) }}> --}}

{{-- flex items-center p-2 text-base text-gray-900 rounded-lg group hover:bg-gray-100 transition duration-75 pl-11 dark:text-gray-200 dark:hover:bg-gray-700 bg-gray-100 dark:bg-gray-700  --}}
{{-- flex items-center p-2 text-base text-gray-900 rounded-lg transition duration-75  pl-11 group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700 --}}
{{-- 
@php
    // Check if any of the child routes are active
    $isActive = false;
    $childRoutes = Str::of($content)->matchAll('/route\(\'(.*?)\'\)/');
    
    foreach ($childRoutes as $route) {
        if (request()->routeIs($route)) {
            $isActive = true;
            break;
        }
    }
@endphp --}}

<div class="relative">
    <button 
        type="button" 
        class="flex items-center w-full py-2 px-3 text-base transition-all duration-200 rounded-lg group
        {{ $isActive ?? false ? 'bg-gradient-to-tr from-sky-400 to-sky-500 text-white font-semibold' : 'font-medium hover:font-semibold text-gray-700 hover:bg-sky-300 hover:text-white' }}"
        aria-controls="dropdown-{{ $id }}"
        data-collapse-toggle="dropdown-{{ $id }}"
        onclick="toggleDropdown('{{ $id }}')">
        {{ $slot }}
        <span class="flex-1 ml-3 text-left whitespace-nowrap">{{ $name }}</span>
        <svg sidebar-toggle-item 
            class="w-6 h-6 transition-transform duration-200 {{ $isActive ?? false ? 'rotate-180' : '' }}"
            fill="currentColor" 
            viewBox="0 0 20 20" 
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" 
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                clip-rule="evenodd">
            </path>
        </svg>
    </button>

    <ul id="dropdown-{{ $id }}" 
        class="{{ $isActive ?? false ? '' : 'hidden' }} p-2 space-y-1">
        {{ $content }}
    </ul>
</div>


