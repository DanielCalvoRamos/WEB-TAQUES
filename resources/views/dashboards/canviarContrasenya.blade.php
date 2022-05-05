@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url()->previous() }}" class="btn btn-primary hBack"> GO BACK</a>
                    {{ __('Formulari canvi de contrasenya') }}
                </div>

                <div class="card-body">
                    <form action="{{ route('update_password') }}" method="post">
                        @csrf
                        <div class="row mb-3">
                            <label for="old_password" class="col-md-4 col-form-label text-md-end">{{ __('Contrasenya antiga') }}</label>

                            <div class="col-md-6">
                                <input id="old_password" type="password" class="form-control" >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="new_password" class="col-md-4 col-form-label text-md-end">{{ __('Nova contrasenya') }}</label>

                            <div class="col-md-6">
                                <input id="new_password" type="password" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="new_password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Repeteix nova contrasenya') }}</label>

                            <div class="col-md-6">
                                <input id="new_password-confirm" type="password" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Actualitzar contrasenya') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection