@extends('layouts.app')

@section('title', 'Contacto — NeuralForge')

@push('styles')
<style>
    .contact-page {
        min-height: calc(100vh - 64px);
        padding: 5rem 2rem 6rem;
        position: relative;
    }

    .contact-page::before {
        content: '';
        position: absolute;
        inset: 0;
        background:
            radial-gradient(ellipse 40% 50% at 70% 30%, rgba(167,139,250,0.08) 0%, transparent 60%);
    }

    .contact-inner {
        max-width: 1100px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 1.4fr;
        gap: 5rem;
        align-items: start;
        position: relative;
    }

    .contact-info h1 {
        font-size: clamp(1.8rem, 4vw, 2.8rem);
        font-weight: 800;
        letter-spacing: -0.03em;
        color: var(--white);
        margin: 0.75rem 0 1rem;
    }

    .contact-info p {
        color: var(--muted);
        line-height: 1.75;
        font-size: 1rem;
        margin-bottom: 2.5rem;
    }

    .contact-detail {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .contact-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem 1.25rem;
        background: var(--bg2);
        border: 1px solid var(--border);
        border-radius: 10px;
    }

    .contact-item-icon {
        font-size: 1.3rem;
        flex-shrink: 0;
    }

    .contact-item-label {
        font-family: var(--font-mono);
        font-size: 0.7rem;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        color: var(--muted);
        margin-bottom: 0.1rem;
    }

    .contact-item-val {
        font-size: 0.9rem;
        color: var(--text);
    }

    /* FORM */
    .contact-form-wrap {
        background: var(--bg2);
        border: 1px solid var(--border);
        border-radius: 16px;
        padding: 2.5rem;
    }

    .form-title {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--white);
        margin-bottom: 0.4rem;
    }

    .form-sub {
        font-size: 0.85rem;
        color: var(--muted);
        margin-bottom: 2rem;
        font-family: var(--font-mono);
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }

    .form-group {
        margin-bottom: 1.25rem;
    }

    .form-group label {
        display: block;
        font-size: 0.78rem;
        font-weight: 600;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        color: var(--muted);
        margin-bottom: 0.5rem;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        background: var(--bg3);
        border: 1px solid var(--border);
        border-radius: 8px;
        padding: 0.75rem 1rem;
        color: var(--white);
        font-family: var(--font-display);
        font-size: 0.9rem;
        outline: none;
        transition: border-color 0.2s, box-shadow 0.2s;
        -webkit-appearance: none;
    }

    .form-group select {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%2364748b' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        cursor: pointer;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        border-color: var(--cyan);
        box-shadow: 0 0 0 3px rgba(34,211,238,0.1);
    }

    .form-group textarea { resize: vertical; min-height: 120px; }

    .form-group .error-msg {
        font-size: 0.78rem;
        color: var(--rose);
        margin-top: 0.4rem;
        font-family: var(--font-mono);
    }

    /* Success Alert */
    .alert-success {
        background: rgba(52,211,153,0.1);
        border: 1px solid rgba(52,211,153,0.3);
        border-radius: 10px;
        padding: 1rem 1.25rem;
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
        margin-bottom: 1.5rem;
        font-size: 0.9rem;
        color: var(--emerald);
    }

    .form-submit {
        width: 100%;
        justify-content: center;
        margin-top: 0.5rem;
        font-size: 1rem;
    }

    @media (max-width: 900px) {
        .contact-inner { grid-template-columns: 1fr; gap: 3rem; }
        .form-row { grid-template-columns: 1fr; }
    }
</style>
@endpush

@section('content')

<section class="contact-page">
    <div class="contact-inner">

        <!-- Left: Info -->
        <div class="contact-info">
            <span class="badge badge-emerald">Contacto</span>
            <h1>Hablemos de tu proyecto</h1>
            <p>Cuéntanos tus necesidades y nuestro equipo de expertos en IA preparará una propuesta personalizada para tu empresa.</p>

            <div class="contact-detail">
                <div class="contact-item">
                    <span class="contact-item-icon">📧</span>
                    <div>
                        <div class="contact-item-label">Email</div>
                        <div class="contact-item-val">info@neuralforge.ai</div>
                    </div>
                </div>
                <div class="contact-item">
                    <span class="contact-item-icon">📞</span>
                    <div>
                        <div class="contact-item-label">Teléfono</div>
                        <div class="contact-item-val">+34 900 000 000</div>
                    </div>
                </div>
                <div class="contact-item">
                    <span class="contact-item-icon">📍</span>
                    <div>
                        <div class="contact-item-label">Oficina</div>
                        <div class="contact-item-val">Madrid, España</div>
                    </div>
                </div>
                <div class="contact-item">
                    <span class="contact-item-icon">🕐</span>
                    <div>
                        <div class="contact-item-label">Respuesta</div>
                        <div class="contact-item-val">Menos de 24 horas</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right: Form -->
        <div class="contact-form-wrap">
            <div class="form-title">Envíanos un mensaje</div>
            <div class="form-sub">// todos los campos con * son obligatorios</div>

            @if(session('success'))
            <div class="alert-success">
                <span>✓</span>
                <span>{{ session('success') }}</span>
            </div>
            @endif

            <form action="{{ route('contacto.store') }}" method="POST" novalidate>
                @csrf

                <div class="form-row">
                    <div class="form-group">
                        <label for="nombre">Nombre *</label>
                        <input
                            type="text"
                            id="nombre"
                            name="nombre"
                            placeholder="Tu nombre"
                            value="{{ old('nombre') }}"
                            autocomplete="name"
                        >
                        @error('nombre')
                            <div class="error-msg">⚠ {{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="tu@empresa.com"
                            value="{{ old('email') }}"
                            autocomplete="email"
                        >
                        @error('email')
                            <div class="error-msg">⚠ {{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="empresa">Empresa</label>
                    <input
                        type="text"
                        id="empresa"
                        name="empresa"
                        placeholder="Nombre de tu empresa"
                        value="{{ old('empresa') }}"
                    >
                </div>

                <div class="form-group">
                    <label for="servicio">Servicio de interés</label>
                    <select id="servicio" name="servicio">
                        <option value="">— Selecciona un servicio —</option>
                        <option value="generacion-texto"    {{ old('servicio') === 'generacion-texto'   ? 'selected' : '' }}>Generación de Texto</option>
                        <option value="vision-computadora"  {{ old('servicio') === 'vision-computadora' ? 'selected' : '' }}>Visión por Computadora</option>
                        <option value="automatizacion"      {{ old('servicio') === 'automatizacion'     ? 'selected' : '' }}>Automatización Inteligente</option>
                        <option value="chatbots"            {{ old('servicio') === 'chatbots'           ? 'selected' : '' }}>Chatbots Conversacionales</option>
                        <option value="analisis-predictivo" {{ old('servicio') === 'analisis-predictivo'? 'selected' : '' }}>Análisis Predictivo</option>
                        <option value="audio-voz"           {{ old('servicio') === 'audio-voz'          ? 'selected' : '' }}>Audio y Síntesis de Voz</option>
                        <option value="otro"                {{ old('servicio') === 'otro'               ? 'selected' : '' }}>Otro</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="mensaje">Mensaje *</label>
                    <textarea
                        id="mensaje"
                        name="mensaje"
                        placeholder="Cuéntanos tu proyecto, reto o pregunta..."
                    >{{ old('mensaje') }}</textarea>
                    @error('mensaje')
                        <div class="error-msg">⚠ {{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary form-submit">
                    Enviar mensaje →
                </button>
            </form>
        </div>

    </div>
</section>

@endsection
