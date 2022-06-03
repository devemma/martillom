@extends('layouts.tablalayout')

@section('content')
<div class="container text-center">
<img class="mb-4" src="{{ asset('img/chart.png') }}" alt="" width="579" height="320">
    <h3><span class="badge badge-success">Reportes</span> <span class="badge badge-dark">Martillo</span></h3>
    <br>
    <h3>
        <br>
        <span class="badge badge-danger">Todo los precios están en pesos mexicanos</span>
    </h3>
    <br><br><br>
    <table id="ejemplo" class="table table-bordered data-table" width="100%">
        <thead>
            <tr>
                <th>Núm.</th>
                <th>Fecha de venta</th>
                <th>ID Producto</th>
                <th>Cantidad</th>
                <th>Monto de venta $</th>
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
                    <input type="hidden" name="venta_id" id="venta_id">

                    <div class="form-group">
                        <label for="name" class="col-sm-4 control-label">Producto</label>
                        <div class="col-sm-12">
                            <select class="form-control" name="id_producto" id="id_producto"></select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-12 control-label">Cantidad</label>
                        <div class="col-sm-12">
                            <input type="number" min="1" class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad de productos" value="" maxlength="10" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-12 control-label">Precio Unitario $</label>
                        <div class="col-sm-12">
                            <input type="number" disabled class="form-control" id="preciou" name="preciou">
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
            ajax: "{{ route('ajaxventa.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'fecha',
                    name: 'fecha'
                },
                {
                    data: 'id_producto',
                    name: 'id_producto'
                },
                {
                    data: 'cantidad',
                    name: 'cantidad'
                },
                {
                    data: 'monto',
                    name: 'monto'
                }
            ]
        });

        $('#createNewProduct').click(function() {
            $('#saveBtn').val("create-product");
            $('#venta_id').val('');
            $('#productForm').trigger("reset");
            $('#modelHeading').html("Registrar Venta");

            $.get('/precio/' + $('#id_producto').val(),
                function(data) {
                    var prod = data['precio_c'];
                    $('#preciou').val(prod);
                    //console.log(prod);
                });

            $.get('/productos',
                function(data) {
                    $("#id_producto").empty();
                    $.each(data, function() {
                        $("#id_producto").append("<option value=" + this.id + ">" + this.nombre + "</option>");
                    });

                });

            $('#ajaxModel').modal('show');
        });

        $('#id_producto').change(function(){
            $.get('/precio/' + $('#id_producto').val(),
                function(data) {
                    var prod = data['precio_c'];
                    $('#preciou').val(prod);
                    //console.log(prod);
                });
        });

        $('#cancelarBtn').click(function(e) {
            $('#ajaxModel').modal('hide');
        });

        $('#saveBtn').click(function(e) {
            e.preventDefault();
            $(this).html('Enviando...');

            var total = Number($("#preciou").val()) * Number($('#cantidad').val());

            $.ajax({
                data: {
                    id_producto: $('#id_producto').val(),
                    cantidad: $('#cantidad').val(),
                    monto: total
                },
                url: "{{ route('ajaxventa.store') }}",
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
    });
</script>
@endsection