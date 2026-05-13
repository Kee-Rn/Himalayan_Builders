{{--
    About Section — Section 04 (Asymmetric & Textural)
    Place at: resources/views/components/sections/about.blade.php
    Include:  @include('components.sections.about', [...])
--}}

<section id="about" class="w-full bg-[#EBEBEB] px-12 py-20" aria-labelledby="about-heading">

    <div class="max-w-[1344px] mx-auto flex flex-col lg:flex-row lg:items-start gap-16">

        {{-- ══ LEFT COLUMN ══ --}}
        <div class="flex flex-col gap-8 lg:w-[43%] shrink-0">

            {{-- Eyebrow --}}
            <p class="font-body text-[11px] font-semibold tracking-[0.22em] uppercase text-[#C0392B] m-0">
                {{ $tagline ?? 'THE LEGACY' }}
            </p>

            {{-- Heading — uses .about-heading-fluid defined in home.blade.php <style> --}}
            <h2 id="about-heading" class="about-heading-fluid font-display font-bold leading-[1.0] tracking-tight m-0">
                <span class="text-[#1a1a1a] not-italic">{{ $headingNormal ?? 'Pioneering' }} </span><em class="text-[#C0392B] italic">{{ $headingItalic ?? 'Design,' }}</em><br>
                <em class="text-[#C0392B] italic">{{ $headingItalic2 ?? 'Build' }}</em><span class="text-[#1a1a1a] not-italic"> {{ $headingEnd ?? 'Excellence in Nepal.' }}</span>
            </h2>

            {{-- Body --}}
            <div class="flex flex-col gap-4">
                <p class="font-body text-[15px] leading-[1.75] text-[#3a3a3a] m-0 max-w-[540px]">
                    {{ $body1 ?? 'Himalayan Builders & Engineers (HBE) stands as a titan in the civil engineering landscape, redefining the skyline of Nepal through innovation and uncompromising quality.' }}
                </p>
                <p class="font-body text-[15px] leading-[1.75] text-[#3a3a3a] m-0 max-w-[540px]">
                    {{ $body2 ?? 'As the pioneers of the design-build model in the region, we provide a seamless, integrated approach that bridges the gap between architectural vision and structural reality.' }}
                </p>
            </div>

            {{-- CTA --}}
            <a
                href="{{ $ctaUrl ?? '#' }}"
                class="font-body self-start inline-flex items-center
                       px-8 py-[17px] rounded-full
                       border border-[#1a1a1a]/40
                       text-[12px] font-semibold tracking-[0.13em] uppercase
                       text-[#1a1a1a] no-underline bg-transparent
                       transition-all duration-300
                       hover:bg-[#1a1a1a] hover:text-white hover:border-[#1a1a1a]"
            >
                {{ $ctaLabel ?? 'OUR FULL STORY' }}
            </a>

        </div>

        {{-- ══ RIGHT COLUMN ══ --}}
        <div class="flex-1 flex flex-col gap-4 min-w-0">

            {{-- Building image — fixed 380px tall --}}
            <div class="w-full rounded-[20px] overflow-hidden about-img-wrap" style="height:380px;">
                <img
                    src="{{ asset('photos/1.png') }}"
                    alt="{{ $imageAlt ?? 'Himalayan Builders & Engineers building' }}"
                    class="w-full h-full object-cover object-center block about-img"
                    loading="lazy"
                />
            </div>

            {{-- Stat cards --}}
            <div class="grid grid-cols-2 gap-4">

                {{-- White card --}}
                <div class="rounded-[20px] bg-white/60 backdrop-blur-sm border border-white/80
                            flex flex-col justify-end gap-[10px] p-7"
                     style="min-height:170px;">
                    <span class="font-display text-[48px] font-bold leading-none tracking-tight text-[#C0392B]">
                        {{ $badgeNumber ?? '01' }}
                    </span>
                    <span class="font-body text-[10px] font-semibold tracking-[0.18em] uppercase text-[#888]">
                        {{ $badgeLabel ?? 'CERTIFIED SAFETY STANDARDS' }}
                    </span>
                </div>

                {{-- Red card --}}
                <div class="rounded-[20px] bg-[#C0392B]
                            flex flex-col justify-end gap-[10px] p-7"
                     style="min-height:170px;">
                    <span class="font-display text-[48px] font-bold leading-none tracking-tight text-white">
                        {{ $ratingLabel ?? 'A-Class' }}
                    </span>
                    <span class="font-body text-[10px] font-semibold tracking-[0.18em] uppercase text-white/70">
                        {{ $ratingSub ?? 'GOVERNMENT RATING' }}
                    </span>
                </div>

            </div>
        </div>

    </div>
</section>

<style>
    .about-img        { transition: transform 0.6s ease; }
    .about-img-wrap:hover .about-img { transform: scale(1.03); }
    @media (max-width:1024px) { #about { padding-left:2rem; padding-right:2rem; } }
    @media (max-width:768px)  { #about { padding-left:1.25rem; padding-right:1.25rem; } }
</style>