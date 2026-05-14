<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ config('app.name', 'Himalayan Design Build') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&family=Instrument+Serif:ital,wght@0,400;1,400&display=swap" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        display: ['Instrument Serif', 'Georgia', 'serif'],
                        body:    ['Instrument Sans', 'sans-serif'],
                    },
                    colors: {
                        accent:         '#C0392B',
                        'accent-light': '#E74C3C',
                        'hero-dark':    '#1a1a1a',
                    },
                },
            },
        }
    </script>

    <style>
        .font-display { font-family: 'Instrument Serif', Georgia, serif; }
        .font-body    { font-family: 'Instrument Sans', sans-serif; }
        .hero-heading-fluid { font-size: clamp(64px, 8vw, 110px); }
        .hero-video {
            position: absolute; inset: 0;
            width: 100%; height: 100%;
            object-fit: cover; object-position: center;
        }
        .btn-primary:hover .btn-arrow { transform: translateX(4px); }
        .btn-arrow { display: inline-block; transition: transform 0.2s ease; }
        /* About section heading — same scale as hero */
        .about-heading-fluid { font-size: clamp(36px, 4.5vw, 68px); }
    </style>

    {{-- Section-specific styles pushed via @push('styles') --}}
    @stack('styles')
</head>
<body class="antialiased">

    @include('components.sections.hero', [
        'videoSrc'        => asset('videos/hero.mp4'),
        'videoPoster'     => asset('images/hero-poster.jpg'),
        'heading'         => 'Building',
        'headingItalic'   => 'Excellence.',
        'quoteText'       => '"Architecture is the learned game, correct and magnificent, of forms assembled in the light."',
        'quoteLabel'      => 'A-CLASS CERTIFIED',
        'ctaPrimary'      => 'EXPLORE PORTFOLIO',
        'ctaPrimaryUrl'   => '#portfolio',
        'ctaSecondary'    => 'OUR VISION',
        'ctaSecondaryUrl' => '#vision',
    ])

    @include('components.sections.stats', [
        'stats' => [
            ['number' => '400+', 'label' => 'GLOBAL PROJECTS DELIVERED'],
            ['number' => '30+',  'label' => 'YEARS OF ENGINEERING MASTERY'],
            ['number' => 'Top 5','label' => 'NATIONAL RANK (A-CLASS)'],
        ],
    ])

    @include('components.sections.about', [
        'tagline'        => 'THE LEGACY',
        'headingNormal'  => 'Pioneering',
        'headingItalic'  => 'Design,',
        'headingItalic2' => 'Build',
        'headingEnd'     => 'Excellence in Nepal.',
        'body1'          => 'Himalayan Builders & Engineers (HBE) stands as a titan in the civil engineering landscape, redefining the skyline of Nepal through innovation and uncompromising quality.',
        'body2'          => 'As the pioneers of the design-build model in the region, we provide a seamless, integrated approach that bridges the gap between architectural vision and structural reality.',
        'ctaLabel'       => 'OUR FULL STORY',
        'ctaUrl'         => '#story',
        'imageSrc'       => asset('images/about-building.jpg'),
        'imageAlt'       => 'Himalayan Builders & Engineers headquarters building',
        'badgeNumber'    => '01',
        'badgeLabel'     => 'CERTIFIED SAFETY STANDARDS',
        'ratingLabel'    => 'A-Class',
        'ratingSub'      => 'GOVERNMENT RATING',
    ])

    @include('components.sections.featured-works', [
 
    'eyebrow'       => 'FEATURED WORK',
    'headingNormal' => 'Iconic',
    'headingItalic' => 'Structures.',
 
    'filters' => [
        ['label' => 'ALL WORKS',      'active' => true],
        ['label' => 'HOTELS'],
        ['label' => 'INFRASTRUCTURE'],
        ['label' => 'HEALTHCARE'],
    ],
 
    'projects' => [
 
        // ── Large featured card (left) ──────────────────────────────────
        [
            'title'    => 'Soaltee Sibkrim Hotel',
            'meta'     => 'NEPALGUNJ / 117,000 SQ. FT.',
            'category' => 'HOSPITALITY',
            'image'    => asset('images/portfolio/soaltee.jpg'),
            'url'      => '#soaltee',
        ],
 
        // ── Top-right card ──────────────────────────────────────────────
        [
            'title'    => 'Dusit Princess Hotel',
            'category' => 'LUXURY BOUTIQUE',
            'image'    => asset('images/portfolio/dusit.jpg'),
            'url'      => '#dusit',
        ],
 
        // ── Bottom-right card ───────────────────────────────────────────
        [
            'title'    => 'Kathmandu World School',
            'category' => 'INSTITUTIONAL',
            'image'    => asset('images/portfolio/kws.jpg'),
            'url'      => '#kws',
        ],
 
    ],
])

@include('components.sections.ecosystem', [
 
    'eyebrow'       => 'VERTICAL INTEGRATION',
    'headingNormal' => 'The Himalayan',
    'headingItalic' => 'Ecosystem.',
    'body'          => 'By owning the supply chain, we eliminate uncertainty. Our sister companies provide the raw strength and engineering precision that fuel our global ambitions.',
 
    'companies' => [
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
    ],
 
])

@include('components.sections.institutional-trust', [
    'eyebrow'       => 'GLOBAL AUTHORITY',
    'headingNormal' => 'Trusted by',
    'headingItalic' => 'World Institutions.',
    'clients' => [
        ['name' => 'US Army Corps of Engineers',       'image' => asset('images/logos/image 5.png')],
        ['name' => 'U.S. Department of State (OBO)',   'image' => asset('images/logos/image 6.png')],
        ['name' => 'NAVFAC',                           'image' => asset('images/logos/image 7.png')],
        ['name' => 'TATA',                             'image' => asset('images/logos/image 8.png')],
        ['name' => 'The Soaltee Kathmandu',            'image' => asset('images/logos/image 9.png')],
        ['name' => 'Sipradi',                          'image' => asset('images/logos/image 10.png')],
    ],
])

@include('components.sections.insights', [
    'eyebrow'        => 'KNOWLEDGE BASE',
    'headingItalic'  => 'Insights.',
    'allArticlesUrl' => '/insights',
    'articles' => [
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
    ],
])

@include('components.sections.cta-banner', [
    'headingNormal' => "Let's Build",
    'headingItalic' => 'the Impossible.',
    'bgImage'       => asset('images/cta-building.jpg'),
    'ctaPrimary'    => ['label' => 'CONTACT OUR EXPERTS', 'url' => '#contact'],
    'ctaSecondary'  => ['label' => 'DOWNLOAD PORTFOLIO',  'url' => '#portfolio'],
])

@include('components.sections.footer', [
    'logoSrc' => asset('images/logos/logo.svg'),
    'contact' => [
        'heading' => 'GET IN TOUCH',
        'address' => 'Bhakti Thapa Sadak-45 KMC – 11, Babarmahal, Kathmandu, Nepal',
        'phone'   => '+977 15705009',
        'email'   => 'admin@himalayanbuilders.com',
    ],
    'socials' => [
        ['label' => 'Facebook',  'url' => 'https://facebook.com/himalayanbuilders',  'icon' => '<svg .../>'],
        ['label' => 'LinkedIn',  'url' => 'https://linkedin.com/company/himalayanbuilders', 'icon' => '<svg .../>'],
        ['label' => 'Instagram', 'url' => 'https://instagram.com/himalayanbuilders', 'icon' => '<svg .../>'],
    ],
])

    {{-- Section scripts pushed via @push('scripts') --}}
    @stack('scripts')

</body>
</html>