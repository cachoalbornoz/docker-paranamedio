@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')

    @include('errors.error')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    Crear usuario
                </div>

                <div class="card-body">

                    {!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}

                    <div class="row mb-4">
                        <div class="col-6">
                            <div class="form-group">
                                <strong>Apellido</strong>
                                {!! Form::text('apellido', null, ['placeholder' => 'Apellido', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <strong>Nombre</strong>
                                {!! Form::text('nombre', null, ['placeholder' => 'Nombre', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-6">
                            <div class="form-group">
                                <strong>Username</strong>
                                {!! Form::text('username', null, ['placeholder' => 'Username', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-6">
                            <div class="form-group">
                                <strong>Email</strong>
                                {!! Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-4">
                            <div class="form-group">
                                <strong>Password:</strong>
                                {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <strong>Confirmar Password:</strong>
                                {!! Form::password('confirm-password', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-6">
                            <div class="form-group">
                                <strong>Rol</strong>
                                {!! Form::select('roles[]', $roles, null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Crear</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>

        </div>
    </div>

@endsection
