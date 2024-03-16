<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\loginCon; 
use App\Http\controllers\multiplesDatabase; 
use  App\Http\controllers\ajax; 
use  App\Http\controllers\TestEvent; 
use  App\Http\controllers\EmailController; 
use  App\Http\controllers\GoogleController; 
use  App\Http\controllers\FacebookController; 
use  App\Http\controllers\MessageController; 

/* 
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
 
Route::fallback(function(){
  return redirect()->back();
});

Route::get('/', function () {
    return view('index');
}); 
Route::get('/about', function () {
    return view('about');
});
  
Route::get("nic-mail-test", [EmailController::class, 'NicMailTest']);

Route::get("login-with-google", [GoogleController::class, 'LoginWithGoogle']);
Route::get("google-callback", [GoogleController::class, 'CallBackFromGoogle']); 
 
 
Route::get("login-with-facebook", [FacebookController::class, 'LoginWithFacebook']);
Route::get("facebook-callback", [FacebookController::class, 'CallBackFromFacebook']); 
 

Route::group(['middleware'=>'isLoggedIn'],function() {
Route::get('login', function () { return view('admin_login'); }); 
Route::get('register', function () { return view('admin_register'); });
Route::post("register", [loginCon::class, 'register'])->name('register');
Route::post("login", [loginCon::class, 'login'])->name('login');


});

         
 
Route::group(['prefix'=>'admin/','middleware'=>'notLoggedIn'],function() {

Route::get("", [loginCon::class, 'viewadminHome']);
Route::get("adminHome", [loginCon::class, 'viewadminHome']);
Route::get("adminAbout", [loginCon::class, 'viewadminAbout']);
Route::get("adminlogout", [loginCon::class, 'logout']);
Route::get("location-works", [loginCon::class, 'locationWorks']);
// Route::controller(loginCon::class)->group(function () {
//     Route::get('', '');
//     Route::get('', '');
//     Route::get('', '');
//     Route::get('', '');
// });     
Route::post("/sendemail", [EmailController::class, 'index']);
Route::post("/viewdata", [ajax::class, 'index']);
Route::get("/event-listener", [TestEvent::class, 'index']); 
Route::get("/message-test", [MessageController::class, 'index']); 
Route::get("/message", [MessageController::class, 'MyMessage']); 
Route::get("/publicchannel", [MessageController::class, 'publicchannel']); 

});
   
Route::group(['prefix'=>'data/','middleware'=>'customheadercheck'],function() {
Route::get("multiDatabase", [multiplesDatabase::class, 'index']);
});
 