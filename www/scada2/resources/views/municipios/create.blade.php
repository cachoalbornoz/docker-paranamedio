@extends('layouts.app')

@section('title', 'Municipios')

@section('content')

    @include('errors.error')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    Crear municipio
                </div>

                <div class="card-body">

                    {{ Form::open(['route' => 'municipios.store']) }}

                    <div class="row mb-4">
                        <label for="nombre" class="col-md-4 col-form-label text-md-end">
                            Nombre del Municipio
                        </label>
                        <div class="col-6">
                            {!! Form::text('f_nombre', null, [
                                'class' => 'form-control',
                                'required',
                                'autofocus',
                                'placeholder' => 'Nombre de municipio',
                            ]) !!}
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-primary">Crear</button>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="contacto" class="col-md-4 col-form-label text-md-end">
                            Contacto en el municipio
                        </label>
                        <div class="col-4">
                            {!! Form::text('f_contacto', null, ['class' => 'form-control', 'placeholder' => 'Apellido y nombres' ]) !!}
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12">
                            <strong> <u>Asignar estación </u> </strong>
                        </div>
                    </div>

                    <div class="row">
                        @foreach ($estaciones as $estacion)
                            <div class="col-3">
                                <label>
                                    <input type="checkbox" class="form-check-input" name="estaciones[]" value="{{ $estacion->f_idestacion }}">
                                    {{ $estacion->f_nombre }}
                                </label>
                            </div>
                        @endforeach
                    </div>

                    {{ Form::close() }}

                </div>

            </div>
        </div>
    </div>

@endsection

@section('js')

    <script type="module">
        $('.js-example-basic-single').select2({
        });
    </script>

@endsection
