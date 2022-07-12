<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\register;
use App\Models\myblogregister;

class multiplesDatabase extends Controller
{
    function index(){
        // $dataF= DB::table('admin_table')->get();
        // $dataS= DB::connection('mysql_angular12')->table('myblog_register_tbl')->get();
 
        $dataF=register::all();
        $dataS=myblogregister::all();
        return response()->json([
            'Firstdata'=>$dataF,
            'Seconddata'=>$dataS,
        ]);
        //   $data = DB::table('galleries')
        //           ->select('*')
        //           ->join('admin_table', function ($join) {
        //                $join->on('galleries.user_id', '=', 'admin_table.id')->groupBy('galleries.user_id'); 
        //            })
        //           ->where('galleries.user_id','!=', null)
        //           ->get();

// $data = DB::select("SELECT * FROM `admin_table` INNER JOIN `galleries` ON admin_table.id=galleries.user_id GROUP BY galleries.user_id");


//                   echo "<pre>";
//                   print_r( $data );
    } 
     public function damo(Type $var = null)
         {
             # code...
         }
}
