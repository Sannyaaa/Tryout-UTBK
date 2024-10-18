@props(['value'])
{{-- block text-sm font-medium text-gray-900 dark:text-white --}}
<label {{ $attributes->merge(['class' => 'block mb-2 font-medium text-sm text-gray-900 dark:text-white']) }}>
    {{ $value ?? $slot }}
</label>
