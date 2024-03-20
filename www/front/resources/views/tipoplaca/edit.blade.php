@extends('layouts.app')

@section('title', 'Tipo placa')

@section('content')

    @include('errors.error')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    Editar tipo de placa
                </div>

                <div class="card-body">

                    {!! Form::model($tipoplaca, [
                        'route' => ['tipoplaca.update', $tipoplaca->f_idtipoplaca],
                        'method' => 'PUT',
                        'enctype' => 'multipart/form-data',
                    ]) !!}


                    <div class="row mb-4">
                        <label for="nombre" class="col-md-4 col-form-label text-md-end">
                            Nombre
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
                        <label for="f_modelo" class="col-md-4 col-form-label text-md-end">
                            Modelo
                        </label>
                        <div class="col-3">
                            {!! Form::text('f_modelo', null, ['class' => 'form-control']) !!}
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
