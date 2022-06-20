
@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if(Auth::user()->id==$ID_metge_associat)
               
                    <div class="card-header">
                        <a href="{{ url('/metge/dashboard') }}" class="btn btn-primary hBack"> ENRERE</a>
                        Historic del pacient {{$nom}} {{$cognom}}
                    </div>
                    <form action="{{ route('update_doctor') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="ID_metge_seleccionat">Canviar metge associat al pacient   </label>
                            <div class="col-md-4">
                            <select id="ID_metge_seleccionat" name="ID_metge_seleccionat" class="form-control">
                            @foreach ($metges as $metge)
                                <option value="{{$metge->id}}">{{$metge->nom}} {{$metge->cognom}}</option>
                                @endforeach
                            </select>
                            <input type="hidden" name="pacient_id" id="pacient_id" value={{$id}}>
                            <button type="submit" class="btn btn-primary">
                                {{ __('Confirmar canvis') }}
                            </button>
                            </div>
                        </div>
                    </form>
                        
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
                            @foreach($pacient->imatges->reverse() as $imatge)   
                        <tr>
                            <td>{{date('d-m-Y', strtotime($imatge->data_pujada))}}</td>
                            <td><img src="/images/{{$imatge->imatge_pujada}}" height= "{{env('IMG_HEIGHT_HISTORIC')}}" width="{{env('IMG_WIDTH_HISTORIC')}}"/> </td>
                            <td><img src="/images/{{$imatge->mascara}}" height= "{{env('IMG_HEIGHT_HISTORIC')}}" width="{{env('IMG_WIDTH_HISTORIC')}}"/> </td>
                            <td> <a href="{{ url("/metge/dashboard/{$pacient->id}/image/{$imatge->id}")}}"><button type="button" class="btn btn-outline-primary float-right">Veure detalls imatge</button></a></td>
                        </tr>
                            @endforeach
                        @endforeach
                            
                        
                        </tbody> 

                    </table>
                @else
                <div class="card-header">
                    <a href="{{ url('/metge/dashboard') }}" class="btn btn-primary hBack"> ENRERE</a>
                    No tens accés a l'històric d'aquest pacient
                </div>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
