<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class SupplierController extends Controller
{
  public function listSupplier()
  {
    $data = [
      "list_supplier" => User::where('role', 'supplier')->get(),
    ];

    return view("supplier.list", $data);
  }

  public function create()
  {
    $data = [];

    return view("supplier.add", $data);
  }

  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'nama'     => 'required|max:50',
      'alamat'   => 'required',
      'email'    => 'required|email|unique:users,email',
      'telepon'  => 'required|numeric|unique:users,telepon',
      'password' => 'required|min:6|max:16'
    ]);

    $validatedData['password'] = Hash::make($validatedData['password']);
    $validatedData['role']     = "supplier";

    User::create($validatedData);

    return redirect('/supplier/list')->with('success', 'Supplier baru berhasil ditambahkan!');
  }

  public function approve(User $user)
  {
    $user->update(["status_supplier" => "active"]);

    return redirect('/supplier/list')->with('success', 'Supplier telah disetujui!');
  }

  public function edit(User $user)
  {
    $data = [
      "user"    => $user
    ];

    return view("supplier.edit", $data);
  }

  public function update(Request $request, User $user)
  {
    $rules = [
      'nama'     => 'required|max:50',
      'alamat'   => 'required',
      'email'    => ['required', Rule::unique('users', 'email')->ignore($user->email, 'email'), 'email'],
      'telepon'  => ['required', Rule::unique('users', 'telepon')->ignore($user->telepon, 'telepon'), 'numeric']
    ];

    if ($request->filled('password')) {
      $rules["password"] = 'min:6|max:16';
    }

    $validatedData = $request->validate($rules);

    if ($request->filled('password')) {
      $validatedData['password'] = Hash::make($validatedData['password']);
    }

    $user->update($validatedData);

    return redirect('/supplier/list')->with('success', 'Data supplier berhasil diubah!');
  }

  public function destroy(User $user)
  {
    $user->delete();

    return redirect('/supplier/list')->with('success', 'Supplier berhasil dihapus!');
  }
}
