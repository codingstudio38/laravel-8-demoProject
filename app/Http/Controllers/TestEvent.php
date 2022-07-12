<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\PostCreated;

class TestEvent extends Controller
{
    public function index()
   {
       $data = "Email has been successfully send. Check your inbox.";
      event(new PostCreated($data));
      // php artisan make:listener NotifyUser --event=PostCreated
   }
}
