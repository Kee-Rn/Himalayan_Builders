{{--
    Footer
    Place at: resources/views/components/sections/footer.blade.php
    Include:  @include('components.sections.footer', [...])

    Layout:  1440px wide, #F5F4F3 bg, 4-column grid
    Fonts:   font-display (Playfair Display), font-body (Barlow)
    Colors:  #1A1A1A text, #8A8A8A muted, #D94035 top accent bar
--}}

@php
$logoSrc     ??= asset('images/logo.png');
$logoAlt     ??= 'Himalayan Builders & Engineers';
$logoUrl     ??= '/';
$tagline     ??= 'Himalayan Builders & Engineers is an A-Class global firm delivering excellence in design-build contracting across borders.';
$copyrightYear ??= date('Y');

$socials ??= [
    [
        'label' => 'Facebook',
        'url'   => '#',
        'icon'  => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>',
    ],
    [
        'label' => 'LinkedIn',
        'url'   => '#',
        'icon'  => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>',
    ],
    [
        'label' => 'Instagram',
        'url'   => '#',
        'icon'  => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>',
    ],
];

$colCompany ??= [
    'heading' => 'COMPANY',
    'links'   => [
        ['label' => 'Our Story',  'url' => '#'],
        ['label' => 'Philosophy', 'url' => '#'],
        ['label' => 'Team',       'url' => '#'],
        ['label' => 'Safety',     'url' => '#'],
    ],
];

$colServices ??= [
    'heading' => 'SERVICES',
    'links'   => [
        ['label' => 'Design-Build',      'url' => '#'],
        ['label' => 'Civil Engineering', 'url' => '#'],
        ['label' => 'Hospitality',       'url' => '#'],
        ['label' => 'Infrastructure',    'url' => '#'],
    ],
];

$contact ??= [
    'heading' => 'GET IN TOUCH',
    'address' => 'Bhakti Thapa Sadak-45 KMC – 11, Babarmahal, Kathmandu, Nepal',
    'phone'   => '+977 15705009',
    'email'   => 'admin@himalayanbuilders.com',
];

$legalLinks ??= [
    ['label' => 'PRIVACY',  'url' => '#'],
    ['label' => 'TERMS',    'url' => '#'],
    ['label' => 'SITEMAP',  'url' => '#'],
];
@endphp

<footer id="footer" class="w-full bg-[#F5F4F3]" aria-label="Site footer">

    {{-- Red accent bar at top --}}
    <div class="w-full h-[3px] bg-[#D94035]"></div>

    {{-- Main footer body --}}
    <div class="max-w-[1344px] mx-auto px-12 pt-16 pb-10">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-[1.8fr_1fr_1fr_1.4fr] gap-12 mb-16">

            {{-- ── Col 1: Brand ── --}}
            <div class="flex flex-col gap-6">

                {{-- Logo --}}
                <a href="{{ $logoUrl }}" class="inline-block w-fit" aria-label="{{ $logoAlt }}">
                    <img
                        src="{{ $logoSrc }}"
                        alt="{{ $logoAlt }}"
                        class="h-10 w-auto object-contain"
                    />
                </a>

                {{-- Tagline --}}
                <p class="font-body text-[14px] leading-[1.75] text-[#555] m-0 max-w-[280px]">
                    {{ $tagline }}
                </p>

                {{-- Social icons --}}
                <div class="flex items-center gap-3 mt-1">
                    @foreach($socials as $social)
                    <a
                        href="{{ $social['url'] }}"
                        class="footer-social w-9 h-9 rounded-full border border-[#1A1A1A]/15
                               flex items-center justify-center
                               text-[#8A8A8A] hover:text-[#1A1A1A] hover:border-[#1A1A1A]/40
                               transition-all duration-200 no-underline"
                        aria-label="{{ $social['label'] }}"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        {!! $social['icon'] !!}
                    </a>
                    @endforeach
                </div>

            </div>

            {{-- ── Col 2: Company links ── --}}
            <div class="flex flex-col gap-5">
                <p class="font-body text-[10px] font-semibold tracking-[0.2em] uppercase text-[#8A8A8A] m-0">
                    {{ $colCompany['heading'] }}
                </p>
                <nav class="flex flex-col gap-[14px]" aria-label="Company">
                    @foreach($colCompany['links'] as $link)
                    <a
                        href="{{ $link['url'] }}"
                        class="font-body text-[14px] font-medium text-[#1A1A1A] no-underline
                               hover:text-[#D94035] transition-colors duration-200 w-fit"
                    >
                        {{ $link['label'] }}
                    </a>
                    @endforeach
                </nav>
            </div>

            {{-- ── Col 3: Services links ── --}}
            <div class="flex flex-col gap-5">
                <p class="font-body text-[10px] font-semibold tracking-[0.2em] uppercase text-[#8A8A8A] m-0">
                    {{ $colServices['heading'] }}
                </p>
                <nav class="flex flex-col gap-[14px]" aria-label="Services">
                    @foreach($colServices['links'] as $link)
                    <a
                        href="{{ $link['url'] }}"
                        class="font-body text-[14px] font-medium text-[#1A1A1A] no-underline
                               hover:text-[#D94035] transition-colors duration-200 w-fit"
                    >
                        {{ $link['label'] }}
                    </a>
                    @endforeach
                </nav>
            </div>

            {{-- ── Col 4: Contact ── --}}
            <div class="flex flex-col gap-5">
                <p class="font-body text-[10px] font-semibold tracking-[0.2em] uppercase text-[#8A8A8A] m-0">
                    {{ $contact['heading'] }}
                </p>
                <div class="flex flex-col gap-4">
                    <p class="font-body text-[14px] leading-[1.7] text-[#1A1A1A] m-0">
                        {{ $contact['address'] }}
                    </p>
                    <a
                        href="tel:{{ preg_replace('/\s+/', '', $contact['phone']) }}"
                        class="font-body text-[14px] text-[#1A1A1A] no-underline
                               hover:text-[#D94035] transition-colors duration-200 w-fit"
                    >
                        {{ $contact['phone'] }}
                    </a>
                    <a
                        href="mailto:{{ $contact['email'] }}"
                        class="font-body text-[14px] text-[#1A1A1A] no-underline
                               hover:text-[#D94035] transition-colors duration-200 w-fit"
                    >
                        {{ $contact['email'] }}
                    </a>
                </div>
            </div>

        </div>
        {{-- END main grid --}}

        {{-- ── Bottom bar ── --}}
        <div class="border-t border-[#1A1A1A]/10 pt-7 flex flex-col sm:flex-row items-center justify-between gap-4">

            <p class="font-body text-[10px] font-semibold tracking-[0.18em] uppercase text-[#8A8A8A] m-0">
                © {{ $copyrightYear }} HIMALAYAN BUILDERS. ARCHITECTURAL EXCELLENCE.
            </p>

            <nav class="flex items-center gap-6" aria-label="Legal">
                @foreach($legalLinks as $link)
                <a
                    href="{{ $link['url'] }}"
                    class="font-body text-[10px] font-semibold tracking-[0.16em] uppercase
                           text-[#8A8A8A] no-underline hover:text-[#1A1A1A] transition-colors duration-200"
                >
                    {{ $link['label'] }}
                </a>
                @endforeach
            </nav>

        </div>

    </div>
</footer>

<style>
    @media (max-width: 1024px) {
        #footer .max-w-\[1344px\] { padding-left: 2rem; padding-right: 2rem; }
    }
    @media (max-width: 768px) {
        #footer .max-w-\[1344px\] { padding-left: 1.25rem; padding-right: 1.25rem; }
    }
</style>