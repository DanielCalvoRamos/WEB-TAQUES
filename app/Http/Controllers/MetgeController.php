<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Metge;

class MetgeController extends Controller{

    function index(){
        return view('dashboards.metges.index');
    }


    public function indexMetge(){
        $metges=Metge::all();
        return view('/dashboards/metges/index',compact('metges'));
    }
}
