
@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
                        <th> </th>
                    </thead>  
                    
                    <tbody>
                        @foreach ($pacients=app\Models\Pacient::where('id','=',$id)->get() as $pacient)
                        @foreach($pacient->imatges as $imatge)   
                       <tr>
                           <td>{{$imatge->data_pujada}}</td>
                           <td>{{$imatge->imatge_pujada}}</td>
                           <td>{{$imatge->mascara}}</td> 
                           <td> <a href="{{ url("/pacient/dashboard/image/{$imatge->id}")}}"><button type="button" class="btn btn-outline-primary float-right">Veure detalls imatge</button></a></td>
                           
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
