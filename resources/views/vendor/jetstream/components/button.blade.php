<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-cyan-700 border border-transparent rounded-md font-semibold text-xs tracking-widest text-cyan-100 hover:text-white hover:bg-cyan-600 active:bg-cyan-900 focus:outline-none focus:border-cyan-900 focus:ring focus:ring-cyan-300 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
