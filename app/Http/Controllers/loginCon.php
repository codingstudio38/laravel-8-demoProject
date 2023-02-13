<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\register;
use Illuminate\Support\Facades\Hash;
use App\Models\personal_access_tokens;
use Illuminate\Support\Facades\DB;

class loginCon extends Controller
{
   public function register(Request $request)
   {   
        $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:admin_table',
        'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|digits:10|unique:admin_table',
        'password' => 'required|min:6|max:10'
        ],[ 
        "name.required" => "Name required.",
        "email.required" => "Email required.",
        "email.email" => "The email must be a valid email address.",
        "email.unique" => "The email already exists.",
        "phone.required" => "Phone no required.",
        "phone.regex" => "The phone no must be a valid phone number.",
        "phone.digits" => "The phone no must be 10 digit.",
        "password.required" => "Password required.",
        "password.min" => "Password greater than 6 digit.",
        "password.max" => "Password less than 10 digit.",
    ]);
   
     //return $request->all();
        $new = new register;
        $new->name = $request->name;
        $new->email = $request->email;
        $new->phone = $request->phone;
        $new->password = Hash::make($request->password);
        if($new->save()){
                return redirect('login')->with('massage','Account Successfully Created.. Please Login..');
            } else {
                return redirect('register')->with('massage','Failed To Create Account..!!');
            }
   }
  
   public function login(Request $request)
   {
       $user= register::where('email', $request->email)->first();
            if (!$user) {
                return redirect('login')->with('wrongsms','These credentials do not match our records.');
            } elseif(!Hash::check($request->password, $user->password)) {
                return redirect('login')->with('wrongsms','Login Failed..');
            } else {
               // $token = $user->createToken('my-app-token')->plainTextToken;
                $token = $user->id." my-app-token";
                $hash_token = Hash::make($token);
                $new = new personal_access_tokens;
                $new->tokenable_type = 'App\Models\register';
                $new->tokenable_id = $user->id;
                $new->name = $token;
                $new->token = $hash_token; 
                $new->save();
                $request->session()->put('admin_name',$user->name);
                $request->session()->put('admin_email',$user->email);
                $request->session()->put('admin_id',$user->id);
                $request->session()->put('access_tokens',$hash_token);
                $request->session()->put('access_token_id', $new->id);
                return redirect('admin/adminHome')->with('massage','Successfully Logged In..!!'); 
            } 
   }
 
    public function logout(Request $r){
        personal_access_tokens::where('id',session()->get('access_token_id'))->delete();
        $r->session()->pull('admin_id', null);
        $r->session()->pull('admin_email', null);
        $r->session()->pull('admin_name', null);
        $r->session()->pull('access_tokens', null);
        $r->session()->pull('access_token_id', null);
        return redirect('login')->with('massage','Admin Successfully Logged Out.');
    }
  
   public function viewadminHome()
   {
        $data = register::where('id',session()->get('admin_id'))->first();
        return view('admin.adminHome',compact('data'));
   }
   public function viewadminAbout()
   { 
    // return DB::table('contacts')->orderBy('id','DESC')->get();
    // return DB::table('contacts')->count();
    // return DB::table('users')->select('name', 'email as user_email')->get();
    // return DB::table('contacts')
    //          ->select(DB::raw('count(email) total_duplicate, email'))
    //          ->groupBy('email')
    //          //->havingRaw('count(email) > ?', [1])
    //          ->orderBy('id','DESC')
    //          ->get();
    // return DB::table('contacts')->where('email', "chhabi.vanik@gmail.com")->where('phone', "1234567890")->get();
    // return DB::table('contacts')->whereNotBetween('created_at', ["2021-11-09","2021-11-14"])->get();
    // return DB::table('contacts')->whereBetween('created_at', ["2021-11-09","2021-11-14"])->get();
    // return DB::table('contacts')->whereIn('id', [1, 2, 3])->get();
    // return DB::table('contacts')->insert([
    //     'email'=>"vk123@email.com",
    //     'phone'=>"1234567890",
    //     '_token'=>"b9l8NlvZvHrsZFsmCLRIKOSkhWsi6GYlD9nU27a7",
    //     'des'=>"des",
    //     'fname'=>"fname",
    //     'lname'=>"lname",
    //     'updated_at'=>"1",
    //     'created_at'=>"1"
    // ]);
    // return DB::table('contacts')->find(1);
    return DB::table('contacts')->whereNotIn('id', [1, 2, 3])->get();
    // return DB::table('contacts')->where('email', "mondalbidyut38@gmail.com")->count();
   }


   
   
}
