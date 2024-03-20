@extends('layouts.app')

@section('title', 'Roles')

@section('content')

    @include('errors.error')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    Crear rol
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-10">
                            {{ Form::open(['route' => 'roles.store']) }}

                            {!! Form::text('name', null, [
                                'class' => 'form-control',
                                'required',
                                'autofocus',
                                'placeholder' => 'Nombre de rol',
                            ]) !!}
                        </div>

                        <div class="col-2">
                            {!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group mb-4">
                            {!! Form::hidden('guard_name', 'web', ['required']) !!}
                        </div>

                        <div class='form-group mb-4'>
                            <p>Asignar permisos</p>

                            <div class="row">
                                @foreach ($permissions as $permission)
                                    <div class="col-3">
                                        <label>
                                            {{ Form::checkbox('permissions[]', $permission->id) }}
                                            {{ Form::label($permission->name, $permission->name) }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <small class=" mt-5"> (*) Debe seleccionar al menos 1 permiso.
                        </small>
                    </div>
                </div>

                {{ Form::close() }}
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
