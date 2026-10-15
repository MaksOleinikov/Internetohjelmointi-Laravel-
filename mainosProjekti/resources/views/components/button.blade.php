<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-spruce-800 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-spruce-700 focus:bg-spruce-700 active:bg-spruce-900 focus:outline-none focus:ring-2 focus:ring-spruce-700 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
