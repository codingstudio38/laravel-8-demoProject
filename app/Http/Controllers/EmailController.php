<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Message;
use Swift_SmtpTransport;
use Swift_Mailer;
use Swift_Message;


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
       try { 
        $data = [
            'name' =>'bidyut',
            'data' =>'nis main'
        ];
        $user['to'] = 'mondalbidyut38@gmail.com';
        $user['subject'] = 'NIS MAIL TEST';
        Mail::send('mail',$data, function(Message $messages) use ($user){
            // $messages->setStreamOptions([
            //     'ssl' => [
            //         'verify_peer' => true,
            //         'verify_peer_name' => true,
            //         'allow_self_signed' => false,
            //         'cafile' => storage_path('mail-pem/fullchain-otprelay-28-03-2024.pem'), // Path to your PEM file
            //     ],
            // ]);
            $messages->to($user['to']);
            $messages->subject($user['subject']);
        }); 
       dd("Email has been successfully send.");
       } catch (\Throwable $error) {
        return response()->json([
            'message' => $error->getMessage(),
            'status' => 0,
        ]);
    }
    }




public function NicMailTest1(Request $r)
{
    try {
        $data = [
            'name' =>'bidyut',
            'data' =>'nis main'
        ];
        $user['to'] = 'mondalbidyut38@gmail.com';
        $user['subject'] = 'NIS MAIL TEST';
        // Create a new Swift SMTP transport with custom SSL options
        $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
            ->setUsername('onlinemessages0001@gmail.com')
            ->setPassword('fatjvdeebvbyezrg')
            ->setStreamOptions([
                'ssl' => [
                    'verify_peer' => true,
                    'verify_peer_name' => true,
                    'allow_self_signed' => false,
                    'cafile' => storage_path('mail-pem/fullchain-otprelay-28-03-2024.pem'), // Path to your PEM file
                ],
            ]);

        // Create a new Swift Mailer instance with the custom transport
        $mailer = new Swift_Mailer($transport);

        // Create a Swift Message instance
        $message = new Swift_Message($user['subject']);
        $message->setFrom(['onlinemessages0001@gmail.com' => 'Online']);
        $message->setTo([$user['to']]);
        $message->setBody(view('mail',$data)->render(), 'text/html');

        // Use the custom Swift Mailer instance to send the email
        $mailer->send($message);

        // Assuming success if no exceptions are thrown
        return response()->json([
            'message' => 'Email sent successfully',
            'status' => 1,
        ]);
    } catch (\Throwable $error) {
        return response()->json([
            'message' => $error->getMessage(),
            'status' => 0,
        ]);
    }
}









}   

?>