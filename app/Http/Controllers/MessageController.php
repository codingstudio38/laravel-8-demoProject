<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageEvents;
class MessageController extends Controller
{
    public function index(Request $request) {
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d H:i:s');
        $data = array('message'=>"hello || $date");
        event(new MessageEvents($data));
    }

    public function MyMessage(Request $request) {
      return view('admin.MyMessage');
    }
}
