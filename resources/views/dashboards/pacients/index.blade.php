@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Benvingut pacient {{Auth::user()->email}}</div>
                <a href="{{ url("/pacient/dashboard/upload-images") }}"><button type="button" class="btn btn-outline-primary ">Pujar nova imatge</button></a>

                {{$num_fotos_plucked=DB::table('users')->leftJoin('pacients','users.email','=','pacients.email')->where('pacients.email','=',Auth::user()->email)->select('pacients.num_fotos')->get()->pluck('num_fotos')[0]}}
               
                <div class="card-body">
                    {{$num_fotos_plucked}}



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
