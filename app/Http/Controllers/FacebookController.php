<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;


class FacebookController extends Controller
{
    public function LoginWithFacebook(Request $request){
      try {
      //   $request->session()->flush();
      //   $request->session()->regenerate();
         return Socialite::driver('facebook')->redirect();

      } catch (\Throwable $error) {
         throw $error;
      }

   }

 

   public function CallBackFromFacebook(Request $request){
      try {
        $user= Socialite::driver('facebook')->user();
        echo "FACEBOOK CALLBACK DATA<br>";
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
