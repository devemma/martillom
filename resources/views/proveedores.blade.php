@extends('layouts.tablalayout')

@section('content')
<div class="container">
    <h3><span class="badge badge-success">Proveedores</span> <span class="badge badge-dark">Martillo</span></h3>
    <br>
    <h3><a class="badge badge-success" href="javascript:void(0)" id="createNewProduct"> Crear nuevo proveedor</a></h3>
    <br><br><br>
    <table id="ejemplo" class="table table-bordered data-table" width="100%">
        <thead>
            <tr>
                <th>Núm.</th>
                <th>Nombre</th>
                <th>RFC</th>
                <th>Domicilio</th>
                <th>Ciudad</th>
                <th>Teléfono</th>
                <th width="200px">Acciones</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="productForm" name="productForm" class="form-horizontal">
                    <input type="hidden" name="proveedor_id" id="proveedor_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Nombre</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">RFC</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="rfc" name="rfc" placeholder="RFC" value="" maxlength="18" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Domicilio</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="domicilio" name="domicilio" placeholder="Domicilio" value="" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-12 control-label">Ciudad</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ciudad" value="" maxlength="20" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-12 control-label">Teléfono</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" value="" maxlength="10" required="">
                        </div>
                    </div>

                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Guardar cambios
                        </button>
                        <button type="submit" class="btn btn-danger" id="cancelarBtn" value="create">Cancelar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('acciones')
<script type="text/javascript">
    $(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });



        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('ajaxproveedor.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'nombre',
                    name: 'nombre'
                },
                {
                    data: 'rfc',
                    name: 'rfc'
                },
                {
                    data: 'domicilio',
                    name: 'domicilio'
                },
                {
                    data: 'ciudad',
                    name: 'ciudad'
                },
                {
                    data: 'telefono',
                    name: 'telefono'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

        $('#createNewProduct').click(function() {
            $('#saveBtn').val("create-product");
            $('#proveedor_id').val('');
            $('#productForm').trigger("reset");
            $('#modelHeading').html("Crear Nuevo Proveedor");
            $('#ajaxModel').modal('show');
        });

        $('body').on('click', '.editProduct', function() {
            var proveedor_id = $(this).data('id');
            $.get("{{ route('ajaxproveedor.index') }}" + '/' + proveedor_id + '/edit', function(data) {
                $('#modelHeading').html("Editar Proveedor");
                $('#saveBtn').val("edit-user");
                $('#ajaxModel').modal('show');
                $('#proveedor_id').val(data.id);
                $('#nombre').val(data.nombre);
                $('#rfc').val(data.rfc);
                $('#domicilio').val(data.domicilio);
                $('#ciudad').val(data.ciudad);
                $('#telefono').val(data.telefono);
            })
        });

        $('#saveBtn').click(function(e) {
            e.preventDefault();
            $(this).html('Enviando...');

            $.ajax({
                data: $('#productForm').serialize(),
                url: "{{ route('ajaxproveedor.store') }}",
                type: "POST",
                dataType: 'json',
                success: function(data) {

                    $('#productForm').trigger("reset");
                    $('#ajaxModel').modal('hide');
                    table.draw();

                },
                error: function(data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Guardar cambios');
                }
            });
        });

        $('#cancelarBtn').click(function(e) {
            $('#ajaxModel').modal('hide');
        });

        $('body').on('click', '.deleteProduct', function() {

            var proveedor_id = $(this).data("id");
            confirm("¿Seguro que quieres eliminar?");

            $.ajax({
                type: "DELETE",
                url: "{{ route('ajaxproveedor.store') }}" + '/' + proveedor_id,
                success: function(data) {
                    table.draw();
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        });

    });
</script>
@endsection