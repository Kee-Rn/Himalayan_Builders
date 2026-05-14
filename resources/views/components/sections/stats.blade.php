{{--
    Stats Bar — floating between Hero and About
    Place at: resources/views/components/sections/stats.blade.php

    Variables:
        $stats — array of ['number' => '400+', 'label' => 'GLOBAL PROJECTS DELIVERED']
--}}

@php
$stats ??= [
    ['number' => '400+', 'label' => 'GLOBAL PROJECTS DELIVERED'],
    ['number' => '30+',  'label' => 'YEARS OF ENGINEERING MASTERY'],
    ['number' => 'Top 5','label' => 'NATIONAL RANK (A-CLASS)'],
];
@endphp

{{-- Floating wrapper — negative margins pull it over hero bottom & about top --}}
<div class="relative z-20 w-full px-12" style="margin-top: -77px; margin-bottom: -77px;">

    <div
        class="max-w-[1344px] mx-auto
               bg-white rounded-2xl
               border border-white/5
               stats-bar-shadow
               flex flex-row items-center"
        style="min-height: 154.5px;"
    >
        @foreach ($stats as $i => $stat)

            {{-- Divider between items --}}
            @if ($i > 0)
                <div class="self-stretch w-px bg-[#e5e5e5] my-8"></div>
            @endif

            <div class="flex-1 flex flex-col justify-center gap-2 px-12 py-8">
                <span class="font-display font text-[#C0392B] leading-none stats-number-fluid">
                    {{ $stat['number'] }}
                </span>
                <span class="font-body text-[11px] font-semibold tracking-[0.18em] uppercase text-[#999]">
                    {{ $stat['label'] }}
                </span>
            </div>

        @endforeach
    </div>

</div>

<style>
    .stats-bar-shadow {
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }
    .stats-number-fluid {
        font-size: clamp(28px, 3.5vw, 48px);
    }
    @media (max-width: 1024px) {
        .stats-bar-shadow { margin-left: 2rem; margin-right: 2rem; }
    }
    @media (max-width: 768px) {
        .stats-number-fluid { font-size: 28px; }
    }
    @media (max-width: 640px) {
        /* Stack vertically on mobile */
        .stats-bar-shadow .flex-row { flex-direction: column; }
        .stats-bar-shadow .self-stretch.w-px { width: 100%; height: 1px; margin: 0; }
    }
</style>