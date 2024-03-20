@extends('layouts.app')

@section('content')
    <div class="container-fluid ">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card ">
                    <div class="card-header">Acceso a usuarios</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mt-3 mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">
                                    Correo electrónico
                                </label>

                                <div class="col-md-4">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">
                                    Password
                                </label>

                                <div class="col-md-4">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mt-5 mb-3">
                                <label for="captcha" class="col-md-4 col-form-label text-md-end">

                                </label>

                                <div class="col-md-4">
                                    <div class="col-md-4">
                                        <div class="d-grid">
                                            <div id="g-recaptcha" style="transform:scale(0.85);transform-origin:0 0">
                                                {!! htmlFormSnippet() !!}
                                                @if ($errors->has('g-recaptcha-response'))
                                                    <span>
                                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end">

                                </label>
                                <div class="col-md-4">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-outline-primary btn-block">
                                            Ingresar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
