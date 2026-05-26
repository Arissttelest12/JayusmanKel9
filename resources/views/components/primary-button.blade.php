<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-[#00ADB5] border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#00838F] hover:shadow-lg hover:shadow-[#00ADB5]/30 focus:bg-[#00838F] active:bg-[#00747e] active:scale-95 focus:outline-none focus:ring-2 focus:ring-[#00ADB5] focus:ring-offset-2 transition-all ease-out duration-300 transform hover:-translate-y-0.5']) }}>
    {{ $slot }}
</button>
