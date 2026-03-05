<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'NeuralForge — Servicios de IA')  </title>
    <meta name="description" content="@yield('description', 'Soluciones de Inteligencia Artificial para empresas que quieren liderar el futuro.')">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@0,400;0,700;1,400&family=Syne:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        /* ============================
           RESET & BASE
        ============================ */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg:       #050810;
            --bg2:      #0b0f1a;
            --bg3:      #111827;
            --border:   rgba(255,255,255,0.07);
            --text:     #e2e8f0;
            --muted:    #64748b;
            --cyan:     #22d3ee;
            --violet:   #a78bfa;
            --emerald:  #34d399;
            --amber:    #fbbf24;
            --rose:     #fb7185;
            --indigo:   #818cf8;
            --white:    #ffffff;
            --font-display: 'Syne', sans-serif;
            --font-mono:    'Space Mono', monospace;
        }

        html { scroll-behavior: smooth; }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: var(--font-display);
            font-size: 16px;
            line-height: 1.6;
            overflow-x: hidden;
        }

        a { color: inherit; text-decoration: none; }
        img { max-width: 100%; display: block; }

        /* ============================
           NOISE TEXTURE OVERLAY
        ============================ */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 0;
            opacity: .4;
        }

        /* ============================
           NAVIGATION
        ============================ */
        .nav {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 100;
            padding: 0 2rem;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgba(5,8,16,0.8);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
        }

        .nav-logo {
            font-family: var(--font-mono);
            font-size: 1.1rem;
            font-weight: 700;
            letter-spacing: -0.02em;
            color: var(--white);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .nav-logo span {
            color: var(--cyan);
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 2rem;
            list-style: none;
        }

        .nav-links a {
            font-size: 0.85rem;
            font-weight: 500;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            color: var(--muted);
            transition: color 0.2s;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: var(--white);
        }

        .nav-cta {
            background: var(--cyan);
            color: var(--bg) !important;
            padding: 0.45rem 1.2rem;
            border-radius: 4px;
            font-weight: 700 !important;
            transition: opacity 0.2s !important;
        }

        .nav-cta:hover { opacity: 0.85; color: var(--bg) !important; }

        /* ============================
           MAIN CONTENT
        ============================ */
        main {
            position: relative;
            z-index: 1;
            padding-top: 64px;
        }

        /* ============================
           FOOTER
        ============================ */
        footer {
            position: relative;
            z-index: 1;
            background: var(--bg2);
            border-top: 1px solid var(--border);
            padding: 3rem 2rem 2rem;
        }

        .footer-inner {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 3rem;
        }

        .footer-brand p {
            color: var(--muted);
            font-size: 0.9rem;
            margin-top: 0.75rem;
            max-width: 280px;
            line-height: 1.7;
        }

        .footer-col h4 {
            font-size: 0.75rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 1rem;
        }

        .footer-col ul { list-style: none; }

        .footer-col ul li + li { margin-top: 0.6rem; }

        .footer-col ul a {
            font-size: 0.9rem;
            color: var(--text);
            transition: color 0.2s;
        }

        .footer-col ul a:hover { color: var(--cyan); }

        .footer-bottom {
            max-width: 1200px;
            margin: 2rem auto 0;
            padding-top: 1.5rem;
            border-top: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.8rem;
            color: var(--muted);
            font-family: var(--font-mono);
        }

        /* ============================
           UTILITY CLASSES
        ============================ */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            font-family: var(--font-mono);
            font-size: 0.7rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            padding: 0.3rem 0.8rem;
            border-radius: 100px;
            border: 1px solid currentColor;
            opacity: 0.9;
        }

        .badge::before { content: '//'; opacity: 0.5; }

        .badge-cyan   { color: var(--cyan); }
        .badge-violet { color: var(--violet); }
        .badge-emerald{ color: var(--emerald); }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.75rem;
            border-radius: 4px;
            font-family: var(--font-display);
            font-weight: 700;
            font-size: 0.9rem;
            letter-spacing: 0.02em;
            cursor: pointer;
            border: none;
            transition: all 0.2s;
        }

        .btn-primary {
            background: var(--cyan);
            color: var(--bg);
        }

        .btn-primary:hover { opacity: 0.85; transform: translateY(-1px); }

        .btn-ghost {
            background: transparent;
            color: var(--text);
            border: 1px solid var(--border);
        }

        .btn-ghost:hover {
            border-color: rgba(255,255,255,0.25);
            background: rgba(255,255,255,0.04);
        }

        /* ============================
           CARD BASE
        ============================ */
        .card {
            background: var(--bg2);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 2rem;
            position: relative;
            overflow: hidden;
            transition: border-color 0.3s, transform 0.3s;
        }

        .card:hover {
            border-color: rgba(255,255,255,0.15);
            transform: translateY(-3px);
        }

        /* ============================
           GRID BACKGROUND PATTERN
        ============================ */
        .grid-bg {
            background-image:
                linear-gradient(rgba(255,255,255,0.02) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.02) 1px, transparent 1px);
            background-size: 60px 60px;
        }

        @media (max-width: 768px) {
            .nav-links { display: none; }
            .footer-inner { grid-template-columns: 1fr; gap: 2rem; }
            .footer-bottom { flex-direction: column; gap: 0.5rem; text-align: center; }
        }
    </style>

    @stack('styles')
</head>
<body>

    <!-- NAVIGATION -->
    <nav class="nav">
        <a href="{{ route('home') }}" class="nav-logo">
            <span>N</span>euralForge
        </a>

        <ul class="nav-links">
            <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Inicio</a></li>
            <li><a href="{{ route('servicios') }}" class="{{ request()->routeIs('servicios*') ? 'active' : '' }}">Servicios</a></li>
            <li><a href="{{ route('contacto') }}" class="{{ request()->routeIs('contacto*') ? 'active' : '' }} nav-cta">Contactar</a></li>
        </ul>
    </nav>

    <!-- MAIN CONTENT -->
    <main>
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer>
        <div class="footer-inner">
            <div class="footer-brand">
                <a href="{{ route('home') }}" style="font-family: var(--font-mono); font-size: 1.1rem; font-weight: 700; color: var(--white);">
                    <span style="color:var(--cyan)">N</span>euralForge
                </a>
                <p>Soluciones de Inteligencia Artificial para empresas que quieren liderar el futuro digital.</p>
            </div>
            <div class="footer-col">
                <h4>Servicios</h4>
                <ul>
                    <li><a href="{{ route('servicios.show', 'generacion-texto') }}">Generación de Texto</a></li>
                    <li><a href="{{ route('servicios.show', 'vision-computadora') }}">Visión Computadora</a></li>
                    <li><a href="{{ route('servicios.show', 'chatbots') }}">Chatbots IA</a></li>
                    <li><a href="{{ route('servicios.show', 'automatizacion') }}">Automatización</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Empresa</h4>
                <ul>
                    <li><a href="{{ route('home') }}">Inicio</a></li>
                    <li><a href="{{ route('servicios') }}">Todos los servicios</a></li>
                    <li><a href="{{ route('contacto') }}">Contacto</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Contacto</h4>
                <ul>
                    <li><a href="mailto:info@neuralforge.ai">info@neuralforge.ai</a></li>
                    <li><a href="tel:+34900000000">+34 900 000 000</a></li>
                    <li><a href="#">Madrid, España</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <span>© {{ date('Y') }} NeuralForge. Todos los derechos reservados.</span>
            <span>// built with Laravel {{ app()->version() }}</span>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
