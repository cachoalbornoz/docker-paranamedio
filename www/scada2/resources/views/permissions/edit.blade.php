@extends('layouts.app')

@section('title', 'Roles')

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>Permisos</h5>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            {!! Form::model($permission, ['route' => ['permissions.update', $permission->id], 'method' => 'PUT']) !!}

                            <div class="form-group mb-4">
                                {!! Form::label('name', 'Nombre') !!}
                                {!! Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Nombre permiso']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
                            </div>


                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

    <script type="module">
        $(document).ready(function() {



        });
    </script>

@endsection
