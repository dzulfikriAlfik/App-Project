<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use File;

class AdminController extends Controller
{
  public function companyProfile()
  {
    $data = [
      "company" => CompanyProfile::all()->first(),
    ];

    return view("admin.company-profile", $data);
  }

  public function updateCompanyProfile(Request $request, CompanyProfile $company)
  {
    $validatedData = $request->validate([
      'company_name' => 'required|max:100',
      'address'      => 'required',
      'telp'         => 'required|numeric',
      'email'        => 'required|email',
      'logo'         => 'image|file|max:1024|mimes:jpg,jpeg,png',
      'sejarah'      => 'required',
      'visi'         => 'required',
      'misi'         => 'required',
    ]);

    $logo = $request->file('logo');

    if ($logo) {
      $oldfile = public_path("assets/img/logo/{$company->logo}");
      File::delete($oldfile);

      $fileName        = uniqid() . "." . $logo->getClientOriginalExtension();
      $destinationPath = public_path('assets/img/logo');
      $logo->move($destinationPath, $fileName);

      $validatedData['logo'] = $fileName;
    }

    $company->update($validatedData);

    return redirect('/admin/company-profile')->with('success', 'Data perusahaan berhasil diubah!');
  }

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
