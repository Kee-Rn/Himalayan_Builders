{{--
    Hero Section
    Included via @include('sections.hero', [...]) from home.blade.php
    Variables: $videoSrc, $videoPoster, $heading, $headingItalic,
               $quoteText, $quoteLabel, $ctaPrimary, $ctaPrimaryUrl,
               $ctaSecondary, $ctaSecondaryUrl
--}}

<section
    class="relative w-full overflow-hidden flex items-end"
    style="min-height: 716.8px; padding-top: 97px;"
>
    {{-- Navbar overlaid on top of hero --}}
    @include('components.sections.navbar')

    {{-- Background gradient (no video file yet — swap in when ready) --}}
    <div class="absolute inset-0 z-0" aria-hidden="true">
        <video
            class="hero-video"
            autoplay loop muted playsinline
            poster="{{ $videoPoster ?? '' }}"
        >
            <source src="{{ $videoSrc ?? '' }}" type="video/mp4" />
        </video>

        <div
            class="absolute inset-0"
            style="background: linear-gradient(
                180deg,
                rgba(28,28,30,0.82)     0%,
                rgba(90,90,90,0.55)    45%,
                rgba(210,205,200,0.70) 75%,
                rgba(235,232,228,0.90) 100%
            );"
        ></div>
    </div>

    {{-- Content --}}
    <div
        class="relative z-10 w-full max-w-[1440px] mx-auto
               px-12 pb-24
               flex flex-col gap-10
               lg:flex-row lg:items-end lg:justify-between"
        style="padding-top: 260.3px;"
    >
        {{-- Left: Heading + CTAs --}}
        <div class="flex flex-col gap-10 shrink-0">

            <h1 class="font-display hero-heading-fluid leading-none tracking-tight m-0 flex flex-col">
                <span class="font-bold not-italic text-[#1a1a1a]">
                    {{ $heading ?? 'Building' }}
                </span>
                <em class="font-bold italic text-[#C0392B] -mt-1">
                    {{ $headingItalic ?? 'Excellence.' }}
                </em>
            </h1>

            <div class="flex flex-wrap items-center gap-4">

                <a
                    href="{{ $ctaPrimaryUrl ?? '#' }}"
                    class="btn-primary font-body
                           inline-flex items-center gap-3
                           px-8 py-[18px]
                           bg-[#1a1a1a] text-white
                           text-[13px] font-semibold tracking-[0.12em] uppercase
                           rounded-full no-underline whitespace-nowrap
                           transition-colors duration-200
                           hover:bg-[#C0392B]"
                >
                    {{ $ctaPrimary ?? 'EXPLORE PORTFOLIO' }}
                    <span class="btn-arrow" aria-hidden="true">→</span>
                </a>

                <a
                    href="{{ $ctaSecondaryUrl ?? '#' }}"
                    class="font-body
                           inline-flex items-center
                           px-8 py-[18px]
                           bg-transparent text-[#1a1a1a]
                           text-[13px] font-semibold tracking-[0.12em] uppercase
                           rounded-full border border-[#1a1a1a]/40
                           no-underline whitespace-nowrap
                           transition-all duration-200
                           hover:bg-[#1a1a1a] hover:text-white hover:border-[#1a1a1a]"
                >
                    {{ $ctaSecondary ?? 'OUR VISION' }}
                </a>

            </div>
        </div>

        {{-- Right: Quote card --}}
        <div class="w-full lg:max-w-[340px] shrink-0">
            <blockquote
                class="bg-white/95 rounded-xl m-0 p-7
                       flex flex-col gap-5
                       shadow-[0_8px_40px_rgba(0,0,0,0.12)]"
            >
                <p class="font-body text-sm leading-relaxed text-[#2c2c2c] m-0">
                    {{ $quoteText ?? '' }}
                </p>

                <footer class="flex items-center gap-3">
                    <span class="block w-8 h-[2px] bg-[#C0392B] shrink-0" aria-hidden="true"></span>
                    <span class="font-body text-[11px] font-semibold tracking-[0.14em] uppercase text-[#666]">
                        {{ $quoteLabel ?? 'A-CLASS CERTIFIED' }}
                    </span>
                </footer>
            </blockquote>
        </div>

    </div>
</section>