<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{

    public function listAdmin()
    {
        $user = auth()->user();

        $data = [
            "user"       => $user,
            "list_admin" => User::where('role', 'admin')->where('id', '!=', $user->id)->get(),
        ];

        return view("admin.list-admin", $data);
    }

    public function addAdmin()
    {
        $data = [];

        return view("admin.add", $data);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama'     => 'required|max:50',
            'alamat'   => 'required',
            'email'    => 'required|email|unique:users,email',
            'telp'     => 'required|numeric|unique:users,telp',
            'username' => 'required|unique:users,username|min:6|max:16',
            'password' => 'required|min:6|max:16'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['role']     = "admin";

        User::create($validatedData);

        return redirect('/admin/list')->with('success', 'Admin baru berhasil ditambahkan!');
    }

    public function edit(User $user)
    {
        $data = [
            "user"    => $user
        ];

        return view("admin.edit", $data);
    }

    public function update(Request $request, User $user)
    {
        $rules = [
            'nama'     => 'required|max:50',
            'alamat'   => 'required',
            'email'    => ['required', Rule::unique('users', 'email')->ignore($user->email, 'email'), 'email'],
            'telp'     => ['required', Rule::unique('users', 'telp')->ignore($user->telp, 'telp'), 'numeric'],
            'username' => ['required', Rule::unique('users', 'username')->ignore($user->username, 'username'), 'min:6', 'max:16']
        ];

        if ($request->filled('password')) {
            $rules["password"] = 'sometimes|min:6|max:16';
        }

        $validatedData = $request->validate($rules);

        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }

        $user->update($validatedData);

        return redirect('/admin/list')->with('success', 'Data admin berhasil diubah!');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/admin/list')->with('success', 'Admin berhasil dihapus!');
    }
}
