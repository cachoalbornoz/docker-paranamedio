@extends('layouts.app')

@section('title', 'Escrituras')

@section('content')

    @include('errors.error')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    Encender estación
                </div>

                <div class="card-body">

                    <div class="row">
                        <div class="col">
                            <p>Estación Golf - IP <strong>10.11.23.212</strong> Puerto <strong>9760</strong></p>
                        </div>
                        <div class="col">
                            <button class="btn btn-success" id="encender">Encender</button>
                            <button class="btn btn-secondary" id="apagar">Apagar</button>
                        </div>
                        <div class="col">
                            <div id="response"></div>
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

            $("#encender").on("click", function() {

                let url = "{{ route('escrituras.encender') }}"

                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(data) {
                        $("#response").text(data)
                    },
                    error: function(error){
                        console.log(error)
                    }
                });
            });

            $("#apagar").on("click", function() {
                let url = "{{ route('escrituras.apagar') }}"

                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(data) {
                        $("#response").text(data)
                    },
                    error: function(error){
                        console.log(error)
                    }
                });
            });


        });
    </script>

@endsection
