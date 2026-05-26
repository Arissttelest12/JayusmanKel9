@props([
    'headers' => [],
    'class' => 'min-w-full'
])

<div class="overflow-x-auto">
    <table class="min-w-full border-collapse {{ $class }}">
        @if(count($headers) > 0)
        <thead>
            <tr class="bg-slate-50 dark:bg-slate-700/50 border-b border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 text-sm uppercase tracking-wider">
                @foreach($headers as $header)
                <th class="px-6 py-4 text-left font-semibold first:rounded-tl-xl last:rounded-tr-xl">{{ $header }}</th>
                @endforeach
            </tr>
        </thead>
        @endif
        <tbody class="divide-y divide-slate-100 dark:divide-slate-700/50 text-slate-700 dark:text-slate-300">
            {{ $slot }}
        </tbody>
    </table>
</div>