@extends('layouts.app')

@section('title', 'NeuralForge — IA para empresas que lideran el futuro')

@push('styles')
<style>
    /* ============================
       HERO
    ============================ */
    .hero {
        min-height: calc(100vh - 64px);
        display: flex;
        align-items: center;
        position: relative;
        overflow: hidden;
        padding: 6rem 2rem 4rem;
    }

    .hero-bg {
        position: absolute;
        inset: 0;
        background:
            radial-gradient(ellipse 80% 60% at 50% -20%, rgba(34,211,238,0.12) 0%, transparent 60%),
            radial-gradient(ellipse 50% 40% at 80% 50%, rgba(167,139,250,0.08) 0%, transparent 50%);
    }

    .hero-grid {
        position: absolute;
        inset: 0;
        background-image:
            linear-gradient(rgba(255,255,255,0.015) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255,255,255,0.015) 1px, transparent 1px);
        background-size: 80px 80px;
    }

    .hero-inner {
        position: relative;
        z-index: 2;
        max-width: 1200px;
        margin: 0 auto;
        width: 100%;
    }

    .hero-tag {
        margin-bottom: 1.5rem;
        animation: fadeUp 0.6s ease both;
    }

    .hero h1 {
        font-size: clamp(2.5rem, 6vw, 5rem);
        font-weight: 800;
        line-height: 1.05;
        letter-spacing: -0.03em;
        color: var(--white);
        max-width: 800px;
        margin-bottom: 1.5rem;
        animation: fadeUp 0.6s ease 0.1s both;
    }

    .hero h1 em {
        font-style: normal;
        color: var(--cyan);
    }

    .hero-desc {
        font-size: 1.15rem;
        color: var(--muted);
        max-width: 560px;
        line-height: 1.7;
        margin-bottom: 2.5rem;
        animation: fadeUp 0.6s ease 0.2s both;
    }

    .hero-actions {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
        animation: fadeUp 0.6s ease 0.3s both;
    }

    .hero-floating {
        position: absolute;
        right: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 45%;
        max-width: 500px;
        display: none;
    }

    /* terminal card */
    .terminal {
        background: var(--bg3);
        border: 1px solid var(--border);
        border-radius: 12px;
        overflow: hidden;
        font-family: var(--font-mono);
        font-size: 0.8rem;
    }

    .terminal-bar {
        background: var(--bg2);
        padding: 0.6rem 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        border-bottom: 1px solid var(--border);
    }

    .dot { width: 10px; height: 10px; border-radius: 50%; }
    .dot-r { background: #ff5f56; }
    .dot-y { background: #ffbd2e; }
    .dot-g { background: #27c93f; }

    .terminal-body { padding: 1.5rem; line-height: 2; }
    .t-comment { color: var(--muted); }
    .t-key    { color: var(--violet); }
    .t-val    { color: var(--emerald); }
    .t-str    { color: var(--amber); }
    .t-num    { color: var(--cyan); }

    /* ============================
       STATS STRIP
    ============================ */
    .stats-strip {
        background: var(--bg2);
        border-top: 1px solid var(--border);
        border-bottom: 1px solid var(--border);
        padding: 2rem;
    }

    .stats-inner {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 2rem;
        text-align: center;
    }

    .stat-val {
        font-family: var(--font-mono);
        font-size: 2rem;
        font-weight: 700;
        color: var(--cyan);
        letter-spacing: -0.02em;
    }

    .stat-label {
        font-size: 0.8rem;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        color: var(--muted);
        margin-top: 0.3rem;
    }

    /* ============================
       SERVICES SECTION
    ============================ */
    .services-section {
        padding: 6rem 2rem;
    }

    .section-header {
        max-width: 1200px;
        margin: 0 auto 3.5rem;
    }

    .section-header h2 {
        font-size: clamp(1.8rem, 3.5vw, 2.8rem);
        font-weight: 800;
        letter-spacing: -0.03em;
        color: var(--white);
        margin-top: 0.75rem;
    }

    .services-grid {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.5rem;
    }

    .service-card {
        padding: 2rem;
        background: var(--bg2);
        border: 1px solid var(--border);
        border-radius: 12px;
        position: relative;
        overflow: hidden;
        transition: all 0.3s;
    }

    .service-card::before {
        content: '';
        position: absolute;
        inset: 0;
        opacity: 0;
        transition: opacity 0.3s;
        border-radius: inherit;
    }

    .service-card[data-color="cyan"]::before   { background: radial-gradient(ellipse at top left, rgba(34,211,238,0.07), transparent 60%); }
    .service-card[data-color="violet"]::before { background: radial-gradient(ellipse at top left, rgba(167,139,250,0.07), transparent 60%); }
    .service-card[data-color="emerald"]::before{ background: radial-gradient(ellipse at top left, rgba(52,211,153,0.07), transparent 60%); }

    .service-card:hover { border-color: rgba(255,255,255,0.18); transform: translateY(-4px); }
    .service-card:hover::before { opacity: 1; }

    .service-icon {
        font-size: 2.5rem;
        margin-bottom: 1.25rem;
        display: block;
    }

    .service-card h3 {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--white);
        margin-bottom: 0.75rem;
        letter-spacing: -0.01em;
    }

    .service-card p {
        font-size: 0.9rem;
        color: var(--muted);
        line-height: 1.7;
        margin-bottom: 1.5rem;
    }

    .service-link {
        font-family: var(--font-mono);
        font-size: 0.8rem;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        transition: gap 0.2s;
    }

    .service-card[data-color="cyan"]    .service-link { color: var(--cyan); }
    .service-card[data-color="violet"]  .service-link { color: var(--violet); }
    .service-card[data-color="emerald"] .service-link { color: var(--emerald); }

    .service-link:hover { gap: 0.7rem; }

    /* ============================
       CTA BAND
    ============================ */
    .cta-band {
        padding: 5rem 2rem;
        text-align: center;
        background: var(--bg2);
        border-top: 1px solid var(--border);
        border-bottom: 1px solid var(--border);
        position: relative;
        overflow: hidden;
    }

    .cta-band::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(ellipse 70% 100% at 50% 100%, rgba(34,211,238,0.07) 0%, transparent 60%);
    }

    .cta-band h2 {
        font-size: clamp(1.8rem, 3.5vw, 2.8rem);
        font-weight: 800;
        letter-spacing: -0.03em;
        color: var(--white);
        margin-bottom: 1rem;
        position: relative;
    }

    .cta-band p {
        color: var(--muted);
        max-width: 500px;
        margin: 0 auto 2rem;
        font-size: 1rem;
        position: relative;
    }

    .cta-band .btn { position: relative; }

    /* ============================
       ANIMATIONS
    ============================ */
    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(20px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    @media (min-width: 1024px) {
        .hero-floating { display: block; }
        .hero h1 { max-width: 55%; }
        .hero-desc { max-width: 55%; }
        .hero-actions { max-width: 55%; }
    }

    @media (max-width: 768px) {
        .stats-inner { grid-template-columns: repeat(2, 1fr); }
        .services-grid { grid-template-columns: 1fr; }
    }
</style>
@endpush

@section('content')

<!-- HERO -->
<section class="hero">
    <div class="hero-bg"></div>
    <div class="hero-grid"></div>

    <div class="hero-inner">
        <div class="hero-tag">
            <span class="badge badge-cyan">IA empresarial</span>
        </div>

        <h1>Construye el futuro con <em>Inteligencia Artificial</em></h1>

        <p class="hero-desc">
            Potencia tu empresa con soluciones de IA de nivel enterprise. Desde modelos de lenguaje hasta visión computadora, transformamos tus procesos en ventajas competitivas.
        </p>

        <div class="hero-actions">
            <a href="{{ route('servicios') }}" class="btn btn-primary">Ver servicios →</a>
            <a href="{{ route('contacto') }}" class="btn btn-ghost">Hablar con un experto</a>
        </div>

        <!-- Terminal flotante (decorativa) -->
        <div class="hero-floating">
            <div class="terminal">
                <div class="terminal-bar">
                    <span class="dot dot-r"></span>
                    <span class="dot dot-y"></span>
                    <span class="dot dot-g"></span>
                    <span style="color:var(--muted);margin-left:0.5rem;font-size:0.75rem">neuralforge_api.php</span>
                </div>
                <div class="terminal-body">
                    <div><span class="t-key">$response</span> <span style="color:var(--muted)">=</span> <span class="t-val">NeuralForge</span><span style="color:var(--muted)">::</span><span class="t-str">generate</span>([</div>
                    <div style="padding-left:1.5rem"><span class="t-key">'model'</span>  <span style="color:var(--muted)">=></span> <span class="t-str">'nf-ultra-v3'</span>,</div>
                    <div style="padding-left:1.5rem"><span class="t-key">'prompt'</span> <span style="color:var(--muted)">=></span> <span class="t-str">'Analiza este informe...'</span>,</div>
                    <div style="padding-left:1.5rem"><span class="t-key">'tokens'</span> <span style="color:var(--muted)">=></span> <span class="t-num">4096</span>,</div>
                    <div>]);</div>
                    <div style="margin-top:0.5rem"><span class="t-comment">// → status: 200 ✓ 58ms</span></div>
                    <div><span class="t-comment">// → tokens used: 312</span></div>
                    <div><span class="t-comment">// → confidence: 0.97</span></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- STATS STRIP -->
<section class="stats-strip">
    <div class="stats-inner">
        @foreach($stats as $stat)
        <div class="stat">
            <div class="stat-val">{{ $stat['valor'] }}</div>
            <div class="stat-label">{{ $stat['etiqueta'] }}</div>
        </div>
        @endforeach
    </div>
</section>

<!-- SERVICES FEATURED -->
<section class="services-section">
    <div class="section-header">
        <span class="badge badge-violet">Servicios destacados</span>
        <h2>IA a medida para cada reto</h2>
    </div>

    <div class="services-grid">
        @foreach($serviciosDestacados as $s)
        <div class="service-card" data-color="{{ $s['color'] }}">
            <span class="service-icon">{{ $s['icono'] }}</span>
            <h3>{{ $s['titulo'] }}</h3>
            <p>{{ $s['descripcion'] }}</p>
            <a href="{{ route('servicios.show', $s['slug']) }}" class="service-link">
                Ver más →
            </a>
        </div>
        @endforeach
    </div>

    <div style="text-align:center; margin-top:3rem;">
        <a href="{{ route('servicios') }}" class="btn btn-ghost">Ver todos los servicios →</a>
    </div>
</section>

<!-- CTA BAND -->
<section class="cta-band">
    <h2>¿Listo para transformar tu empresa?</h2>
    <p>Habla con nuestro equipo de expertos y recibe una propuesta personalizada sin compromiso.</p>
    <a href="{{ route('contacto') }}" class="btn btn-primary">Solicitar demo gratuita</a>
</section>

@endsection
