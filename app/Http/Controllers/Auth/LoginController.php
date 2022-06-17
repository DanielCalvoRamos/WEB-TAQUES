<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    protected function redirectTo(){
        if(Auth()->user()->role==env('ROL_PACIENT')){
            return route('pacient.dashboard');
        }elseif (Auth()->user()->role==env('ROL_METGE')){
            return route('metge.dashboard');
        }elseif (Auth()->user()->role==env('ROL_ADMIN')){
            return route('admin.dashboard');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        $input=$request->all();
        if(auth()->attempt(array('email'=>$input['email'],'password'=>$input['password']))){
            if(auth()->user()->role==env('ROL_PACIENT')){
                return redirect()->route('pacient.dashboard')->with('status','Sessió iniciada correctament');
            }elseif(auth()->user()->role==env('ROL_METGE')){
                return redirect()->route('metge.dashboard')->with('status','Sessió iniciada correctament');
            }elseif(auth()->user()->role==env('ROL_ADMIN')){
                return redirect()->route('admin.dashboard')->with('status','Sessió iniciada correctament');
            }
        }else{
            return redirect()->route('login')->with('status','Email o password incorrecte');
        }
    }
}
