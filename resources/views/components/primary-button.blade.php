
<div {{ $attributes->merge(['class' => 'w-full px-4 py-2 text-base font-semibold text-center text-white bg-gradient-to-tr from-sky-400 to-sky-500 rounded-lg hover:from-sky-500 hover:to-sky-600 focus:ring-4 focus:ring-blue-300 sm:w-auto dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800']) }}>
    <button {{ $attributes->merge([ 'type' => 'submit']) }}>
        {{ $slot }}
    </button>
</div>
