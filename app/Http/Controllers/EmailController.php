<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class EmailController extends Controller
{
    public function index(Request $r){
        //rtcvpztfeqnmfwkm
        //@password@123
        $r->validate([
        'name' => 'required',
        'email' => 'required|email',
        'subject' => 'required|min:6',
        'message' => 'required|min:6'
        ]);
        $data = [
            'name' =>$r->name,
            'data' =>$r->message
        ];
        $user['to'] = $r->email;
        $user['subject'] = $r->subject;
        Mail::send('mail',$data, function($messages) use ($user){
            $messages->to($user['to']);
            $messages->subject($user['subject']);
        }); 
        return "Email has been successfully send.";
    }

      public function NicMailTest(Request $r){
        //rtcvpztfeqnmfwkm
        //@password@123
        
        $data = [
            'name' =>'bidyut',
            'data' =>'nis main'
        ];
        $user['to'] = 'mondalbidyut38@gmail.com';
        $user['subject'] = 'NIS MAIL TEST';
        return Mail::send('mail',$data, function($messages) use ($user){
            $messages->to($user['to']);
            $messages->subject($user['subject']);
        }); 
        return "Email has been successfully send.";
    }

}   

?>