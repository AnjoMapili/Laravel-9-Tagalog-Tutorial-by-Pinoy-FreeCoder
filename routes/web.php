<?php

use App\Http\Controllers\UserController;

use App\Http\Controllers\StudentController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// == Types of Routes == //

//-- Route::get(); --//
//-- Route::post(); --//
//-- Route::put(); --//
//-- Route::patch(); --//
//-- Route::delete(); --//
//-- Route::options(); --//


// == Types with Routes with function == //

// Route::match(['get','post'],'/',function(){
// return "POST and GET is allowed";
// });

// Route::any('/welcome',function(){
// return 'welcome';
// });

/* Pwede mo tong gawin if wala naman tayong inaasahan na data from user */

// Route::view('/welcome','welcome');

// /* Redirecting */
// Route::get('/',function(){
// return 'redirected';
// });

// Route::redirect('/welcome','/');

// Route::any('/',function(){
// return 'Welcome!';
// });

// Route::get('/users',function(Request $request){
// return null;
// });

/* dd means Die & Dump ung baga ito yong parang console. */
// Route::get('/users',function(Request $request){
// dd($request);
// });
// Route::get('/get-text',function(){
// return response('Hello PinoyFreeCoder', 200)
//             ->header('Content-Type','text/plain');
// });
// Route::get('/user/{id}/{group}',function($id,$group){
// return response($id."-".$group,200);
// });
// Route::get('/request-jason',function(){
// return response()->json(['name' => 'PinoyFreeCoder','age' => '22']);
// });

// Route::get('/request-download',function(){
// $path = public_path().'/sample.txt'; // dito mo ilalagay yong file or link ng i dadownload mo sa public
// $name = 'sample.text'; // ito yong magiging title ng file after ng download
// $headers = array('Content-type : application/text-plain');
// return response()->download($path,$name,$headers);
// });

// == Controllers == //
// Route::get('/', [StudentController::class,'index']);

  // Route::get('/users',[UserController::class, 'index'])->name('login');
  // Route::get('/user/{id}',[UserController::class, 'show']);
  // Route::get('/user/{id}',[UserController::class, 'show'])->middleware('auth');
 
  // == Common routes naming == //
  //index - Show all data or students
  //show - Show a singular data or student
  //create - Show a form to add a new user
  //store - Store a data
  //edit - Show a form to edit a data
  //update - Update a data
  //destroy - Delete a data



  // Route::get('/students/{id}',[StudentController::class,'show']);
  Route::controller(UserController::class)->group(function(){
    Route::get('/register','register');
    Route::get('/login','login')->name('login')->middleware('guest');
    Route::post('/login/process','process');
    Route::post('/logout', 'logout');
    Route::post('/store', 'store');
  
  });
  Route::controller(StudentController::class)->group(function(){
    Route::get('/','index')->middleware('auth');
    Route::get('/add/student','create'); // Add student
    Route::post('/add/student','store'); // Student List
    Route::get('/student/{student}','show'); // Student View
    Route::put('/student/{student}','update'); // Student Update
    Route::delete('/student/{student}','destroy'); // Student
  });

 
  
 


  
