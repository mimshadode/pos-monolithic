<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class RoleWebController extends Controller
{
    public function index(): View
    {
        $roles = Role::query()->orderBy('kode_role')->get();

        return view('roles.index', compact('roles'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'kode_role' => ['required', 'string', 'max:50', 'unique:roles,kode_role'],
            'nama_role' => ['required', 'string', 'max:100'],
            'keterangan' => ['nullable', 'string', 'max:255'],
        ]);

        Role::create($data);

        return redirect()->route('roles.index')->with('status', 'Role berhasil dibuat.');
    }

    public function update(Request $request, Role $role): RedirectResponse
    {
        $data = $request->validate([
            'kode_role' => [
                'required',
                'string',
                'max:50',
                Rule::unique('roles', 'kode_role')->ignore($role->id_role, 'id_role'),
            ],
            'nama_role' => ['required', 'string', 'max:100'],
            'keterangan' => ['nullable', 'string', 'max:255'],
        ]);

        $role->update($data);

        return redirect()->route('roles.index')->with('status', 'Role berhasil diperbarui.');
    }

    public function destroy(Role $role): RedirectResponse
    {
        $role->delete();

        return redirect()->route('roles.index')->with('status', 'Role berhasil dihapus.');
    }
}
