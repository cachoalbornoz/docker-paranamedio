@extends('layouts.app')

@section('title', 'Roles')

@section('content')

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-12">
                    <h5>
                        Roles
                        <small>
                            <a href="{{ route('roles.create') }}" class="btn btn-link">(+) Crear</a>
                        </small>
                    </h5>
                </div>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-hover" id="roles">
                <thead>
                    <tr>
                        <th class="w-5">
                            <input class="checkall" type="checkbox">
                        </th>
                        <th>Nombre</th>
                        <th>Guard_Name</th>
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
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

@endsection

@section('js')

    <script type="module">

        var table = $('#roles').DataTable({
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
            ajax: "{{ route('roles.getroles') }}",
            columns: [
                {
                    data: 'check',
                    class: 'w-5'
                },
                {
                    data: 'name'
                },
                {
                    data: 'guard_name'
                }
            ]
        });

        $('#roles').on("click", ".borrar", function() {

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

                            url: "{{ route('roles.destroy') }}",
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

        $('#roles').on("click", ".checkall", function() {
            $('input[type="checkbox"]').not(this).prop('checked', this.checked);
        });
    </script>

@endsection
