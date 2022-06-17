@extends('layouts.app')

@section('content')

<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">


    <div class="container" >
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                       
                   
                        <a href="{{ url('pacient/dashboard') }}" class="btn btn-primary hBack"> GO BACK</a>
                         {{ __('Pujada de imatges del pacient') }}
                    </div>
                    <div class="card-body" >
                        <form action="{{route('dropzone.store')}}" method="post" name="file" files="true" enctype="multipart/form-data" >
                            
                            @csrf
                           <div class="form-group">
                            <label for="file">Selecciona la imatge que vulguis pujar</label>
                            <input type="file" class="form-control" name="file" id="file" accept="image/png,image/jpeg,image/jpg"/>
                           </div>
                           <button type="submit" class="btn btn-success">Puja</button>  
                        </form>
                    
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                    
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
