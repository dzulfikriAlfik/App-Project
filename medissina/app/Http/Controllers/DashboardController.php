<?php

namespace App\Http\Controllers;

use App\Models\Masukan;
use Illuminate\Http\Request;
use App\Models\ProfileLembaga;

class DashboardController extends Controller
{
  //
  public function Dashboard()
  {
    return view("Dashboard", ["title" => "Dashboard"]);
  }

  public function Cms()
  {
    return redirect(url("/cms/dashboard"));
  }

  public function profile_lembaga()
  {
    $data = [
      "title"   => "Profile Lembaga",
      "lembaga" => ProfileLembaga::all()->first()
    ];

    return view("Superadmin.profile_lembaga", $data);
  }

  public function editProfileLembaga(Request $request)
  {
    $validatedData = $request->validate([
      'alamat'       => 'required',
      'no_hp'        => 'required',
      'email'        => 'required|email',
      'visi'         => 'required',
      'misi'         => 'required',
      'tentang_kami' => 'required',
      'sejarah'      => 'required',
    ]);

    ProfileLembaga::where('id', $request->id)
      ->update($validatedData);

    return redirect(url('/cms/profile_lembaga'))->with('success', 'Data Lembaga berhasil diubah');
  }

  public function sendMasukan(Request $request)
  {
    $data = [
      "name"    => $request->nama_lengkap,
      "email"   => $request->email,
      "subject" => $request->subject,
      "message" => $request->message
    ];

    $today = date("Y-m-d");

    // cek pesan masuk hari ini batasi 15 pesan
    $masukan = Masukan::select("*")
      ->where("created_date", $today)->get();

    if (count($masukan) > 15) {
      return redirect(url('/info/kontak'))->with('failed', 'Gagal mengirim pesan karena terlalu banyak pesan masuk hari ini. Silahkan coba lagi besok');
    }

    Masukan::create($data);

    return redirect(url('/info/kontak'))->with('success', 'Berhasil mengirimkan pesan');
  }
}
