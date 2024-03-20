@extends('layouts.app')

@section('title', 'Roles')

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    Crear permiso
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12">

                            {{ Form::open(['route' => 'permissions.store']) }}

                               <div class="form-group mb-4">
                                    {!! Form::label('name', 'Nombre') !!}
                                    {!! Form::text('name', null, ['class' => 'form-control', 'required', 'autofocus', 'placeholder' => 'Nombre de permisos']) !!}
                                </div>

                                <div class="form-group mb-4">
                                    {!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
                                </div>

                            {{ Form::close() }}

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')

    <script>
        $(document).ready(function() {


        });
    </script>

@endsection
