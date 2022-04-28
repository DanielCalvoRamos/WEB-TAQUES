<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pacient;


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

   
}
