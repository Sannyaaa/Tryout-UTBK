<button {{ $attributes->merge([ 'type' => 'submit', 'class' => 'w-full px-5 py-3 text-base font-medium text-center text-white  bg-gradient-to-tr from-sky-400 to-sky-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 sm:w-auto dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800']) }}>
    {{ $slot }}
</button>
