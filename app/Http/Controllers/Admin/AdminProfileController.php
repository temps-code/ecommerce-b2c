<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    /**
     * Muestra la vista del perfil del administrador.
     */
    public function show()
    {
        $user = Auth::user();
        return view('admin.profile.show', compact('user'));
    }

    /**
     * Muestra el formulario de edición del perfil del administrador.
     */
    public function edit()
    {
        $user = Auth::user();
        return view('admin.profile.edit', compact('user'));
    }

    /**
     * Actualiza el perfil del administrador.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validación básica
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
            'current_password' => 'nullable'
        ]);

        // Si se intenta cambiar la contraseña, se debe verificar la contraseña actual y que la nueva sea diferente
        if ($request->filled('password')) {
            if (!$request->filled('current_password') || !Hash::check($request->current_password, $user->password)) {
                return redirect()->back()->withErrors([
                    'current_password' => 'La contraseña actual es incorrecta.'
                ])->withInput();
            }

            // Verificar que la nueva contraseña sea diferente de la actual
            if (Hash::check($request->password, $user->password)) {
                return redirect()->back()->withErrors([
                    'password' => 'La nueva contraseña debe ser diferente de la actual.'
                ])->withInput();
            }

            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.profile.show')->with('success', 'Perfil actualizado correctamente.');
    }
}
