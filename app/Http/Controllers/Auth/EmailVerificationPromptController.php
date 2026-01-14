<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
    public function __invoke(Request $request): RedirectResponse|View
    {
        // Si el email ya está verificado, redirigir al dashboard
        if ($request->user()->hasVerifiedEmail()) {
            // Limpiar cualquier URL intended previa para evitar redirecciones no deseadas
            $request->session()->forget('url.intended');
            
            // Si hay un mensaje de registro exitoso, limpiarlo antes de redirigir
            if (session('status') === 'registered-successfully') {
                return redirect()
                    ->route('vacantes.index')
                    ->with('verified', 'Tu cuenta ha sido verificada exitosamente.');
            }
            
            // Usar route directo en lugar de intended para evitar capturar URLs previas
            return redirect()->route('vacantes.index');
        }
        
        // Si el email no está verificado, mostrar la página de verificación
        // Asegurarse de limpiar cualquier URL intended previa
        $request->session()->forget('url.intended');
        
        return view('auth.verify-email');
    }
}
