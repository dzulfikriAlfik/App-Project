<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
   //
   public function Users()
   {
      return view('Superadmin.Users', ["title" => 'Users']);
   }

   public function Profile()
   {
      return view("user.UserProfile", ["title" => "User Profile"]);
   }

   public function testupload()
   {
      // echo "Test";
      // die;
      if (isset($_POST['image'])) {
         $data = $_POST['image'];

         $image_array_1 = explode(";", $data);

         $image_array_2 = explode(",", $image_array_1[1]);

         $data = base64_decode($image_array_2[1]);

         $image_name = asset('assets/images/upload/') . time() . '.png';

         file_put_contents($image_name, $data);

         echo $image_name;
      }
   }
}
