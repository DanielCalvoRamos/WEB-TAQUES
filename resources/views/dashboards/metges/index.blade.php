
@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form action="{{ route('register') }}"  >
                    <button onclick="{{ route('register') }}"  class="btn btn-primary">Crear usuari</button>
                </form>
                <div class="card-header">{{ __('Llistat dels usuaris') }}</div>
                
              
               
                     
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <th> ID </th>
                        <th> NOM </th>
                        <th> COGNOM </th>
                        <th> DATA NAIXEMENT </th>
                        <th> NUM FOTOS </th>
                    </thead>  
                    
                    <tbody>
                      
        
                        @foreach ($metges=app\Models\Metge::where('id','=',Auth::user()->id)->get() as $metge)
                         @foreach($metge->pacients as $pacient)   
                        <tr>
                            <td>{{$pacient->id}}</td>
                            <td>{{$pacient->nom}}</td>
                            <td>{{$pacient->cognom}}</td>
                            <td>{{$pacient->data_naixament}}</td>
                            <td>{{$pacient->num_fotos}}</td> 
                            
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