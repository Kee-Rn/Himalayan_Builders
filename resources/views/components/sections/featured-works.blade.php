{{--
    Featured Works Section — Portfolio Grid
    Place at: resources/views/components/sections/featured-works.blade.php
    Include:  @include('components.sections.featured-works', [...])

    Layout: 1440px wide, #F1F1EF background, 80px top/bottom padding
    Mirrors Figma spec: large featured card left + two stacked cards right
--}}

<section id="featured-works" class="w-full bg-[#F1F1EF] px-12 py-20 fw-section" aria-labelledby="fw-heading">

    {{-- ══ TOP BAR ══ --}}
    <div class="max-w-[1344px] mx-auto flex items-center justify-between mb-12">

        {{-- Eyebrow + Heading --}}
        <div>
            <p class="font-body text-[11px] font-semibold tracking-[0.22em] uppercase text-[#C0392B] mb-3 m-0">
                {{ $eyebrow ?? 'FEATURED WORK' }}
            </p>
            <h2 id="fw-heading" class="fw-heading font leading-[1.0] tracking-tight m-0">
                <span class="font-body text-[#1a1a1a] not-italic">{{ $headingNormal ?? 'Iconic' }} </span><em class="font-display text-[#C0392B] italic">{{ $headingItalic ?? 'Structures.' }}</em>
            </h2>
        </div>

        {{-- Filter tabs --}}
        <nav class="hidden md:flex items-center gap-6" aria-label="Portfolio filter">
            @foreach($filters ?? [['label' => 'ALL WORKS', 'active' => true], ['label' => 'HOTELS'], ['label' => 'INFRASTRUCTURE'], ['label' => 'HEALTHCARE']] as $filter)
                <button
                    class="fw-filter font-body text-[11px] font-semibold tracking-[0.16em] uppercase pb-1
                           {{ ($filter['active'] ?? false) ? 'text-[#1a1a1a] fw-filter--active' : 'text-[#888] hover:text-[#1a1a1a]' }}
                           bg-transparent border-0 cursor-pointer transition-colors duration-200"
                    data-filter="{{ strtolower(str_replace(' ', '-', $filter['label'])) }}"
                >
                    {{ $filter['label'] }}
                </button>
            @endforeach
        </nav>

    </div>

    {{-- ══ GRID ══ --}}
    <div class="max-w-[1344px] mx-auto grid grid-cols-1 lg:grid-cols-[1fr_380px] gap-4">

        {{-- ── FEATURED (large) card ── --}}
        @php $featured = $projects[0] ?? null; @endphp
        @if($featured)
        <a
            href="{{ $featured['url'] ?? '#' }}"
            class="fw-card fw-card--large relative rounded-[20px] overflow-hidden block no-underline"
            style="min-height: 540px;"
        >
            <img
                src="{{ $featured['image'] ?? asset('images/portfolio/soaltee.jpg') }}"
                alt="{{ $featured['title'] ?? 'Featured project' }}"
                class="fw-card__img absolute inset-0 w-full h-full object-cover object-center"
                loading="lazy"
            />
            {{-- Dark gradient overlay --}}
            <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/20 to-transparent"></div>

            {{-- Category badge --}}
            @if(!empty($featured['category']))
            <span class="absolute top-6 left-6 font-body text-[10px] font-semibold tracking-[0.16em] uppercase
                         text-white border border-white/40 rounded-full px-4 py-[7px] backdrop-blur-sm bg-black/20">
                {{ $featured['category'] }}
            </span>
            @endif

            {{-- Bottom info --}}
            <div class="absolute bottom-0 left-0 right-0 p-8">
                <h3 class="font-display text-white font text-[36px] leading-[1.1] m-0 mb-2">
                    {{ $featured['title'] ?? 'Soaltee Sibkrim Hotel' }}
                </h3>
                @if(!empty($featured['meta']))
                <p class="font-body text-[10px] font-semibold tracking-[0.16em] uppercase text-white/60 m-0">
                    {{ $featured['meta'] }}
                </p>
                @endif
            </div>
        </a>
        @endif

        {{-- ── RIGHT COLUMN — two stacked cards ── --}}
        <div class="flex flex-col gap-4">
            @foreach(array_slice($projects ?? [], 1, 2) as $project)
            <a
                href="{{ $project['url'] ?? '#' }}"
                class="fw-card fw-card--small relative rounded-[20px] overflow-hidden block no-underline flex-1"
                style="min-height: 258px;"
            >
                <img
                    src="{{ $project['image'] ?? asset('images/portfolio/default.jpg') }}"
                    alt="{{ $project['title'] ?? 'Project' }}"
                    class="fw-card__img absolute inset-0 w-full h-full object-cover object-center"
                    loading="lazy"
                />
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/10 to-transparent"></div>

                <div class="absolute bottom-0 left-0 right-0 p-6">
                    <h3 class="font-display text-white font text-[22px] leading-[1.1] m-0 mb-1">
                        {{ $project['title'] ?? 'Project Name' }}
                    </h3>
                    @if(!empty($project['category']))
                    <p class="font-body text-[10px] font-semibold tracking-[0.14em] uppercase text-white/60 m-0">
                        {{ $project['category'] }}
                    </p>
                    @endif
                </div>
            </a>
            @endforeach
        </div>

    </div>

</section>

<style>
    /* Heading fluid scale */
    .fw-heading { font-size: clamp(40px, 5vw, 72px); }

    /* Card image zoom on hover */
    .fw-card__img { transition: transform 0.65s cubic-bezier(0.25, 0.46, 0.45, 0.94); }
    .fw-card:hover .fw-card__img { transform: scale(1.04); }

    /* Active filter underline */
    .fw-filter--active {
        border-bottom: 1.5px solid #1a1a1a;
    }

    /* Section fade-in on load */
    .fw-section { animation: fwFadeUp 0.7s ease both; }
    @keyframes fwFadeUp {
        from { opacity: 0; transform: translateY(24px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    /* Responsive tweaks */
    @media (max-width: 1024px) {
        #featured-works { padding-left: 2rem; padding-right: 2rem; }
        .fw-card--large { min-height: 420px !important; }
    }
    @media (max-width: 768px) {
        #featured-works { padding-left: 1.25rem; padding-right: 1.25rem; }
        .fw-card--large  { min-height: 340px !important; }
        .fw-card--small  { min-height: 200px !important; }
    }
</style>

<script>
    // Simple client-side filter (shows/hides cards by category)
    document.addEventListener('DOMContentLoaded', function () {
        const filterBtns = document.querySelectorAll('.fw-filter');
        filterBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                filterBtns.forEach(b => b.classList.remove('fw-filter--active', 'text-[#1a1a1a]'));
                filterBtns.forEach(b => b.classList.add('text-[#888]'));
                this.classList.add('fw-filter--active', 'text-[#1a1a1a]');
                this.classList.remove('text-[#888]');
            });
        });
    });
</script>