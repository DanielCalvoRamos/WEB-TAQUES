<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Metge;
use App\Models\Pacient;
use App\Models\User;
use App\Models\Imatge;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PacientController extends Controller
{
    function index(){
        return view('dashboards.pacients.index');
    }
  
    public function dropzoneStoreImages(Request $request){
        $image = $request->file('file');
        if($image){
            $imageName =$image->getClientOriginalName();
            $image->move(public_path('images'),$imageName);
            $actual_date=Carbon::now();
            $id=DB::table('users')->leftJoin('pacients','users.email','=','pacients.email')->where('pacients.email','=',Auth::user()->email)->select('pacients.id')->get()->pluck('id')[0];
            $pacient=Pacient::find($id);
            $num_fotos_anterior=$pacient->num_fotos;
            $num_fotos_actual=$num_fotos_anterior+1;
            $imagen=Imatge::create([
                'ID_pacient_associat'   =>$id,
                'imatge_pujada'         =>$imageName,
                'data_pujada'           =>$actual_date->toDateTimeString(),
            ]);

            $pacient->num_fotos=$num_fotos_actual;
            $pacient->update();
            
            return redirect()->back()->with('status','Imatge pujada correctament');
        }else{
            return redirect()->back()->with('flash_message','La imatge no ha sigut pujada');
        }
        
   
        
    }

    public function showUploadImages(){
        return view('dashboards.pacients.upload_file');
    }

    public function getPacient(){
        $idd=Auth::user()->id;
        $id=DB::table('users')->leftJoin('pacients','users.email','=','pacients.email')->where('pacients.email','=',Auth::user()->email)->select('pacients.id')->get()->pluck('id')[0];
        $id_pacient=Pacient::where('id','=',$id)->select('nom','cognom')->get();
        $nom=$id_pacient->pluck('nom')[0];
        $cognom=$id_pacient->pluck('cognom')[0];
        
        return view('dashboards.pacients.historic_pacient',compact('id','nom','cognom'));
    }

    public function getPacients(){
        $pacients=Pacient::all();
        return view('/dashboards/metges/historic_pacient',compact('pacients'));
    }

    public function getImageID($id_imatge){
        $imatge=Imatge::find($id_imatge);
        return view('/dashboards/pacients/detallImatge_pacient',compact('imatge'));
    }



   
}
