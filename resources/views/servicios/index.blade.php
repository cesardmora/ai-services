@extends('layouts.app')

@section('title', 'Servicios de IA — NeuralForge')
@section('description', 'Explora todos nuestros servicios de Inteligencia Artificial para empresas.')

@push('styles')
<style>
    .page-hero {
        padding: 5rem 2rem 3rem;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .page-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(ellipse 60% 80% at 50% 0%, rgba(167,139,250,0.1) 0%, transparent 60%);
    }

    .page-hero h1 {
        font-size: clamp(2rem, 5vw, 3.5rem);
        font-weight: 800;
        letter-spacing: -0.03em;
        color: var(--white);
        margin: 0.75rem auto 1rem;
        position: relative;
    }

    .page-hero p {
        color: var(--muted);
        max-width: 560px;
        margin: 0 auto;
        font-size: 1.05rem;
        position: relative;
    }

    .services-full {
        padding: 4rem 2rem 6rem;
    }

    .services-full-grid {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.5rem;
    }

    .svc-card {
        background: var(--bg2);
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 2rem;
        position: relative;
        overflow: hidden;
        transition: all 0.3s;
        display: flex;
        flex-direction: column;
    }

    .svc-card:hover {
        border-color: rgba(255,255,255,0.2);
        transform: translateY(-4px);
    }

    .svc-icon {
        font-size: 2.2rem;
        margin-bottom: 1rem;
    }

    .svc-card h3 {
        font-size: 1.15rem;
        font-weight: 700;
        color: var(--white);
        margin-bottom: 0.75rem;
        letter-spacing: -0.01em;
    }

    .svc-card p {
        font-size: 0.88rem;
        color: var(--muted);
        line-height: 1.7;
        flex: 1;
        margin-bottom: 1.5rem;
    }

    .svc-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 1rem;
        border-top: 1px solid var(--border);
    }

    .svc-price {
        font-family: var(--font-mono);
        font-size: 0.8rem;
        color: var(--muted);
    }

    .svc-link {
        font-family: var(--font-mono);
        font-size: 0.75rem;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        transition: gap 0.2s;
    }

    .color-cyan    { color: var(--cyan); }
    .color-violet  { color: var(--violet); }
    .color-emerald { color: var(--emerald); }
    .color-amber   { color: var(--amber); }
    .color-rose    { color: var(--rose); }
    .color-indigo  { color: var(--indigo); }

    .svc-link:hover { gap: 0.7rem; }

    @media (max-width: 900px) { .services-full-grid { grid-template-columns: repeat(2,1fr); } }
    @media (max-width: 600px) { .services-full-grid { grid-template-columns: 1fr; } }
</style>
@endpush

@section('content')

<section class="page-hero">
    <span class="badge badge-cyan">Nuestros servicios</span>
    <h1>IA para cada necesidad</h1>
    <p>Desde texto hasta voz, desde chatbots hasta predicción. Todo lo que tu empresa necesita para competir con IA.</p>
</section>

<section class="services-full">
    <div class="services-full-grid">
        @foreach($servicios as $s)
        <div class="svc-card">
            <div class="svc-icon">{{ $s['icono'] }}</div>
            <h3>{{ $s['titulo'] }}</h3>
            <p>{{ $s['descripcion'] }}</p>
            <div class="svc-footer">
                <span class="svc-price">{{ $s['precio'] }}</span>
                <a href="{{ route('servicios.show', $s['slug']) }}" class="svc-link color-{{ $s['color'] }}">
                    Ver detalles →
                </a>
            </div>
        </div>
        @endforeach
    </div>
</section>

@endsection
