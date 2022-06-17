
@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url("/pacient/dashboard/upload-images") }}"><button type="button" class="btn btn-outline-primary ">Pujar nova imatge</button></a>
                    Historic del pacient {{$nom}} {{$cognom}}   
                </div>
                     
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <th> DATA </th>
                        <th> IMATGE ORIGINAL </th>
                        <th> IMATGE AMB MASCARA </th>
                        <th> DETALLS </th>
                        <th> </th>
                    </thead>  
                    
                    <tbody>
                        @foreach ($pacients=app\Models\Pacient::where('id','=',$id)->get() as $pacient)
                        @foreach($pacient->imatges->reverse() as $imatge)   
                       <tr>
                           <td>{{date('d-m-Y', strtotime($imatge->data_pujada))}}</td>
                           <td><img src="/images/{{$imatge->imatge_pujada}}" height= "{{env('IMG_HEIGHT_HISTORIC')}}" width="{{env('IMG_WIDTH_HISTORIC')}}"/> </td>
                           <td><img src="/images/{{$imatge->mascara}}" height= "{{env('IMG_HEIGHT_HISTORIC')}}" width="{{env('IMG_WIDTH_HISTORIC')}}"/> </td>
                           <td> <a href="{{ url("/pacient/dashboard/image/{$imatge->id}")}}"><button type="button" class="btn btn-outline-primary float-right">Veure detalls imatge</button></a></td>
                            <td>@empty($imatge->comentaris_metge)
                                No hi ha comentaris del metge
                            @else
                                El metge ha realitzat un comentari
                            @endempty
                            
                        </td>

                       </tr>
                        @endforeach
                       @endforeach
                        
                      
                    </tbody> 

                </table>
            </div>
        </div>
    </div>
</div>
@endsection
