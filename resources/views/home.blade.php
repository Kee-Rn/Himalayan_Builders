<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ config('app.name', 'Himalayan Design Build') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,700&family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        display: ['Playfair Display', 'Georgia', 'serif'],
                        body:    ['Barlow', 'sans-serif'],
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
        .font-display { font-family: 'Playfair Display', Georgia, serif; }
        .font-body    { font-family: 'Barlow', sans-serif; }
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

    {{-- Section scripts pushed via @push('scripts') --}}
    @stack('scripts')

</body>
</html>