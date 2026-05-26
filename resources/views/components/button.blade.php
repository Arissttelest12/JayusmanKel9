@props([
    'type' => 'button',
    'variant' => 'primary',
    'class' => '',
])

@php
    $baseClasses = 'inline-flex items-center justify-center px-4 py-2 rounded-xl font-semibold text-sm transition-all duration-300 ease-out transform hover:-translate-y-0.5 active:scale-95 focus:outline-none focus:ring-2 focus:ring-offset-2';
    
    $variantClasses = match($variant) {
        'primary' => 'bg-[#00ADB5] text-white hover:bg-[#00838F] hover:shadow-lg hover:shadow-[#00ADB5]/30 focus:ring-[#00ADB5]',
        'success' => 'bg-emerald-500 text-white hover:bg-emerald-600 hover:shadow-lg hover:shadow-emerald-500/30 focus:ring-emerald-500',
        'danger' => 'bg-rose-500 text-white hover:bg-rose-600 hover:shadow-lg hover:shadow-rose-500/30 focus:ring-rose-500',
        'secondary' => 'bg-slate-100 text-slate-700 hover:bg-slate-200 hover:shadow-md focus:ring-slate-400 border border-slate-200',
        'primary-text' => 'text-[#00ADB5] hover:text-[#00838F] bg-transparent hover:bg-[#00ADB5]/10 px-3',
        'success-text' => 'text-emerald-500 hover:text-emerald-600 bg-transparent hover:bg-emerald-50 px-3',
        'danger-text' => 'text-rose-500 hover:text-rose-600 bg-transparent hover:bg-rose-50 px-3',
        default => 'bg-slate-400 text-white hover:bg-slate-500 focus:ring-slate-400',
    };
@endphp

<button type="{{ $type }}" class="{{ $baseClasses }} {{ $variantClasses }} {{ $class }}">
    {{ $slot }}
</button>