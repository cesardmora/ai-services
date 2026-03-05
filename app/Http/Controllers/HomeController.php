<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $serviciosDestacados = [
            [
                'titulo'      => 'Generación de Texto con IA',
                'slug'        => 'generacion-texto',
                'descripcion' => 'Crea contenido, artículos y copy de marketing con modelos de lenguaje avanzados.',
                'icono'       => '✍️',
                'color'       => 'cyan',
            ],
            [
                'titulo'      => 'Visión por Computadora',
                'slug'        => 'vision-computadora',
                'descripcion' => 'Análisis y reconocimiento de imágenes en tiempo real con precisión empresarial.',
                'icono'       => '👁️',
                'color'       => 'violet',
            ],
            [
                'titulo'      => 'Automatización Inteligente',
                'slug'        => 'automatizacion',
                'descripcion' => 'Flujos de trabajo automatizados que aprenden y se adaptan a tu negocio.',
                'icono'       => '⚙️',
                'color'       => 'emerald',
            ],
        ];

        $stats = [
            ['valor' => '500+', 'etiqueta' => 'Proyectos entregados'],
            ['valor' => '98%', 'etiqueta' => 'Satisfacción de clientes'],
            ['valor' => '60ms', 'etiqueta' => 'Latencia promedio'],
            ['valor' => '24/7', 'etiqueta' => 'Soporte técnico'],
        ];

        return view('home', compact('serviciosDestacados', 'stats'));
    }
}
