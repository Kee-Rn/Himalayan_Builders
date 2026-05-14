{{--
    Institutional Trust Section
    Place at: resources/views/components/sections/institutional-trust.blade.php
    Include:  @include('components.sections.institutional-trust', [...])

    Layout: 1344px wide, #F5F4F3 bg, padding 80px top/bottom
    Matches: ecosystem.blade.php patterns (font-display: Instrument Serif, font-body: Instrument Sans, #C0392B, #1a1a1a)
--}}

@php
$eyebrow       ??= 'GLOBAL AUTHORITY';
$headingNormal ??= 'Trusted by';
$headingItalic ??= 'World Institutions.';

$clients ??= [
    [
        'name'  => 'US Army Corps of Engineers',
        'image' => asset('images/logos/usace.png'),
    ],
    [
        'name'  => 'U.S. Department of State — Bureau of Overseas Buildings Operations',
        'image' => asset('images/logos/us-state-dept.png'),
    ],
    [
        'name'  => 'NAVFAC',
        'image' => asset('images/logos/navfac.png'),
    ],
    [
        'name'  => 'TATA',
        'image' => asset('images/logos/tata.png'),
    ],
    [
        'name'  => 'The Soaltee Kathmandu',
        'image' => asset('images/logos/soaltee.png'),
    ],
    [
        'name'  => 'Sipradi',
        'image' => asset('images/logos/sipradi.png'),
    ],
];
@endphp

<section id="institutional-trust" class="w-full bg-[#F5F4F3] trust-section" aria-labelledby="trust-heading">
    <div class="max-w-[1344px] mx-auto" style="padding: 80px 0;">

        {{-- Eyebrow --}}
        <p class="font-body text-[11px] font-semibold tracking-[0.22em] uppercase text-[#999] text-center m-0 mb-4">
            {{ $eyebrow }}
        </p>

        {{-- Heading --}}
        <h2 id="trust-heading" class="trust-heading fontleading-[1.05] tracking-tight text-center m-0 mb-14">
            <span class="font-body text-[#1a1a1a] not-italic">{{ $headingNormal }} </span><em class="font-display text-[#C0392B] italic">{{ $headingItalic }}</em>
        </h2>

        {{-- Logo Grid --}}
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4 px-4 lg:px-0">
            @foreach ($clients as $client)
            <div class="trust-card group flex items-center justify-center bg-white border border-[#e8e8e8] rounded-xl p-8 min-h-[190px] transition-shadow duration-300 hover:shadow-md">
                <img
                    src="{{ $client['image'] }}"
                    alt="{{ $client['name'] }}"
                    class="trust-logo h-28 w-auto max-w-[80%] object-contain invert grayscale group-hover:grayscale-0 transition-all duration-300"
                    loading="lazy"
                    onerror="this.style.display='none';this.nextElementSibling.style.display='flex';"
                />
                {{-- Fallback text if logo image is missing --}}
                <span
                    class="font-body text-[11px] font-semibold text-[#555] leading-snug text-center"
                    style="display:none;"
                >
                    {{ $client['name'] }}
                </span>
            </div>
            @endforeach
        </div>

    </div>
</section>

<style>
    .trust-heading { font-size: clamp(32px, 4vw, 56px); }

    @media (max-width: 1024px) {
        #institutional-trust > div { padding-left: 2rem; padding-right: 2rem; }
    }
    @media (max-width: 768px) {
        #institutional-trust > div { padding-left: 1.25rem; padding-right: 1.25rem; }
        .trust-heading { font-size: clamp(28px, 6vw, 40px); }
    }
</style>