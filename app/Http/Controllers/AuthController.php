<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
// use App\Providers\RouteServiceProvider;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{

    //use AuthenticatesUsers;

    function index(){

        if( !Auth::check() ){

            return view('auth.login', ['errors'=>'']);

        }else{

            return redirect('/');
        }
    }


    public function login(Request $request)
    {
        $request->validate([
           'email' => 'required|string',
           'password' => 'required|string',
        ]);   

        $credentials = $request->only('email', 'password');   
        
        $remember = false;
        if($request->$remember){
            $remember = true;
        }

        // dump($credentials);

        if ( Auth::attempt($credentials, $remember) ) {
            
            // $user = User::find(Auth::id());
            // $user->last_login = date('Y-m-d H:i:s');
            // $user->save();

            return redirect()->intended('/');

        }else{

            return view('auth.login', ['errors'=>'Invalid login or password']);
        }

        // $this->guard()->attempt(
        //     $this->credentials($request), $request->filled('remember')
        // );
    }

    public function resetpassword()
    {
        return view('auth.resetpassword');
    }

    public function passrowdreset(Request $request){
        
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
            'password_confirm'=>'required|string'
        ]); 

        return "OK";
    }


}
