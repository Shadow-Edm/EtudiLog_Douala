<!DOCTYPE html>
<html class="light" lang="fr">

<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield('title', 'Mes Annonces') - EtudiLog Douala</title>

    {{-- Pour la prod, migre idéalement vers un build Tailwind (Vite) plutôt que le CDN --}}
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            display: inline-block;
            line-height: 1;
            text-transform: none;
            letter-spacing: normal;
            word-wrap: normal;
            white-space: nowrap;
            direction: ltr;
        }
        .material-symbols-outlined.filled {
            font-variation-settings:
                'FILL' 1,
                'wght' 500,
                'GRAD' 0,
                'opsz' 24;
        }
        body { font-family: 'Inter', sans-serif; }
        .glass-panel {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
    </style>

    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "surface-container-high": "#dce9ff",
                        "surface-container-highest": "#d3e4fe",
                        "on-primary-fixed-variant": "#264191",
                        "on-secondary-fixed-variant": "#783200",
                        "on-surface": "#0b1c30",
                        "inverse-primary": "#b6c4ff",
                        "secondary-fixed": "#ffdbca",
                        "on-primary": "#ffffff",
                        "error": "#ba1a1a",
                        "surface-dim": "#cbdbf5",
                        "inverse-on-surface": "#eaf1ff",
                        "primary-fixed-dim": "#b6c4ff",
                        "primary-container": "#1e3a8a",
                        "outline-variant": "#c5c5d3",
                        "inverse-surface": "#213145",
                        "primary-fixed": "#dce1ff",
                        "surface-container": "#e5eeff",
                        "secondary": "#9d4300",
                        "tertiary-container": "#384055",
                        "surface-tint": "#4059aa",
                        "on-primary-container": "#90a8ff",
                        "on-tertiary-fixed": "#131b2e",
                        "secondary-fixed-dim": "#ffb690",
                        "on-secondary": "#ffffff",
                        "primary": "#00236f",
                        "on-secondary-container": "#5c2400",
                        "on-error-container": "#93000a",
                        "on-surface-variant": "#444651",
                        "tertiary": "#222a3e",
                        "surface-bright": "#f8f9ff",
                        "on-error": "#ffffff",
                        "on-primary-fixed": "#00164e",
                        "tertiary-fixed": "#dae2fd",
                        "surface-container-low": "#eff4ff",
                        "background": "#f8f9ff",
                        "surface": "#f8f9ff",
                        "on-tertiary-container": "#a4acc5",
                        "tertiary-fixed-dim": "#bec6e0",
                        "on-background": "#0b1c30",
                        "secondary-container": "#fd761a",
                        "surface-container-lowest": "#ffffff",
                        "on-secondary-fixed": "#341100",
                        "on-tertiary": "#ffffff",
                        "surface-variant": "#d3e4fe",
                        "on-tertiary-fixed-variant": "#3f465c",
                        "error-container": "#ffdad6",
                        "outline": "#757682"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "md": "16px",
                        "sm": "8px",
                        "lg": "24px",
                        "gutter": "20px",
                        "xs": "4px",
                        "base": "4px",
                        "xl": "40px",
                        "container-max": "1280px"
                    },
                    "fontFamily": {
                        "caption": ["Inter"],
                        "headline-lg": ["Inter"],
                        "display": ["Inter"],
                        "headline-md": ["Inter"],
                        "body-md": ["Inter"],
                        "body-lg": ["Inter"],
                        "label-md": ["Inter"]
                    },
                    "fontSize": {
                        "caption": ["12px", {"lineHeight": "16px", "fontWeight": "500"}],
                        "headline-lg": ["32px", {"lineHeight": "40px", "letterSpacing": "-0.01em", "fontWeight": "700"}],
                        "display": ["48px", {"lineHeight": "56px", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                        "headline-md": ["24px", {"lineHeight": "32px", "fontWeight": "600"}],
                        "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
                        "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "400"}],
                        "label-md": ["14px", {"lineHeight": "20px", "fontWeight": "600"}]
                    }
                },
            },
        }
    </script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-background text-on-background">

    @include('partials.guest-navbar')

    <main>

        @yield('content')

    </main>

    @include('partials.guest-footer')

    @stack('scripts')

</body>
</html>
