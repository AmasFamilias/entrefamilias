<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Maneja la redirección de forma segura
        $redirectUrl = $request->input('redirect');
        
        // Validar que redirect es seguro (solo URLs relativas o rutas de la aplicación)
        if ($redirectUrl) {
            // Si es una URL absoluta externa, rechazarla
            if (filter_var($redirectUrl, FILTER_VALIDATE_URL) && parse_url($redirectUrl, PHP_URL_HOST) !== null) {
                $redirectUrl = null;
            }
            // Si contiene caracteres peligrosos, rechazarla
            if (preg_match('/[<>"\']/', $redirectUrl)) {
                $redirectUrl = null;
            }
        }
        
        // Si no hay redirect válido o es null, usar intended con fallback seguro
        if (!$redirectUrl) {
            return redirect()->intended(route('vacantes.index', absolute: false));
        }
        
        // Validar que la ruta existe y es relativa
        try {
            return redirect($redirectUrl);
        } catch (\Exception $e) {
            return redirect()->route('vacantes.index');
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
