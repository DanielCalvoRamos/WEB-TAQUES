<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Metge;
use App\Models\Pacient;
use App\Models\User;
use App\Models\Imatge;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Route;

class MetgeController extends Controller{

    function index(){
        return view('dashboards.metges.index');
    }


    public function getMetges(){
        $metges=Metge::all();
        return view('/dashboards/metges/index',compact('metges'));
    }


    public function getPacientByID($id){
        $id_pacient=Pacient::where('id','=',$id)->select('nom','cognom')->get();
        $nom=$id_pacient->pluck('nom')[0];
        $cognom=$id_pacient->pluck('cognom')[0];
        $metges=Metge::all();
        
        return view('dashboards.metges.historic_pacient',compact('nom','cognom','id','metges'));
    }

    public function getPacients(){
        $pacients=Pacient::all();
        $metges=Metge::all();
        return view('/dashboards/metges/historic_pacient',compact('pacients','metges'));
    }

    public function getImageID($id, $id_imatge){
        $imatge=Imatge::find($id_imatge);
        return view('/dashboards/metges/detallImatge_metge',compact('imatge'));
    }

    public function updateAssociatedDoctor(Request $request){

        $pacient=Pacient::find($request->pacient_id);
        $pacient->ID_metge_associat=$request->ID_metge_seleccionat;
        $pacient->update();
        return redirect('/metge/dashboard')->with('status','Se ha cambiat el metge associat correctament');
    }

    
}
