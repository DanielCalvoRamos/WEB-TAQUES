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
use Illuminate\Support\Facades\Http;
use Storage;

class PacientController extends Controller
{
    function index(){
        return view('dashboards.pacients.index');
    }
  
    public function dropzoneStoreImages(Request $request){
        //guardar la imatge pujada 
        $image = $request->file('file');
       
        if($image and $this->validate($request, ['file' => 'image|mimes:jpeg,png,jpg,svg|max:2048']) ){
            $imageName =$image->getClientOriginalName();
            $image->move(public_path('images'),$imageName);
            $actual_date=Carbon::now();
            $id=DB::table('users')->leftJoin('pacients','users.email','=','pacients.email')->where('pacients.email','=',Auth::user()->email)->select('pacients.id')->get()->pluck('id')[0];
            $pacient=Pacient::find($id);
            $num_fotos_anterior=DB::table('imatges')->where('imatges.ID_pacient_associat','=',$id)->count();
            $num_fotos_actual=$num_fotos_anterior+1;
            $imagen=Imatge::create([
                'ID_pacient_associat'   =>$id,
                'imatge_pujada'         =>$imageName,
                'data_pujada'           =>$actual_date->toDateTimeString(),
            ]);

            $pacient->num_fotos=$num_fotos_actual;
            $pacient->update();
            
            //enviar la imatge pujada a l' API externa i obtenir les dades 
            $response = Http::withBody(
                base64_encode($image), 'image/jpeg'
            )->post(env('URL_API_EXTERNA'));

            $imatge=Imatge::find($imagen->id);
            $imatge->percentatge_malignitat=($response->json($key='malignity'))*100;
            $imatge->diagnostic=$response->json($key='diagnostic');
            $imatge->update();

            //guardar la imatge amb màscara de l' API externa 
            $url=$response->json($key='image_link');
            $contents=file_get_contents($url);
            $imatgeaux = substr($url, strrpos($url, '/') + 1);
            $imatgeaux2=$imatge->id.$imatgeaux;
            $imatge->mascara=$imatgeaux2;
            $imatge->update();
            Storage::disk('public')->put($imatge->mascara, $contents);


            return redirect('/pacient/dashboard')->with('status','Imatge pujada correctament');
        }else{
            return redirect()->back()->with('status','La imatge no ha sigut pujada');
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
        $pacient_id=DB::table('users')->leftJoin('pacients','users.email','=','pacients.email')->where('pacients.email','=',Auth::user()->email)->select('pacients.id')->get()->pluck('id')[0];
        return view('/dashboards/pacients/detallImatge_pacient',compact('imatge','pacient_id'));
    }



   
}
