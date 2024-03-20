@extends('layouts.app')

@section('title', 'Lecturas')

@section('content')

    @include('errors.error')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    Lecturas
                    <button id="start-lecturas" class="btn btn-outline-success btn-sm">Activar</button>
                    <button id="stop-lecturas" class="btn btn-outline-danger btn-sm">Detener</button>
                </div>

                <div class="card-body">
                    <div id="div-datalogger">
                        @include('lecturas.datalogger')
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
