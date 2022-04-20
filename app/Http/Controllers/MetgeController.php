<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Metge;

class MetgeController extends Controller
{
    public function indexMetge(){
        $metges=Metge::all();
        return view('/dashboards/users/index',compact('metges'));
    }
}
