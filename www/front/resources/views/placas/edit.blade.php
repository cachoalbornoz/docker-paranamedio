@extends('layouts.app')

@section('title', 'Placas')

@section('content')

    @include('errors.error')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    Editar placa
                </div>

                <div class="card-body">

                    {!! Form::model($placa, ['route' => ['placas.update', $placa->f_idplaca], 'method' => 'PUT']) !!}

                    <div class="row mb-4">
                        <label for="f_nombre" class="col-md-4 col-form-label text-md-end">
                            Nombre de la placa
                        </label>
                        <div class="col-4">
                            {!! Form::text('f_nombre', null, [
                                'class' => 'form-control',
                                'required',
                                'autofocus',
                            ]) !!}
                        </div>
                        <div class="col-2">
                            
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="f_detalle" class="col-md-4 col-form-label text-md-end">
                            Detalle
                        </label>
                        <div class="col-6">
                            {!! Form::text('f_detalle', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="f_ip" class="col-md-4 col-form-label text-md-end">
                            IP
                        </label>
                        <div class="col-6">
                            {!! Form::text('f_ip', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="f_orden" class="col-md-4 col-form-label text-md-end">
                            Orden
                        </label>
                        <div class="col-2">
                            <div class="form-group">
                                <select name="f_orden" class="js-example-basic-single form-control"
                                    data-placeholder="Seleccione orden de la placa">
                                    @for ($i = 1; $i < 6; $i++)
                                        <option value="{{ $i }}"
                                            @if ($placa->f_orden == $i) selected @endif>Orden {{ $i }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-5">
                        <label for="f_fecha_montaje" class="col-4 col-form-label text-md-end">
                            Fecha montaje
                        </label>
                        <div class="col-2">
                            <div class="input-group">
                                {!! Form::date('f_fecha_montaje', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <label for="f_fecha_baja" class="col-2 col-form-label text-md-end">
                            Fecha baja
                        </label>
                        <div class="col-2">
                            <div class="input-group">
                                {!! Form::date('f_fecha_baja', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="f_habilitada" class="col-4 col-form-label text-md-end">
                            Habilitada
                        </label>
                        <div class="col-1">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="f_habilitada" name="f_habilitada"
                                    @if (isset($placa) && $placa->f_habilitada) checked="" @elseif(isset($placa) && !$placa->f_habilitada)) unchecked="" @else checked="" @endif
                                    value="1">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="f_idtipoplaca" class="col-md-4 col-form-label text-md-end">
                            Tipo de placa
                        </label>
                        <div class="col-2">
                            <div class="form-group">
                                <select name="f_idtipoplaca" class="js-example-basic-single form-control"
                                    data-placeholder="Seleccione tipo placa">
                                    <option></option>
                                    @foreach ($tipoplacas as $tipoplaca)
                                        <option value="{{ $tipoplaca->f_idtipoplaca }}"
                                            @if ($placa->f_idtipoplaca == $tipoplaca->f_idtipoplaca) selected @endif>{{ $tipoplaca->f_nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="f_idestacion" class="col-md-4 col-form-label text-md-end">
                            Estación
                        </label>
                        <div class="col-4">
                            <div class="form-group">
                                <select name="f_idestacion" class="js-example-basic-single form-control"
                                    data-placeholder="Seleccione estacion">
                                    <option></option>
                                    @foreach ($estaciones as $estacion)
                                        <option value="{{ $estacion->f_idestacion }}"
                                            @if ($placa->f_idestacion == $estacion->f_idestacion) selected @endif>{{ $estacion->f_nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
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
