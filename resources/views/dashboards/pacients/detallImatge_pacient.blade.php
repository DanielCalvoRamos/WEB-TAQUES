@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url()->previous() }}" class="btn btn-primary hBack"> GO BACK</a>
                    {{ __('Detalls de la imatge pacient') }}
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
                        <td><img src="/images/{{$imatge->imatge_pujada}}" height="500" width="540"/> </td>
                        <td><img src="/images/{{$imatge->mascara}}" height="500" width="540"/> </td> 
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
            </div>
        </div>
    </div>
</div>
@endsection
