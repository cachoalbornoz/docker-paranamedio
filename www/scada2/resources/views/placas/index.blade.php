@extends('layouts.app')

@section('title', 'Placas')

@section('content')

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-12">
                    <h5>
                        Placas
                        <small>
                            <a href="{{ route('placas.create') }}" class="btn btn-link">(+) Crear</a>
                        </small>
                    </h5>
                </div>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-hover" id="placas">
                <thead>
                    <tr>
                        <th class="w-5">
                            <input class="checkall" type="checkbox">
                        </th>
                        <th>Nombre</th>
                        <th>Ip</th>
                        <th>Detalle</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                    <tr>
                        <th>
                            <i class="fa fa-trash text-danger borrar"></i>
                        </th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

@endsection

@section('js')

    <script type="module">

        var table = $('#placas').DataTable({
            lengthMenu: [
                [10, 25, 50],
                [10, 25, 50]
            ],
            stateSave: true,
            processing: true,
            serverSide: true,
            bSort: false,
            language: {
                "url": "{{ url('/DataTables/spanish.json') }}"
            },
            ajax: "{{ route('placas.getplacas') }}",
            columns: [
                {
                    data: 'check',
                    class: 'w-5'
                },
                {
                    data: 'nombre'
                },
                {
                    data: 'ip'
                },
                {
                    data: 'detalle',
                    class: 'w-50'
                }
            ]
        });

        $('#placas').on("click", ".borrar", function() {

            // Si tiene más de un item seleccionado
            if ($("input[name='borrar[]']:checked").length > 0) {

                var values = [];
                $('[name="borrar[]"]:checked').each(function() {
                    values.push(parseInt($(this).val()));
                });

                alertify.confirm("Elimina registro", "Confirma ",
                    function() {
                        var token = $('input[name=_token]').val();

                        $.ajax({

                            url: "{{ route('placas.destroy') }}",
                            type: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': token
                            },
                            dataType: 'json',
                            data: {
                                values
                            },
                            success: function(data) {
                                table.ajax.reload();
                            }
                        });
                    },
                    function(){}
                );
            }else{
                alertify.error('Seleccione al menos un item');
            }

        });

        $('#placas').on("click", ".checkall", function() {
            $('input[type="checkbox"]').not(this).prop('checked', this.checked);
        });
    </script>

@endsection
