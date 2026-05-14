{{--
    Ecosystem Section
    Place at: resources/views/components/sections/ecosystem.blade.php
    Include:  @include('components.sections.ecosystem', [...])

    Layout: 1440px wide, 658px hug height, #F1F1EF bg
    Padding: 80px top/bottom, 48px left/right
--}}

<section id="ecosystem" class="w-full bg-[#F1F1EF] eco-section" aria-labelledby="eco-heading">
    <div class="max-w-[1344px] mx-auto" style="padding: 80px 0;">

        <div class="flex flex-col lg:flex-row lg:items-center gap-16">

            {{-- ══ LEFT COLUMN ══ --}}
            <div class="flex flex-col gap-8 lg:w-[42%] shrink-0">

                {{-- Eyebrow --}}
                <p class="font-body text-[11px] font-semibold tracking-[0.22em] uppercase text-[#C0392B] m-0">
                    {{ $eyebrow ?? 'VERTICAL INTEGRATION' }}
                </p>

                {{-- Heading --}}
                <div class="flex flex-col gap-0">
                    <h2 id="eco-heading" class="eco-heading font leading-[1.05] tracking-tight m-0">
                        <span class="font-body text-[#1a1a1a] not-italic block">{{ $headingNormal ?? 'The Himalayan' }}</span>
                        <em class="font-display text-[#C0392B] italic block">{{ $headingItalic ?? 'Ecosystem.' }}</em>
                    </h2>
                </div>

                {{-- Body --}}
                <p class="font-body text-[15px] leading-[1.75] text-[#3a3a3a] m-0 max-w-[400px]">
                    {{ $body ?? 'By owning the supply chain, we eliminate uncertainty. Our sister companies provide the raw strength and engineering precision that fuel our global ambitions.' }}
                </p>

                {{-- Company tabs --}}
                <div class="flex flex-wrap gap-3">
                    @foreach($companies ?? [['number' => '01', 'label' => 'HIMALAYAN BRICKS LTD.', 'active' => true], ['number' => '02', 'label' => 'HBE ENGINEERING']] as $i => $company)
                    <button
                        class="eco-tab font-body text-[11px] font-semibold tracking-[0.14em] uppercase
                               px-6 py-[14px] rounded-full border bg-transparent cursor-pointer
                               transition-all duration-300
                               {{ ($company['active'] ?? false)
                                   ? 'border-[#1a1a1a] text-[#1a1a1a] eco-tab--active'
                                   : 'border-[#1a1a1a]/30 text-[#888] hover:border-[#1a1a1a] hover:text-[#1a1a1a]' }}"
                        data-index="{{ $i }}"
                    >
                        <span class="text-[#C0392B] mr-2">{{ $company['number'] ?? '0'.($i+1) }}</span>
                        {{ $company['label'] }}
                    </button>
                    @endforeach
                </div>

            </div>

            {{-- ══ RIGHT COLUMN — Company card ══ --}}
            <div class="flex-1 min-w-0">
                <div class="eco-card relative rounded-[20px] overflow-hidden" style="height: 440px;">

                    {{-- Background image --}}
                    <img
                        id="eco-card-img"
                        src="{{ $companies[0]['image'] ?? asset('images/ecosystem/bricks.jpg') }}"
                        alt="{{ $companies[0]['title'] ?? 'Himalayan Bricks' }}"
                        class="absolute inset-0 w-full h-full object-cover object-center eco-card__img"
                        loading="lazy"
                    />

                    {{-- Dark overlay --}}
                    <div class="absolute inset-0 bg-black/55"></div>

                    {{-- Logo top-left --}}
                    <div class="absolute top-8 left-8">
                        <div id="eco-card-logo" class="flex items-center gap-3">
                            {{-- Icon mark --}}
                            <div class="eco-logo-mark flex-shrink-0">
                                <svg width="44" height="36" viewBox="0 0 44 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="0" y="0" width="18" height="18" rx="2" fill="#C0392B"/>
                                    <rect x="0" y="20" width="18" height="16" rx="2" fill="white"/>
                                    <rect x="20" y="0" width="24" height="8" rx="2" fill="white"/>
                                    <rect x="20" y="14" width="24" height="8" rx="2" fill="white"/>
                                    <rect x="20" y="28" width="24" height="8" rx="2" fill="white"/>
                                </svg>
                            </div>
                            <div class="flex flex-col leading-tight">
                                <span class="font-display font text-[22px] text-[#C0392B] leading-none">{{ $companies[0]['logoLine1'] ?? 'Himalayan' }}</span>
                                <span class="font-display font text-[22px] text-white leading-none">{{ $companies[0]['logoLine2'] ?? 'Brick' }}</span>
                            </div>
                        </div>
                    </div>

                    {{-- Bottom info --}}
                    <div class="absolute bottom-0 left-0 right-0 p-8">
                        <h3 id="eco-card-title" class="font-display text-white font text-[28px] leading-[1.1] m-0 mb-3">
                            {{ $companies[0]['title'] ?? 'Himalayan Bricks' }}
                        </h3>
                        <p id="eco-card-desc" class="font-body text-[14px] leading-[1.65] text-white/70 m-0 max-w-[420px]">
                            {{ $companies[0]['description'] ?? 'The region\'s first fully automated brick plant, producing 100,000 units daily with Swiss engineering precision.' }}
                        </p>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<style>
    .eco-heading { font-size: clamp(38px, 4.8vw, 68px); }
    .eco-card__img { transition: transform 0.65s cubic-bezier(0.25, 0.46, 0.45, 0.94); }
    .eco-card:hover .eco-card__img { transform: scale(1.03); }
    .eco-tab--active { background: transparent; }

    @media (max-width: 1024px) {
        #ecosystem { padding-left: 2rem; padding-right: 2rem; }
        .eco-card  { height: 360px !important; }
    }
    @media (max-width: 768px) {
        #ecosystem { padding-left: 1.25rem; padding-right: 1.25rem; }
        .eco-card  { height: 300px !important; }
    }
