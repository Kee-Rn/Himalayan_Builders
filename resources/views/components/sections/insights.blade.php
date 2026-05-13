{{--
    Insights Section — Knowledge Base / Articles
    Place at: resources/views/components/sections/insights.blade.php
    Include:  @include('components.sections.insights', [...])

    Layout:  1440px wide, white bg, padding 80px top/bottom
    Colors:  #1A1A1A headings, #8A8A8A meta, #D94035 category labels
    Fonts:   font-display (Playfair Display), font-body (Barlow)
    Matches: featured-works.blade.php structure & ecosystem.blade.php eyebrow pattern
--}}

@php
$eyebrow       ??= 'KNOWLEDGE BASE';
$headingItalic ??= 'Insights.';
$allArticlesUrl ??= '/insights';

$articles ??= [
    [
        'category' => 'ENGINEERING',
        'date'     => 'MAR 2026',
        'title'    => 'The Future of Earthquake-Resistant Design in High-Altitude Terrains.',
        'excerpt'  => 'Exploring the structural innovations deployed in our recent institutional projects across the Himalayas.',
        'image'    => asset('images/insights/earthquake-resistant.jpg'),
        'url'      => '#article-1',
    ],
    [
        'category' => 'HEALTHCARE',
        'date'     => 'FEB 2026',
        'title'    => 'Integrated Design-Build: Accelerating Healthcare Infrastructure.',
        'excerpt'  => 'How our unified approach reduced the construction timeline for Kathmandu International Hospital by 15%.',
        'image'    => asset('images/insights/healthcare-build.jpg'),
        'url'      => '#article-2',
    ],
    [
        'category' => 'SUSTAINABILITY',
        'date'     => 'JAN 2026',
        'title'    => 'Sustainable Materials: The Role of Automated Brick Manufacturing.',
        'excerpt'  => 'Analyzing the carbon footprint reduction achieved through Himalayan Bricks\' eco-friendly production line.',
        'image'    => asset('images/insights/brick-manufacturing.jpg'),
        'url'      => '#article-3',
    ],
];
@endphp

<section id="insights" class="w-full bg-white px-12 insights-section" style="padding-top: 80px; padding-bottom: 80px;" aria-labelledby="insights-heading">
    <div class="max-w-[1344px] mx-auto">

        {{-- ══ TOP BAR ══ --}}
        <div class="flex items-end justify-between mb-14">

            <div class="flex flex-col gap-4">
                {{-- Eyebrow --}}
                <p class="font-body text-[11px] font-semibold tracking-[0.22em] uppercase text-[#C0392B] m-0">
                    {{ $eyebrow }}
                </p>

                {{-- Heading — italic display, dark, left-aligned --}}
                <h2 id="insights-heading" class="insights-heading font-display font-bold italic leading-[1.0] tracking-tight text-[#1A1A1A] m-0">
                    {{ $headingItalic }}
                </h2>
            </div>

            {{-- All Articles CTA — top right --}}
            <a
                href="{{ $allArticlesUrl }}"
                class="font-body text-[11px] font-semibold tracking-[0.16em] uppercase
                       text-[#1A1A1A] no-underline inline-flex items-center gap-2
                       pb-1 border-b border-[#1A1A1A]/30
                       hover:border-[#1A1A1A] transition-colors duration-200 shrink-0 mb-2"
            >
                ALL ARTICLES
                <svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M1 5h12M8.5 1.5L12.5 5l-4 3.5" stroke="#1A1A1A" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>

        </div>

        {{-- ══ ARTICLE GRID — 3 equal columns ══ --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            @foreach($articles as $article)
            <a
                href="{{ $article['url'] ?? '#' }}"
                class="insights-card group flex flex-col no-underline"
                aria-label="{{ $article['title'] }}"
            >
                {{-- Thumbnail --}}
                <div class="w-full rounded-[16px] overflow-hidden mb-5 insights-card__img-wrap" style="height: 240px;">
                    <img
                        src="{{ $article['image'] ?? asset('images/insights/placeholder.jpg') }}"
                        alt="{{ $article['title'] }}"
                        class="insights-card__img w-full h-full object-cover object-center block"
                        loading="lazy"
                        onerror="this.src='https://placehold.co/600x400/e8e8e8/888?text=HBE+Insights';"
                    />
                </div>

                {{-- Meta — category · date --}}
                <div class="flex items-center gap-2 mb-3">
                    <span class="font-body text-[10px] font-semibold tracking-[0.16em] uppercase text-[#D94035]">
                        {{ $article['category'] ?? 'GENERAL' }}
                    </span>
                    <span class="w-1 h-1 rounded-full bg-[#8A8A8A] inline-block"></span>
                    <span class="font-body text-[10px] font-semibold tracking-[0.14em] uppercase text-[#8A8A8A]">
                        {{ $article['date'] ?? '' }}
                    </span>
                </div>

                {{-- Title --}}
                <h3 class="font-display font-bold text-[22px] leading-[1.2] tracking-tight text-[#1A1A1A] m-0 mb-3
                           group-hover:text-[#C0392B] transition-colors duration-250">
                    {{ $article['title'] }}
                </h3>

                {{-- Excerpt --}}
                <p class="font-body text-[14px] leading-[1.7] text-[#8A8A8A] m-0">
                    {{ $article['excerpt'] ?? '' }}
                </p>

            </a>
            @endforeach

        </div>
        {{-- END Article Grid --}}

    </div>
</section>

<style>
    /* Fluid heading scale — matches fw-heading / eco-heading pattern */
    .insights-heading { font-size: clamp(48px, 6vw, 88px); }

    /* Card image zoom on hover */
    .insights-card__img {
        transition: transform 0.65s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }
    .insights-card:hover .insights-card__img {
        transform: scale(1.04);
    }

    /* Responsive */
    @media (max-width: 1024px) {
        #insights { padding-left: 2rem; padding-right: 2rem; }
    }
    @media (max-width: 768px) {
        #insights { padding-left: 1.25rem; padding-right: 1.25rem; }
        .insights-heading { font-size: clamp(40px, 10vw, 64px); }
        .insights-card__img-wrap { height: 200px !important; }
    }
</style>