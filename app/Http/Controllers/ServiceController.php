<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    private function getAllServices(): array
    {
        return [
            [
                'titulo'       => 'Generación de Texto con IA',
                'slug'         => 'generacion-texto',
                'descripcion'  => 'Crea contenido, artículos y copy de marketing con modelos de lenguaje avanzados.',
                'detalle'      => 'Nuestro servicio de generación de texto utiliza los modelos de lenguaje más avanzados del mercado para crear contenido de alta calidad en segundos. Perfecto para blogs, redes sociales, emails y mucho más.',
                'icono'        => '✍️',
                'color'        => 'cyan',
                'caracteristicas' => ['GPT-4 y Claude integrados', 'Soporte multiidioma', 'Tono personalizable', 'API REST disponible'],
                'precio'       => 'Desde €49/mes',
            ],
            [
                'titulo'       => 'Visión por Computadora',
                'slug'         => 'vision-computadora',
                'descripcion'  => 'Análisis y reconocimiento de imágenes en tiempo real con precisión empresarial.',
                'detalle'      => 'Detecta objetos, personas, textos y anomalías en imágenes y vídeo en tiempo real. Ideal para control de calidad, seguridad y análisis de inventario.',
                'icono'        => '👁️',
                'color'        => 'violet',
                'caracteristicas' => ['Detección de objetos', 'Reconocimiento facial', 'OCR avanzado', 'Procesamiento en batch'],
                'precio'       => 'Desde €99/mes',
            ],
            [
                'titulo'       => 'Automatización Inteligente',
                'slug'         => 'automatizacion',
                'descripcion'  => 'Flujos de trabajo automatizados que aprenden y se adaptan a tu negocio.',
                'detalle'      => 'Automatiza procesos repetitivos con agentes de IA que entienden el contexto y toman decisiones. Conecta con tus herramientas existentes mediante integraciones nativas.',
                'icono'        => '⚙️',
                'color'        => 'emerald',
                'caracteristicas' => ['Flujos no-code', 'Integraciones nativas', 'Aprendizaje continuo', 'Monitorización en tiempo real'],
                'precio'       => 'Desde €149/mes',
            ],
            [
                'titulo'       => 'Chatbots Conversacionales',
                'slug'         => 'chatbots',
                'descripcion'  => 'Asistentes virtuales que resuelven dudas, captan leads y fidelizan clientes.',
                'detalle'      => 'Despliega un chatbot entrenado con tu base de conocimiento en minutos. Sin código, con integración directa en tu web, WhatsApp o Telegram.',
                'icono'        => '💬',
                'color'        => 'amber',
                'caracteristicas' => ['Entrenamiento personalizado', 'Omnicanal', 'Escalado humano', 'Analítica avanzada'],
                'precio'       => 'Desde €79/mes',
            ],
            [
                'titulo'       => 'Análisis Predictivo',
                'slug'         => 'analisis-predictivo',
                'descripcion'  => 'Anticipa tendencias y toma decisiones informadas con modelos de predicción.',
                'detalle'      => 'Modelos de machine learning entrenados con tus datos históricos para predecir ventas, churn, demanda y cualquier KPI crítico para tu empresa.',
                'icono'        => '📊',
                'color'        => 'rose',
                'caracteristicas' => ['Modelos a medida', 'Dashboards en tiempo real', 'Alertas automáticas', 'Exportación de datos'],
                'precio'       => 'Desde €199/mes',
            ],
            [
                'titulo'       => 'Audio e Síntesis de Voz',
                'slug'         => 'audio-voz',
                'descripcion'  => 'Transcripción, traducción y síntesis de voz de calidad profesional.',
                'detalle'      => 'Convierte audio a texto, texto a voz natural y traduce en tiempo real. Ideal para podcasts, atención al cliente y accesibilidad.',
                'icono'        => '🎙️',
                'color'        => 'indigo',
                'caracteristicas' => ['Transcripción en 50+ idiomas', 'Voces clonadas', 'Traducción en tiempo real', 'SDK multiplataforma'],
                'precio'       => 'Desde €59/mes',
            ],
        ];
    }

    public function index()
    {
        $servicios = $this->getAllServices();
        return view('servicios.index', compact('servicios'));
    }

    public function show(string $slug)
    {
        $servicios = $this->getAllServices();
        $servicio  = collect($servicios)->firstWhere('slug', $slug);

        if (!$servicio) {
            abort(404);
        }

        $otros = collect($servicios)->where('slug', '!=', $slug)->take(3)->values()->toArray();

        return view('servicios.show', compact('servicio', 'otros'));
    }
}
