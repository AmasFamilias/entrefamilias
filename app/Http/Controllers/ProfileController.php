<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    /**
     * Actualizar la imagen de perfil del usuario autenticado.
     */
    public function updateProfileImage(Request $request)
    {
        $request->validate([
            'profile_image' => 'nullable|image|max:2048', // Máximo 2 MB
        ]);

        $user = Auth::user();

        if ($request->hasFile('profile_image')) {
            // Eliminar la imagen anterior si existe
            if ($user->profile_image) {
                Storage::delete('public/profiles/' . $user->profile_image);
            }

            // Guardar la nueva imagen
            $imageName = time() . '.' . $request->file('profile_image')->extension();
            $request->file('profile_image')->storeAs('public/profiles', $imageName);

            // Actualizar el campo en la base de datos
            $user->profile_image = $imageName;
            $user->save();
        }

        return redirect()->back()->with('success', 'Imagen de perfil actualizada correctamente.');
    }

    public function deleteImage(Request $request)
    {
        $user = auth()->user();

        // Verifica si el usuario tiene una imagen y elimínala del almacenamiento
        if ($user->profile_image) {
            Storage::delete('profiles/' . $user->profile_image);
        }

        // Restablece la imagen al valor predeterminado
        $user->profile_image = null;
        $user->save();

        return back()->with('success', 'La imagen de perfil ha sido eliminada.');
    }
}
