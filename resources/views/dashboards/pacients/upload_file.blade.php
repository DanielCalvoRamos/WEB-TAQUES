@extends('layouts.app')

@section('content')

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>  
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
<script type="text/javascript">
    Dropzone.options.imageUpload = {
        maxFilesize: 20,
        acceptedFiles: ".jpeg,.jpg,.png,.gif"
    };
</script>

    <div class="container" style="padding-top:40px;">
        <div class="row-sm">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                       
                   
                        <a href="{{ url()->previous() }}" class="btn btn-primary hBack"> GO BACK</a>
                         {{ __('Pujada de imatges del pacient') }}
                    </div>
                    <div class="card-body" >
                        <form action="{{route('dropzone.store')}}" method="post" name="file" files="true" enctype="multipart/form-data" class="dropzone bg-info"  id="image-upload">
                            @csrf
                            <div>
                                <h3 class="text-center">Dropzone file upload</h3>
                            </div>
                            <div class="dz-default dz-message"><span>Arrossega aqui les imatges per pujar-les</span></div>
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
