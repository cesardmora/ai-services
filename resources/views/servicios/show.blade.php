@extends('layouts.app')

@section('title', $servicio['titulo'] . ' — NeuralForge')
@section('description', $servicio['descripcion'])

@push('styles')
<style>
    .detail-hero {
        padding: 5rem 2rem 4rem;
        position: relative;
        overflow: hidden;
    }

    .detail-hero-bg {
        position: absolute;
        inset: 0;
        background: radial-gradient(ellipse 50% 60% at 20% 50%, rgba(34,211,238,0.06) 0%, transparent 60%);
    }

    .detail-inner {
        max-width: 1200px;
        margin: 0 auto;
        position: relative;
    }

    .breadcrumb {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-family: var(--font-mono);
        font-size: 0.75rem;
        color: var(--muted);
        margin-bottom: 2rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .breadcrumb a { transition: color 0.2s; }
    .breadcrumb a:hover { color: var(--cyan); }

    .detail-grid {
        display: grid;
        grid-template-columns: 1fr 380px;
        gap: 4rem;
        align-items: start;
    }

    .detail-icon {
        font-size: 4rem;
        margin-bottom: 1.5rem;
        display: block;
    }

    .detail-hero h1 {
        font-size: clamp(2rem, 4vw, 3rem);
        font-weight: 800;
        letter-spacing: -0.03em;
        color: var(--white);
        margin-bottom: 1.25rem;
    }

    .detail-desc {
        font-size: 1.1rem;
        color: var(--muted);
        line-height: 1.75;
        margin-bottom: 2rem;
        max-width: 600px;
    }

    /* Sidebar card */
    .detail-card {
        background: var(--bg2);
        border: 1px solid var(--border);
        border-radius: 16px;
        padding: 2rem;
        position: sticky;
        top: 88px;
    }

    .detail-card .price {
        font-family: var(--font-mono);
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--white);
        margin-bottom: 0.25rem;
    }

    .detail-card .price-note {
        font-size: 0.8rem;
        color: var(--muted);
        margin-bottom: 1.5rem;
        font-family: var(--font-mono);
    }

    .detail-card .btn {
        width: 100%;
        justify-content: center;
        margin-bottom: 0.75rem;
    }

    .detail-card .features-list {
        list-style: none;
        margin-top: 1.5rem;
        padding-top: 1.5rem;
        border-top: 1px solid var(--border);
    }

    .detail-card .features-list li {
        display: flex;
        align-items: center;
        gap: 0.6rem;
        font-size: 0.88rem;
        color: var(--text);
        padding: 0.4rem 0;
    }

    .check {
        width: 18px;
        height: 18px;
        border-radius: 50%;
        background: rgba(52,211,153,0.15);
        color: var(--emerald);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 0.7rem;
        flex-shrink: 0;
    }

    /* Others */
    .others-section {
        padding: 4rem 2rem 6rem;
        background: var(--bg2);
        border-top: 1px solid var(--border);
    }

    .others-section h2 {
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--white);
        margin-bottom: 2rem;
        max-width: 1200px;
        margin-left: auto;
        margin-right: auto;
    }

    .others-grid {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.5rem;
    }

    .other-card {
        background: var(--bg);
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 1.5rem;
        transition: all 0.3s;
    }

    .other-card:hover {
        border-color: rgba(255,255,255,0.18);
        transform: translateY(-3px);
    }

    .other-card .ico { font-size: 1.6rem; margin-bottom: 0.75rem; }
    .other-card h3 { font-size: 0.95rem; font-weight: 700; color: var(--white); margin-bottom: 0.5rem; }
    .other-card p { font-size: 0.82rem; color: var(--muted); margin-bottom: 1rem; line-height: 1.6; }
    .other-card a { font-family: var(--font-mono); font-size: 0.75rem; color: var(--cyan); text-transform: uppercase; letter-spacing: 0.05em; }

    @media (max-width: 900px) {
        .detail-grid { grid-template-columns: 1fr; }
        .detail-card { position: static; }
        .others-grid { grid-template-columns: 1fr; }
    }
</style>
@endpush

@section('content')

<section class="detail-hero">
    <div class="detail-hero-bg"></div>
    <div class="detail-inner">

        <!-- Breadcrumb -->
        <div class="breadcrumb">
            <a href="{{ route('home') }}">Inicio</a>
            <span>/</span>
            <a href="{{ route('servicios') }}">Servicios</a>
            <span>/</span>
            <span style="color:var(--text)">{{ $servicio['titulo'] }}</span>
        </div>

        <div class="detail-grid">
            <!-- Left: Info -->
            <div>
                <span class="detail-icon">{{ $servicio['icono'] }}</span>
                <h1>{{ $servicio['titulo'] }}</h1>
                <p class="detail-desc">{{ $servicio['detalle'] }}</p>

                <a href="{{ route('contacto') }}" class="btn btn-primary" style="margin-top:0.5rem">
                    Solicitar demo gratuita →
                </a>
            </div>

            <!-- Right: Card -->
            <div class="detail-card">
                <div class="price">{{ $servicio['precio'] }}</div>
                <div class="price-note">// facturación mensual, sin permanencia</div>

                <a href="{{ route('contacto') }}" class="btn btn-primary">Empezar ahora</a>
                <a href="{{ route('contacto') }}" class="btn btn-ghost">Hablar con ventas</a>

                <ul class="features-list">
                    @foreach($servicio['caracteristicas'] as $c)
                    <li>
                        <span class="check">✓</span>
                        {{ $c }}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- OTHER SERVICES -->
@if(count($otros) > 0)
<section class="others-section">
    <h2>También te puede interesar</h2>
    <div class="others-grid">
        @foreach($otros as $otro)
        <div class="other-card">
            <div class="ico">{{ $otro['icono'] }}</div>
            <h3>{{ $otro['titulo'] }}</h3>
            <p>{{ $otro['descripcion'] }}</p>
            <a href="{{ route('servicios.show', $otro['slug']) }}">Ver servicio →</a>
        </div>
        @endforeach
    </div>
</section>
@endif

@endsection
