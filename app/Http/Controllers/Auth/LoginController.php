<?php
namespace App\Http\Controllers;
namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Http;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    public function login(){
        return view('auth.login');
    }
    public function register(){
        return view('auth.register');
    }

    public function loginProcess(Request $request){
        //
        if(Auth::attempt($request->only('email', 'password'))){
            return redirect('/pegawai');
        }
        else
            return redirect('/login');
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');

    }
    // public function registerNewUser(Request $request){
    //     // dd($request->all());
    //     User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => bcrypt($request->password),
    //         'remember_token' => Str::random(60),
    //     ]);
    // }
}
