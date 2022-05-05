<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Metge;
use App\Models\Pacient;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  
    public function changePassword(){
        return view('/dashboards/canviarContrasenya');
    }

    public function updatePassword(Request $request){
        dd($request->all());
        $request->validate([
            'old_password'          =>   'required|min:6|max:100',
            'new_password'          =>   'required|min:6|max:100',
            'new_password-confirm'  =>   'required|min:6|max:100'

        ]);

        $usuari_actual=Auth::user();
        if(Hash::check($request->old_password,$usuari_actual->password)){
            $usuari_actual->password=Hash::make($request->new_password);
            $usuari_actual->update();
            return redirect()->back()->with('status','Contrasenya actualitzada correctament');
        }else{
            return redirect()->back()->with('error','Contrasenya antiga incorrecta');
        }

    }
}