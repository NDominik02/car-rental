<button {{ $attributes->merge(['class' => 'relative inline-flex items-center px-4 py-2 text-sm font-medium
text-gray-700 bg-white
border border-gray-300
leading-5 rounded-md
hover:text-gray-500
focus:outline-none focus:ring ring-gray-800 focus:border-green-300
active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150
dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-green-700 dark:active:bg-gray-700 dark:active:text-gray-300']) }}>{{
    $slot }}</button>
