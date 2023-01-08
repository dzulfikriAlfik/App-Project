<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class MitraController extends Controller
{
  public function listMitra()
  {
    $data = [
      "list_mitra" => User::where('role', 'mitra')->get(),
    ];

    return view("mitra.list", $data);
  }

  public function create()
  {
    $data = [];

    return view("mitra.add", $data);
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
    $validatedData['role']         = "mitra";
    $validatedData['status_mitra'] = "active";

    if ($logo = $request->file('logo')) {
      $fileName        = time() . "." . $logo->getClientOriginalExtension();
      $destinationPath = public_path('assets/img/mitra');
      $logo->move($destinationPath, $fileName);

      $validatedData['logo_mitra']   = $fileName;
    }

    User::create($validatedData);

    return redirect('/mitra/list')->with('success', 'Mitra baru berhasil ditambahkan!');
  }

  public function approve(User $user)
  {
    $user->update(["status_mitra" => "active"]);

    return redirect('/mitra/list')->with('success', 'Mitra telah disetujui!');
  }

  public function edit(User $user)
  {
    $data = [
      "user"    => $user
    ];

    return view("mitra.edit", $data);
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
      $rules["password"] = 'min:6|max:16';
    }

    $logo = $request->file('logo');

    if ($logo) {
      $rules["logo"] = 'required|image|file|max:1024|mimes:jpg,jpeg,png';
    }

    $validatedData = $request->validate($rules);

    if ($request->filled('password')) {
      $validatedData['password'] = Hash::make($validatedData['password']);
    }

    if ($logo) {
      $oldfile = public_path("assets/img/mitra/{$user->logo_mitra}");
      File::delete($oldfile);

      $fileName        = time() . "." . $logo->getClientOriginalExtension();
      $destinationPath = public_path('assets/img/mitra');
      $logo->move($destinationPath, $fileName);

      $validatedData['logo_mitra']   = $fileName;
    }

    $user->update($validatedData);

    return redirect('/mitra/list')->with('success', 'Data mitra berhasil diubah!');
  }

  public function destroy(User $user)
  {
    $oldfile = public_path("assets/img/mitra/{$user->logo_mitra}");
    File::delete($oldfile);

    $user->delete();

    return redirect('/mitra/list')->with('success', 'Mitra berhasil dihapus!');
  }

  public function chatUser()
  {
    $user = auth()->user();

    $data = [
      "user"       => $user,
      "mitra"      => $user,
      "chat_mitra" => Chat::where("id_mitra", auth()->user()->id)->orderBy("id_chat", "ASC")->get()
    ];

    return view("chat.mitra", $data);
  }

  public function sendChat()
  {
    $user = auth()->user();

    $data = [
      "user"  => $user,
      "mitra" => $user,
    ];

    return view("chat.send", $data);
  }

  public function storeChat(Request $request)
  {
    $userId = auth()->user()->id;

    $validatedData = $request->validate([
      'chat' => 'required',
    ]);

    $validatedData["id_admin"] = null;
    $validatedData["id_mitra"] = $userId;

    Chat::create($validatedData);

    return redirect("/chat")->with('success', 'Chat berhasil ditambahkan!');
  }

  public function deleteChat(Chat $chat, User $user)
  {
    $chat->delete();

    return redirect("/chat")->with('success', 'Chat berhasil dihapus!');
  }
}
