<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Pacient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:pacients'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'name'     => ['required', 'string', 'alpha'],
            'surname'  => ['required', 'string', 'alpha'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     
     */
    protected function create(array $data)
    {
        $userr=User::create([
            'email'    => $data['email'],
            'role'     => 2,
            'password' => Hash::make($data['password']),
        ]);
        $id_metge_associat=DB::table('users')->join('metges','users.email','=','metges.email')->where('metges.email','=',Auth::user()->email)->select('metges.id')->get();
        $plucked=$id_metge_associat->pluck('id');

        Pacient::create([
            'email'          => $data['email'],
            'nom'            => $data['name'],
            'cognom'         => $data['surname'],
            'data_naixament' => $data['birth_date'],
            'contrasena'     => Hash::make($data['password']),
            'num_fotos'      =>0,
            'ID_metge_associat' =>$plucked[0],
        ]);
        return $userr;

    }
}
