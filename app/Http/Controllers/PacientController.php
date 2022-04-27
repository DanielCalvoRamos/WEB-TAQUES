<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pacient;


class PacientController extends Controller
{
    function index(){
        return view('dashboards.pacients.index');
    }

   
}
