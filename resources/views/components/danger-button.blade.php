<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-rose-500 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-rose-600 hover:shadow-lg hover:shadow-rose-500/30 active:bg-rose-700 focus:outline-none focus:ring-2 focus:ring-rose-500 focus:ring-offset-2 transition-all ease-out duration-300 transform hover:-translate-y-0.5 active:scale-95']) }}>
    {{ $slot }}
</button>
