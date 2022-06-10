<button {{ $attributes->merge(['class' => 'py-3 px-6 bg-orange-500 text-gray-900 rounded-lg text-lg shadow-md hover:bg-orange-400 transition ease-out duration-1']) }}>
    {{ $slot }}
</button>
