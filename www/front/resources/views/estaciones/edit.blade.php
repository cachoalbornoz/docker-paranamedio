@extends('layouts.app')

@section('title', 'Estaciones')

@section('content')

    @include('errors.error')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    Editar estacion
                </div>

                <div class="card-body">

                    {!! Form::model($estacion, [
                        'route' => ['estaciones.update', $estacion->f_idestacion ],
                        'method' => 'PUT',
                        'enctype' => 'multipart/form-data',
                    ]) !!}


                    <div class="row mb-4">
                        <label for="nombre" class="col-md-4 col-form-label text-md-end">
                            Nombre de la estación
                        </label>
                        <div class="col-4">
                            {!! Form::text('f_nombre', null, [
                                'class' => 'form-control',
                                'required',
                                'autofocus',
                            ]) !!}
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="f_codestacion" class="col-md-4 col-form-label text-md-end">
                            Código de la estación
                        </label>
                        <div class="col-3">
                            {!! Form::text('f_codestacion', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>


                    <div class="row mb-4">
                        <label for="f_es_bombeo" class="col-md-4 col-form-label text-md-end">
                            Bombeo
                        </label>
                        <div class="col-1">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="f_es_bombeo" name="f_es_bombeo"
                                    @if (isset($estacion) && $estacion->f_es_bombeo) checked="" @elseif(isset($estacion) && !$estacion->f_es_bombeo)) unchecked="" @else checked="" @endif
                                    value="1">
                            </div>
                        </div>

                        <label for="f_es_cloacal" class="col-1 col-form-label text-md-end">
                            Cloacal
                        </label>
                        <div class="col-1">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="f_es_cloacal" name="f_es_cloacal"
                                    @if (isset($estacion) && $estacion->f_es_cloacal) checked="" @elseif(isset($estacion) && !$estacion->f_es_cloacal)) unchecked="" @else checked="" @endif
                                    value="1">
                            </div>
                        </div>

                        <label for="f_es_defensa" class="col-1 col-form-label text-md-end">
                            Defensa
                        </label>
                        <div class="col-1">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="f_es_defensa" name="f_es_defensa"
                                    @if (isset($estacion) && $estacion->f_es_defensa) checked="" @elseif(isset($estacion) && !$estacion->f_es_defensa)) unchecked="" @else checked="" @endif
                                    value="1">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="f_direccion" class="col-md-4 col-form-label text-md-end">
                            Ubicación
                        </label>
                        <div class="col-6">
                            {!! Form::text('f_direccion', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="f_situacion" class="col-md-4 col-form-label text-md-end">
                            Situación
                        </label>
                        <div class="col-6">
                            {!! Form::text('f_situacion', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="f_lat" class="col-md-4 col-form-label text-md-end">
                            Latitud
                        </label>
                        <div class="col-2">
                            {!! Form::text('f_lat', null, [
                                'class' => 'form-control',
                            ]) !!}
                        </div>
                        <label for="f_lng" class="col-md-2 col-form-label text-md-end">
                            Longitud
                        </label>
                        <div class="col-2">
                            {!! Form::text('f_lng', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="f_idmunicipio" class="col-md-4 col-form-label text-md-end">
                            Municipio
                        </label>
                        <div class="col-4">
                            <div class="form-group">
                                <select name="f_idmunicipio" class="js-example-basic-single form-control"
                                    data-placeholder="Seleccione municipio">
                                    <option></option>
                                    @foreach ($municipios as $municipio)
                                        <option value="{{ $municipio->f_idmunicipio }}"
                                            @if (isset($estacion) && $estacion->f_idmunicipio == $municipio->f_idmunicipio) selected @endif>
                                            {{ $municipio->f_nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-4">

                        </div>
                        <div class="col-2">
                            {{ Form::file('f_foto') }}
                        </div>
                        <label class="col-md-2 col-form-label text-md-end">

                        </label>
                        <div class="col-2">

                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-4">

                        </div>
                        <div class="col-4">
                            Foto
                        </div>
                        <div class="col-4">
                            Mapa
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-4">

                        </div>
                        <div class="col-4">
                            @isset($estacion->f_foto)
                                <img src="{{ asset('images/www/' . $estacion->f_foto) }}" alt="estacion">
                            @endisset
                        </div>
                        <div class="col-4">

                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="f_habilitada" class="col-md-4 col-form-label text-md-end">
                            Habilitada
                        </label>
                        <div class="col-1">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="f_habilitada" name="f_habilitada"
                                    @if (isset($estacion) && $estacion->f_habilitada) checked="" @elseif(isset($estacion) && !$estacion->f_habilitada)) unchecked="" @else checked="" @endif
                                    value="1">
                            </div>
                        </div>
                    </div>

                    {{ Form::close() }}

                </div>

            </div>
        </div>
    </div>

@endsection

@section('js')

    <script type="module">
        $('.js-example-basic-single').select2({});
    </script>

@endsection
