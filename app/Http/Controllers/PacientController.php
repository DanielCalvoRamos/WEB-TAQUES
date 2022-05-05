<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Metge;
use App\Models\Pacient;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PacientController extends Controller
{
    function index(){
        return view('dashboards.pacients.index');
    }
  
    public function dropzoneStore(Request $request)
    {
        $image = $request->file('file');

        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);
   
        return response()->json(['success'=>$imageName]);
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

    public function getImageDetails(){
        return view('/dashboards/pacients/detallImatge_pacient');
    }



   
}
