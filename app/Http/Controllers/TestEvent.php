<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\PostCreated;
use App\Service\TestServiceInterface;
use App\Models\register;
class TestEvent extends Controller
{
    public function index(TestServiceInterface $testservice, Request $reqest)
   { 
       $data = "Email has been successfully send. Check your inbox.";
     $t=event(new PostCreated($data));
     $testservice->TestThis();
     $data = register::first();
     //echo $data['password'];
    return $data;
      // php artisan make:listener NotifyUser --event=PostCreated
   }
   
   public function TestService(TestServiceInterface $testservice){
// 1-php artisan make:provider NAME
// 2-php artisan optimize


   }
}