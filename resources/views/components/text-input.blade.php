@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-slate-300 focus:border-[#00ADB5] focus:ring-[#00ADB5] rounded-xl shadow-sm transition-all duration-300 ease-out hover:border-slate-400']) }}>
