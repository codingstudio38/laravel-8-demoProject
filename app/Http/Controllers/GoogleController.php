<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\register;
use Illuminate\Support\Facades\Hash;
use App\Models\personal_access_tokens;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;


class GoogleController extends Controller
{ 
 
 
   public function LoginWithGoogle(Request $request){
      try {
       
         return Socialite::driver('google')->redirect();

      } catch (\Throwable $error) {
         throw $error;
      }

   }


 
   public function CallBackFromGoogle(Request $request){
      try {
      //   $request->session()->flush();
      //   $request->session()->regenerate();
        $user= Socialite::driver('google')->user();
        echo "GOOGLE CALLBACK DATA<br>";
        echo "<pre>";
        print_r($user);
        echo "</pre>";




      } catch (\Throwable $error) {
        echo "<pre>";
        dd($error);
        echo "</pre>";
      }


   }


}
