<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\bcrypt;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function login(){
        if(View::exists('user.login')){
            return view('user.login');
        }
        else{
            // return response()->view('errorMessage.404');
            return abort(404);
        }

    
    }
    public function process(Request $request){
        $validated = $request ->validate([
            "email" => ['required','email'],
            "password" => 'required'
          ]);
          if(auth()->attempt($validated)){

            $request->session()->regenerate();
            return redirect('/')->with('message','Welcome back!');
          }
          return back()->withErrors(['email'=>'Login failed'])->onlyInput('email');


          

    }
    public function register(){
        if(View::exists('user.register')){
            return view('user.register');
        }
        else{
            // return response()->view('errorMessage.404');
            return abort(404);
        }

    }
    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('message','Logout Successfuly');
    }

    public function index(){
        return 'Hello from UserController';
    }
    // public function show($id){
    //     $data = array(
    //     "id" => $id,
    //     "name" => "PinoyFreeCoder",
    //     "age" => 24,
    //     "email" => "anjomapili42@gmail.com"
    //     );
    // return view('user', $data);
    // }

    // 2nd way to insert data

    public function show($id){
          $data = ['data'=>'data from database'];
        return view('user')
            ->with('data',$data)
            ->with('name','PinoyFreeCoder')
            ->with('age', 22)
            ->with('email','anjomapili42@gmail.com')
            ->with('id',$id);
        }
    public function store(Request $request){
      $validated = $request ->validate([
        "name" => ['required', 'min:4'],
        "email" => ['required','email', Rule::unique('users','email')],
        "password" => 'required|confirmed|min:4'
      ]);

      $validated ['password'] = bcrypt($validated ['password']); 

      $user = User::create($validated);
      auth()->login($user);

    }
     
}
