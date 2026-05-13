<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ config('app.name', 'Himalayan Design Build') }}</title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,700&family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet" />

    {{-- Tailwind CSS (Play CDN — no build step required) --}}
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

    {{-- Page-level stacked styles --}}
    @stack('styles')
</head>
<body class="antialiased">

    {{-- Navbar slot (added later) --}}
    @hasSection('navbar')
        @yield('navbar')
    @endif

    {{-- Page content --}}
    {{ $slot }}

    {{-- Page-level scripts --}}
    @stack('scripts')
</body>
</html>