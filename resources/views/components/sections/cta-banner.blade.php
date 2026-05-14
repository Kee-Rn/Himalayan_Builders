{{--
    CTA Banner — "Let's Build the Impossible."
    Place at: resources/views/components/sections/cta-banner.blade.php
    Include:  @include('components.sections.cta-banner', [...])

    Layout:  1440px wide, #D94035 bg, padding 80px top/bottom, height 336px
    Fonts:   font-display (Instrument Serif), font-body (Instrument Sans)
    Matches: ecosystem/featured-works eyebrow + heading patterns
--}}

@php
$headingNormal ??= "Let's Build";
$headingItalic ??= 'the Impossible.';
$bgImage       ??= asset('images/cta-building.jpg');
$ctaPrimary    ??= ['label' => 'CONTACT OUR EXPERTS', 'url' => '#contact'];
$ctaSecondary  ??= ['label' => 'DOWNLOAD PORTFOLIO',  'url' => '#portfolio'];
@endphp

<section
    id="cta-banner"
    class="relative w-full overflow-hidden cta-banner-section"
    style="background-color: #D94035; min-height: 336px; padding: 80px 0;"
    aria-label="Call to action"
>
    {{-- Background building image with red overlay --}}
    <img
        src="{{ $bgImage }}"
        alt=""
        role="presentation"
        class="absolute inset-0 w-full h-full object-cover object-center cta-bg-img"
        loading="lazy"
        onerror="this.style.display='none';"
    />

    {{-- Red overlay on top of image --}}
    <div class="absolute inset-0 bg-[#D94035]/85"></div>

    {{-- Content --}}
    <div class="relative z-10 max-w-[1344px] mx-auto px-12 flex flex-col justify-center h-full gap-10" style="min-height: 176px;">

        {{-- Heading --}}
        <h2 class="cta-heading font leading-[1.0] tracking-tight text-white m-0">
            <span class="font-body not-italic block">{{ $headingNormal }}</span>
            <em class="font-display italic block">{{ $headingItalic }}</em>
        </h2>

        {{-- CTAs --}}
        <div class="flex flex-wrap items-center gap-4">

            {{-- Primary — white filled --}}
            <a
                href="{{ $ctaPrimary['url'] }}"
                class="font-body inline-flex items-center
                       px-10 py-[17px] rounded-full
                       bg-white text-[#1A1A1A]
                       text-[11px] font-semibold tracking-[0.16em] uppercase
                       no-underline transition-all duration-300
                       hover:bg-[#1A1A1A] hover:text-white"
            >
                {{ $ctaPrimary['label'] }}
            </a>

            {{-- Secondary — white outline --}}
            <a
                href="{{ $ctaSecondary['url'] }}"
                class="font-body inline-flex items-center
                       px-10 py-[17px] rounded-full
                       bg-transparent text-white
                       border border-white/60
                       text-[11px] font-semibold tracking-[0.16em] uppercase
                       no-underline transition-all duration-300
                       hover:bg-white hover:text-[#1A1A1A] hover:border-white"
            >
                {{ $ctaSecondary['label'] }}
            </a>

        </div>

    </div>
</section>

<style>
    .cta-heading { font-size: clamp(48px, 6.5vw, 96px); }

    .cta-bg-img {
        transition: transform 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }
    .cta-banner-section:hover .cta-bg-img {
        transform: scale(1.03);
    }

    @media (max-width: 1024px) {
        #cta-banner .max-w-\[1344px\] { padding-left: 2rem; padding-right: 2rem; }
    }
    @media (max-width: 768px) {
        #cta-banner .max-w-\[1344px\] { padding-left: 1.25rem; padding-right: 1.25rem; }
        .cta-heading { font-size: clamp(40px, 10vw, 64px); }
    }
</style>