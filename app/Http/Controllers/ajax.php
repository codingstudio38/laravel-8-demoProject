<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\register;
class ajax extends Controller 
{
   public function index(Request $r){
        if($r->email==null){
            return response()->json([
            'status' => 400,
            'massage' => 'invalid email id..!!',
            ]);
        } else {
            $data = register::where('email', $r->email)->get();
            if($data==null){
                return response()->json([
                'status' => 400,
                'massage' => 'Failed To Fatched..',
                ]);
            } else {
                return response()->json([
                'Alldata' =>$data,
                'status' => 200,
                'massage' => 'Records Successfully Fatched..',
                ]);
            }
        }
   }
}
