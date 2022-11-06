<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StrukturController extends Controller
{

  public function index()
  {
    $users = User::where("user_role", "!=", "superadmin")
      ->orderBy("user_role_order", "ASC")
      ->get();

    $data = [
      "title" => "Struktur Organisasi",
      "users" => $users
    ];

    return view("Superadmin.struktur.index", $data);
  }

  public function add()
  {
    $data = [
      "title" => "Tambah Staff"
    ];

    return view("Superadmin.struktur.add", $data);
  }

  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'user_name'  => 'required',
      'user_image' => 'image|file|max:1024',
      'user_role'  => 'required'
    ], ServicesController::messageValidation());

    if ($request->file('user_image')) {
      $validatedData['user_image'] = $request->file('user_image')->store('staff');
    }

    $validatedData['user_role_order'] = self::getRoleOrder($request->user_role);
    $validatedData['created_by']      = $request->user_id;
    $validatedData['updated_by']      = $request->user_id;

    User::create($validatedData);

    return redirect(url('/cms/struktur'))->with('success', 'Data staff berhasil ditambahkan');
  }

  public static function getRoleOrder($userRole)
  {
    if ($userRole === "kepala-sekolah") return 1;
    if ($userRole === "bendahara") return 2;
    if ($userRole === "guru") return 3;
    if ($userRole === "tata-usaha") return 4;
    if ($userRole === "operator") return 5;
  }

  public function show(User $user)
  {
    $data = [
      "title" => "Detail Staff",
      "user"  => $user
    ];

    return view("Superadmin.struktur.detail", $data);
  }

  public function edit(User $user)
  {
    $data = [
      "title" => "Edit Staff",
      "user"  => $user,
      "roles" => ["kepala-sekolah", "bendahara", "guru", "tata-usaha", "operator"]
    ];

    return view("Superadmin.struktur.edit", $data);
  }

  public function update(Request $request, $id)
  {
    // dd($request);
    $validatedData = $request->validate([
      'user_name'  => 'required',
      'user_image' => 'image|file|max:1024',
      'user_role'  => 'required'
    ], ServicesController::messageValidation());

    if ($request->file('user_image')) {
      if ($request->old_image) {
        Storage::delete($request->old_image);
      }
      $validatedData['user_image'] = $request->file('user_image')->store('staff');
    }

    $validatedData['user_role_order'] = self::getRoleOrder($request->user_role);
    $validatedData['updated_date']    = date("Y-m-d H:i:s");
    $validatedData['updated_by']      = $request->user_id;

    // dd($validatedData);
    User::where("user_id", $request->staff_id)->update($validatedData);

    return redirect(url('/cms/struktur'))->with('success', 'Data staff berhasil diubah');
  }

  public function destroy($id)
  {
    $user = User::where("user_id", $id)->get()->first();
    Storage::delete($user->user_image);
    User::where("user_id", $id)->delete();

    return redirect(url('/cms/struktur'))->with('success', 'Data staff berhasil dihapus');
  }
}
