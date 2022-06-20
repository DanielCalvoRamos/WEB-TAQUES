@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @if($imatge!=null)
                    @if($id_pacient==$imatge->ID_pacient_associat) 
                        <div class="card-header">
                            <a href="{{ url('metge/dashboard') }}" class="btn btn-primary hBack"> ENRERE</a>
                            Detalls de la imatge {{$imatge->id}}
                        </div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                        </div>

                        <table class="table table-striped table-hover">
                            <form method="POST" action="{{ route('update_detallsImatge') }}">
                                @csrf
                            <thead>
                                <th> IMATGE ORIGINAL </th>
                                <th> IMATGE AMB MÀSCARA </th>
                                <th></th>
                        
                            </thead>  
                            
                            <tbody>
                            <tr>
                                <td><img src="/images/{{$imatge->imatge_pujada}}"  height= "{{env('IMG_HEIGHT_DET_IMG_METGE')}}" width="{{env('IMG_WIDTH_DET_IMG_METGE')}}"/> </td>
                                <td><img src="/images/{{$imatge->mascara}}"  height= "{{env('IMG_HEIGHT_DET_IMG_METGE')}}" width="{{env('IMG_WIDTH_DET_IMG_METGE')}}"/> </td> 
                                <td></td>
                            </tr>
                            <tr>
                                
                                <th>Data pujada:</th>
                                <td>{{date('d-m-Y', strtotime($imatge->data_pujada))}}</td>
                                <td></td>
                            </tr>
                            <tr>

                                <th>Comentaris metge:</th>
                                <td><input id="comentaris_metge" class="form-control" name="comentaris_metge" value="{{$imatge->comentaris_metge}}"></td>
                                <td><button type="submit" class="btn btn-outline-primary float-right">Guardar canvis</button></td>
                            </tr>
                            <tr>
                                <th>Percentatge malignitat:</th>
                                <td><input id="percentatge_malignitat" class="form-control" name="percentatge_malignitat" value="{{$imatge->percentatge_malignitat}}%"></td>
                                <td><button type="submit" class="btn btn-outline-primary float-right">Guardar canvis</button></td>
                            </tr>
                            <tr>
                                <th>Diagnòstic:</th>
                                <td><input id="diagnostic" class="form-control" name="diagnostic" value="{{$imatge->diagnostic}}"></td>
                                <td><button type="submit" class="btn btn-outline-primary float-right">Guardar canvis</button></td>
                            </tr> 
                                <input type="hidden" id="id" class="form-control" name="id" value="{{$id_imatge}}">
                            </form>
                            </tbody> 
                        </table>
                    @else
                    <div class="card-header">
                        <a href="{{ url('/pacient/dashboard') }}" class="btn btn-primary hBack"> ENRERE</a>
                        No tens accés a aquesta imatge
                    </div>
                    @endif
                @else
                 <div class="card-header">
                        <a href="{{ url('/pacient/dashboard') }}" class="btn btn-primary hBack"> ENRERE</a>
                        La imatge a la que intentes accedir no existeix
                    </div>

                @endif
            </div>
        </div>
    </div>
</div>
@endsection