</style>

@php
    $ecoCompanies = $companies ?? [
        [
            'number'      => '01',
            'label'       => 'HIMALAYAN BRICKS LTD.',
            'active'      => true,
            'title'       => 'Himalayan Bricks',
            'description' => "The region's first fully automated brick plant, producing 100,000 units daily with Swiss engineering precision.",
            'image'       => asset('images/ecosystem/bricks.jpg'),
            'logoLine1'   => 'Himalayan',
            'logoLine2'   => 'Brick',
        ],
        [
            'number'      => '02',
            'label'       => 'HBE ENGINEERING',
            'title'       => 'HBE Engineering',
            'description' => 'Providing structural and MEP engineering excellence across every HBE project and beyond.',
            'image'       => asset('images/ecosystem/engineering.jpg'),
            'logoLine1'   => 'HBE',
            'logoLine2'   => 'Engineering',
        ],
    ];
@endphp

<script>
document.addEventListener('DOMContentLoaded', function () {
    const companies = @json($ecoCompanies);

    const tabs   = document.querySelectorAll('.eco-tab');
    const img    = document.getElementById('eco-card-img');
    const title  = document.getElementById('eco-card-title');
    const desc   = document.getElementById('eco-card-desc');

    tabs.forEach(tab => {
        tab.addEventListener('click', function () {
            const idx = parseInt(this.dataset.index);
            const co  = companies[idx];
            if (!co) return;

            // Update active tab styles
            tabs.forEach(t => {
                t.classList.remove('eco-tab--active', 'border-[#1a1a1a]', 'text-[#1a1a1a]');
                t.classList.add('border-[#1a1a1a]/30', 'text-[#888]');
            });
            this.classList.add('eco-tab--active', 'border-[#1a1a1a]', 'text-[#1a1a1a]');
            this.classList.remove('border-[#1a1a1a]/30', 'text-[#888]');

            // Fade-swap card content
            img.style.opacity   = '0';
            title.style.opacity = '0';
            desc.style.opacity  = '0';

            setTimeout(() => {
                if (co.image) img.src = co.image;
                if (co.title) title.textContent = co.title;
                if (co.description) desc.textContent = co.description;

                img.style.opacity   = '1';
                title.style.opacity = '1';
                desc.style.opacity  = '1';
            }, 280);
        });
    });

    // Smooth opacity transition on card elements
    [img, title, desc].forEach(el => {
        el.style.transition = 'opacity 0.28s ease';
    });
});
</script>