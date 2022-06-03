@extends('layouts.tablalayout')

@section('content')
<div class="container">
    <h3><span class="badge badge-success">Productos</span> <span class="badge badge-dark">Martillo</span></h3>
    <br>
    <h3><a class="badge badge-success" href="javascript:void(0)" id="createNewProduct"> Crear nuevo producto</a>
        <br><br>
        <span class="badge badge-danger">Todo los precios están en pesos mexicanos</span>
        <br>
        <span class="badge badge-danger">Todo los precios están sujetos a cambios sin previo aviso</span>
    </h3>
    <br><br><br>
    <table id="ejemplo" class="table table-bordered data-table" width="100%">
        <thead>
            <tr>
                <th>Núm.</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Existencia</th>
                <th>Precio Venta $</th>
                <th>Precio Compra $</th>
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
                    <input type="hidden" name="product_id" id="product_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Nombre</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del producto" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Descripción</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción" value="" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Existencia</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" id="existencia" min="0" name="existencia" placeholder="Existencia" value="" maxlength="10" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-12 control-label">Precio de Venta $</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" id="precio_v" min="0" name="precio_v" placeholder="Precio Venta $" value="" maxlength="10" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-12 control-label">Precio de Compra $</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" id="precio_c" min="0" name="precio_c" placeholder="Precio Compra $" value="" maxlength="10" required="">
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

<div class="modal fade" id="addModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="productForm2" name="productForm2" class="form-horizontal">
                    <input type="hidden" name="product_id2" id="product_id2">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Nombre</label>
                        <div class="col-sm-12">
                            <input type="text" disabled class="form-control" id="nombre2" name="nombre2" placeholder="Nombre del producto" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Descripción</label>
                        <div class="col-sm-12">
                            <input type="text" disabled class="form-control" id="descripcion2" name="descripcion2" placeholder="Descripción" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-12 control-label">Existencia actual</label>
                        <div class="col-sm-12">
                            <input type="number" disabled class="form-control" id="existencia2" min="0" name="existencia2" placeholder="Existencia" maxlength="10" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-12 control-label">Añadir Existencia</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" id="existencia22" min="0" name="existencia22" placeholder="Existencia" maxlength="10" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-12 control-label">Precio de Venta $</label>
                        <div class="col-sm-12">
                            <input type="number" disabled class="form-control" id="precio_v2" min="0" name="precio_v2" placeholder="Precio Venta $" maxlength="10" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-12 control-label">Precio de Compra $</label>
                        <div class="col-sm-12">
                            <input type="number" disabled class="form-control" id="precio_c2" min="0" name="precio_c2" placeholder="Precio Compra $" maxlength="10" required="">
                        </div>
                    </div>

                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtn2" value="create">Guardar cambios
                        </button>
                        <button type="submit" class="btn btn-danger" id="cancelarBtn2" value="create">Cancelar
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
            ajax: "{{ route('ajaxproducts.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'nombre',
                    name: 'nombre'
                },
                {
                    data: 'descripcion',
                    name: 'descripcion'
                },
                {
                    data: 'existencia',
                    name: 'existencia'
                },
                {
                    data: 'precio_v',
                    name: 'precio_v'
                },
                {
                    data: 'precio_c',
                    name: 'precio_c'
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
            $('#existencia').prop("disabled", false);
            $('#saveBtn').val("create-product");
            $('#product_id').val('');
            $('#productForm').trigger("reset");
            $('#modelHeading').html("Crear Nuevo Producto");
            $('#ajaxModel').modal('show');
        });

        $('body').on('click', '.editProduct', function() {
            var product_id = $(this).data('id');
            $.get("{{ route('ajaxproducts.index') }}" + '/' + product_id + '/edit', function(data) {
                $('#modelHeading').html("Editar Producto");
                $('#saveBtn').val("edit-user");
                $('#existencia').prop("disabled", true);
                $('#ajaxModel').modal('show');
                $('#product_id').val(data.id);
                $('#nombre').val(data.nombre);
                $('#descripcion').val(data.descripcion);
                $('#existencia').val(data.existencia);
                $('#precio_v').val(data.precio_v);
                $('#precio_c').val(data.precio_c);
            })
        });

        $('#saveBtn').click(function(e) {
            e.preventDefault();
            $(this).html('Enviando...');

            $.ajax({
                data: {
                    product_id: $('#product_id').val(),
                    nombre: $('#nombre').val(),
                    descripcion: $('#descripcion').val(),
                    existencia: $('#existencia').val(),
                    precio_v: $('#precio_v').val(),
                    precio_c: $('#precio_c').val()
                },
                url: "{{ route('ajaxproducts.store') }}",
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

        $('body').on('click', '.addProduct', function() {
            var product_id = $(this).data('id');
            $.get("{{ route('ajaxproducts.index') }}" + '/' + product_id + '/edit', function(data) {
                $('#modelHeading').html("Editar Producto");
                $('#saveBtn').val("edit-user");
                $('#addModel').modal('show');
                $('#product_id2').val(data.id);
                $('#nombre2').val(data.nombre);
                $('#descripcion2').val(data.descripcion);
                $('#existencia2').val(data.existencia);
                $('#precio_v2').val(data.precio_v);
                $('#precio_c2').val(data.precio_c);
            })
        });

        $('#cancelarBtn2').click(function(e) {
            $('#addModel').modal('hide');
        });

        $('#saveBtn2').click(function(e) {
            e.preventDefault();
            $(this).html('Enviando...');

            var total = Number($('#existencia2').val()) + Number($('#existencia22').val());

            $.ajax({
                data: {
                    product_id: $('#product_id2').val(),
                    nombre: $('#nombre2').val(),
                    descripcion: $('#descripcion2').val(),
                    existencia: total,
                    precio_v: $('#precio_v2').val(),
                    precio_c: $('#precio_c2').val()
                },
                url: "{{ route('ajaxproducts.store') }}",
                type: "POST",
                dataType: 'json',
                success: function(data) {

                    $('#productForm2').trigger("reset");
                    $('#addModel').modal('hide');
                    table.draw();

                },
                error: function(data) {
                    console.log('Error:', data);
                    $('#saveBtn2').html('Guardar cambios');
                }
            });
        });

    });
</script>
@endsection