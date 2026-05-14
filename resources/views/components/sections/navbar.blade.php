{{--
    Navbar Component
    Usage: @include('components.sections.navbar')
    Variables (all optional):
        $navLinks    – array of ['label' => '', 'url' => '']
        $quoteUrl    – URL for "Get a Quote" button
        $logoUrl     – href for logo
--}}

<style>
    .nav-link-item {
        position: relative;
        font-family: 'Instrument Sans', sans-serif;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: rgba(255,255,255,0.75);
        text-decoration: none;
        transition: color 0.2s ease;
        padding: 4px 0;
    }
    .nav-link-item::after {
        content: '';
        position: absolute;
        bottom: 0; left: 0;
        width: 0; height: 1.5px;
        background: #C0392B;
        transition: width 0.25s ease;
    }
    .nav-link-item:hover { color: #fff; }
    .nav-link-item:hover::after { width: 100%; }
    .nav-link-item.active { color: #fff; }
    .nav-link-item.active::after { width: 100%; }

    .nav-social-icon {
        color: rgba(255,255,255,0.5);
        transition: color 0.2s ease, transform 0.2s ease;
        display: flex; align-items: center; justify-content: center;
    }
    .nav-social-icon:hover {
        color: #fff;
        transform: translateY(-1px);
    }

    .nav-quote-btn {
        font-family: 'Instrument Sans', sans-serif;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.13em;
        text-transform: uppercase;
        background: #C0392B;
        color: #fff;
        border-radius: 999px;
        padding: 12px 24px;
        text-decoration: none;
        white-space: nowrap;
        transition: background 0.2s ease, transform 0.15s ease, box-shadow 0.2s ease;
        box-shadow: 0 2px 12px rgba(192,57,43,0.35);
    }
    .nav-quote-btn:hover {
        background: #a93226;
        transform: translateY(-1px);
        box-shadow: 0 4px 18px rgba(192,57,43,0.5);
    }

    /* Mobile menu */
    .mobile-menu {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.35s ease;
    }
    .mobile-menu.open {
        max-height: 500px;
    }
</style>

<header
    class="w-full absolute top-0 left-0 z-50 bg-gradient-to-b from-black/85 to-black/0"
>
    <nav
        class="max-w-[1440px] mx-auto px-8 lg:px-12
               flex items-center justify-between
               h-[70px]"
        aria-label="Main navigation"
    >

        {{-- Logo --}}
        <a
            href="{{ $logoUrl ?? '/' }}"
            class="flex items-center shrink-0 no-underline group"
            aria-label="Himalayan Design Build — Home"
        >
            <img
                src="{{ asset('images/logo.svg') }}"
                alt="Himalayan Builders & Engineers"
                class="h-10 w-auto"
                onerror="this.style.display='none'"
            />
        </a>

        {{-- Divider (desktop) --}}
        <div class="hidden lg:block w-px h-8 bg-white/10 mx-6 shrink-0"></div>

        {{-- Desktop Nav Links --}}
        <ul class="hidden lg:flex items-center gap-8 list-none m-0 p-0 flex-1">
            @php
                $links = $navLinks ?? [
                    ['label' => 'Home',     'url' => '/',          'active' => true],
                    ['label' => 'About',    'url' => '#about',     'active' => false],
                    ['label' => 'Service',  'url' => '#service',   'active' => false],
                    ['label' => 'Projects', 'url' => '#projects',  'active' => false],
                    ['label' => 'Insights', 'url' => '#insights',  'active' => false],
                ];
            @endphp

            @foreach($links as $link)
                <li>
                    <a
                        href="{{ $link['url'] }}"
                        class="nav-link-item {{ ($link['active'] ?? false) ? 'active' : '' }}"
                    >
                        {{ $link['label'] }}
                    </a>
                </li>
            @endforeach
        </ul>

        {{-- Right: Social icons + CTA --}}
        <div class="hidden lg:flex items-center gap-5">

            {{-- Facebook --}}
            <a href="#" class="nav-social-icon" aria-label="Facebook">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>
                </svg>
            </a>

            {{-- LinkedIn --}}
            <a href="#" class="nav-social-icon" aria-label="LinkedIn">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/>
                    <rect x="2" y="9" width="4" height="12"/>
                    <circle cx="4" cy="4" r="2"/>
                </svg>
            </a>

            {{-- Instagram --}}
            <a href="#" class="nav-social-icon" aria-label="Instagram">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                    <circle cx="12" cy="12" r="4"/>
                    <circle cx="17.5" cy="6.5" r="0.5" fill="currentColor"/>
                </svg>
            </a>

            {{-- Divider --}}
            <div class="w-px h-6 bg-white/10 mx-1"></div>

            {{-- CTA Button --}}
            <a href="{{ $quoteUrl ?? '#contact' }}" class="nav-quote-btn">
                Get a Quote
            </a>

        </div>

        {{-- Mobile hamburger --}}
        <button
            id="nav-toggle"
            class="lg:hidden flex flex-col gap-[5px] p-2 cursor-pointer bg-transparent border-none"
            aria-label="Toggle menu"
            aria-expanded="false"
        >
            <span class="block w-6 h-[2px] bg-white/70 transition-all duration-200" id="ham-top"></span>
            <span class="block w-6 h-[2px] bg-white/70 transition-all duration-200" id="ham-mid"></span>
            <span class="block w-6 h-[2px] bg-white/70 transition-all duration-200" id="ham-bot"></span>
        </button>

    </nav>

    {{-- Mobile menu --}}
    <div class="mobile-menu lg:hidden" id="mobile-menu" role="navigation" aria-label="Mobile navigation">
        <div class="px-8 pb-6 flex flex-col gap-4 border-t border-white/10">
            @foreach($links ?? [] as $link)
                <a
                    href="{{ $link['url'] }}"
                    class="nav-link-item text-base"
                >
                    {{ $link['label'] }}
                </a>
            @endforeach

            <div class="flex items-center gap-5 pt-2">
                <a href="#" class="nav-social-icon" aria-label="Facebook">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                </a>
                <a href="#" class="nav-social-icon" aria-label="LinkedIn">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
                </a>
                <a href="#" class="nav-social-icon" aria-label="Instagram">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="0.5" fill="currentColor"/></svg>
                </a>
            </div>

            <a href="{{ $quoteUrl ?? '#contact' }}" class="nav-quote-btn self-start mt-2">
                Get a Quote
            </a>
        </div>
    </div>

</header>

<script>
    (function () {
        const toggle = document.getElementById('nav-toggle');
        const menu   = document.getElementById('mobile-menu');
        const top    = document.getElementById('ham-top');
        const mid    = document.getElementById('ham-mid');
        const bot    = document.getElementById('ham-bot');

        if (!toggle || !menu) return;

        toggle.addEventListener('click', () => {
            const open = menu.classList.toggle('open');
            toggle.setAttribute('aria-expanded', open);

            if (open) {
                top.style.transform = 'translateY(7px) rotate(45deg)';
                mid.style.opacity   = '0';
                bot.style.transform = 'translateY(-7px) rotate(-45deg)';
            } else {
                top.style.transform = '';
                mid.style.opacity   = '';
                bot.style.transform = '';
            }
        });
    })();
</script>