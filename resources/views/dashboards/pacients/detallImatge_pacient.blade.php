@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @if($pacient_id==$imatge->ID_pacient_associat)
                    <div class="card-header">
                        <a href="{{ url('pacient/dashboard') }}" class="btn btn-primary hBack"> GO BACK</a>
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
                        <thead>
                            <th> IMATGE ORIGINAL </th>
                            <th> IMATGE AMB MÀSCARA </th>
                    
                        </thead>  
                        
                        <tbody>
                        <tr>
                            <td><img src="/images/{{$imatge->imatge_pujada}}"  height= "{{env('IMG_HEIGHT_DET_IMG_PACIENT')}}" width="{{env('IMG_WIDTH_DET_IMG_PACIENT')}}"/> </td>
                            <td><img src="/images/{{$imatge->mascara}}"  height= "{{env('IMG_HEIGHT_DET_IMG_PACIENT')}}" width="{{env('IMG_WIDTH_DET_IMG_PACIENT')}}"/> </td> 
                        </tr>
                        <tr>
                            <th>Data pujada:</th>
                            <td>{{date('d-m-Y', strtotime($imatge->data_pujada))}}</td>
                        </tr>
                        <tr>
                            <th>Comentaris metge:</th>
                            <td>{{$imatge->comentaris_metge}}</td>
                        </tr>     
                        </tbody> 

                    </table>
                    @else
                    <div class="card-header">
                        <a href="{{ url('/pacient/dashboard') }}" class="btn btn-primary hBack"> GO BACK</a>
                        No tens accés a aquesta imatge
                    </div>
                    @endif
            </div>
        </div>
    </div>
</div>
@endsection
