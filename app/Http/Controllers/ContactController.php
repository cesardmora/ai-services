<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contacto');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre'  => 'required|min:2|max:100',
            'email'   => 'required|email',
            'empresa' => 'nullable|max:100',
            'servicio' => 'nullable|string',
            'mensaje' => 'required|min:10|max:2000',
        ], [
            'nombre.required'  => 'El nombre es obligatorio.',
            'nombre.min'       => 'El nombre debe tener al menos 2 caracteres.',
            'email.required'   => 'El email es obligatorio.',
            'email.email'      => 'Introduce un email válido.',
            'mensaje.required' => 'El mensaje es obligatorio.',
            'mensaje.min'      => 'El mensaje debe tener al menos 10 caracteres.',
        ]);

        // En producción aquí enviarías el email
        // Mail::to('info@aiservices.com')->send(new ContactMail($validated));

        return redirect()->route('contacto')->with('success', '¡Mensaje enviado! Nos pondremos en contacto contigo en menos de 24 horas.');
    }
}
