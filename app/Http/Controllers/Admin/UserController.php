<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // Se muestran solo los usuarios que no sean administradores
        $query = User::where('role', '!=', 'admin');

        // Filtrado por búsqueda (por nombre o email)
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        // Filtrado por estado
        if ($request->filled('status')) {
            if ($request->status == 'active') {
                $query->where('is_active', true);
            } elseif ($request->status == 'inactive') {
                $query->where('is_active', false);
            }
        }

        $users = $query->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        // Validación con confirmación de contraseña
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $data['role'] = 'client'; // Usuario normal
        $data['is_active'] = true;
        User::create($data);

        return redirect()->route('admin.users.index')
                         ->with('success', 'El usuario se ha creado correctamente.');
    }

    public function edit(User $user)
    {
        if ($user->role === 'admin') {
            return redirect()->route('admin.users.index')
                             ->with('error', 'No se puede editar un usuario administrador.');
        }
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // Verifica que el usuario no sea administrador
        if ($user->role === 'admin') {
            return redirect()->route('admin.users.index')
                            ->with('error', 'No se puede actualizar un usuario administrador.');
        }

        // Validación básica para nombre y email
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $data = $request->only('name', 'email');

        // Si se desea cambiar la contraseña, se requiere la nueva contraseña con confirmación
        if ($request->filled('new_password')) {
            $request->validate([
                'new_password' => 'required|min:6|confirmed',
            ]);

            $data['password'] = bcrypt($request->new_password);
        }

        $user->update($data);

        return redirect()->route('admin.users.index')
                        ->with('success', 'El usuario se ha actualizado correctamente.');
    }

    public function destroy(User $user)
    {
        if ($user->role === 'admin') {
            return redirect()->route('admin.users.index')
                             ->with('error', 'No se puede dar de baja un usuario administrador.');
        }

        $user->update(['is_active' => false]);

        return redirect()->route('admin.users.index')
                         ->with('success', 'El usuario se ha dado de baja correctamente.');
    }

    public function reactivate($id)
    {
        $user = User::findOrFail($id);

        if ($user->role === 'admin') {
            return redirect()->route('admin.users.index')
                             ->with('error', 'No se puede reactivar un usuario administrador.');
        }

        $user->update(['is_active' => true]);

        return redirect()->route('admin.users.index')
                         ->with('success', 'El usuario se ha reactivado correctamente.');
    }
}
