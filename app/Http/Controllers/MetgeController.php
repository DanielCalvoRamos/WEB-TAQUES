<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Metge;
use App\Models\Pacient;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
        
        return view('dashboards.metges.historic_pacient',compact('nom','cognom','id'));
    }

    public function getPacients(){
    $pacients=Pacient::all();
    return view('/dashboards/metges/historic_pacient',compact('pacients'));
    }

    public function getImageDetails(){
        return view('/dashboards/metges/detallImatge');
    }

    
}
