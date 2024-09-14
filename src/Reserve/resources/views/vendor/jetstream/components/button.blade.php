<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-s text-white uppercase tracking-widest hover:bg-gray-500 active:bg-gray-500 focus:outline-none focus:ring-2  focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
