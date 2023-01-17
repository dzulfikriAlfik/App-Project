<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
  public function listCustomer()
  {
    $data = [
      "list_customer" => User::where('role', 'customer')->get(),
    ];

    return view("customer.list", $data);
  }

  public function create()
  {
    $data = [];

    return view("customer.add", $data);
  }

  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'nama'     => 'required|max:50',
      'alamat'   => 'required',
      'email'    => 'required|email|unique:users,email',
      'logo'     => 'required|image|file|max:1024|mimes:jpg,jpeg,png',
      'telp'     => 'required|numeric|unique:users,telp',
      'username' => 'required|unique:users,username|min:6|max:16',
      'password' => 'required|min:6|max:16'
    ]);

    $validatedData['password']     = Hash::make($validatedData['password']);
    $validatedData['role']         = "customer";
    $validatedData['status_customer'] = "active";

    if ($logo = $request->file('logo')) {
      $fileName        = time() . "." . $logo->getClientOriginalExtension();
      $destinationPath = public_path('assets/img/customer');
      $logo->move($destinationPath, $fileName);

      $validatedData['logo_customer']   = $fileName;
    }

    User::create($validatedData);

    return redirect('/customer/list')->with('success', 'Customer baru berhasil ditambahkan!');
  }

  public function approve(User $user)
  {
    $user->update(["status_customer" => "active"]);

    return redirect('/customer/list')->with('success', 'Customer telah disetujui!');
  }

  public function edit(User $user)
  {
    $data = [
      "user"    => $user
    ];

    return view("customer.edit", $data);
  }

  public function update(Request $request, User $user)
  {
    $rules = [
      'nama'    => 'required|max:50',
      'alamat'  => 'required',
      'email'   => ['required', Rule::unique('users', 'email')->ignore($user->email, 'email'), 'email'],
      'telepon' => ['required', Rule::unique('users', 'telp')->ignore($user->telp, 'telp'), 'numeric'],
    ];

    if ($request->filled('password')) {
      $rules["password"] = 'min:6|max:16';
    }

    $validatedData = $request->validate($rules);

    if ($request->filled('password')) {
      $validatedData['password'] = Hash::make($validatedData['password']);
    }

    $user->update($validatedData);

    return redirect('/customer/list')->with('success', 'Data customer berhasil diubah!');
  }

  public function destroy(User $user)
  {
    $user->delete();

    return redirect('/customer/list')->with('success', 'Customer berhasil dihapus!');
  }
}
