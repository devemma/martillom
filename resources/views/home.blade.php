@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Sistema web de control de inventarios <br> Panel de control</div>

          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif

            {{ Auth::user()->name }} <br>¡Iniciaste sesión!
          </div>               
        </div>
      </div>
    </div>
  </div>
</div>

<br><br>
<div class="container">
    <!-- Example row of columns -->
    <div class="row">
      <div class="col-md-4">
      <h2><span class="badge badge-success">Inventarios de productos</span></h2>
        <img class="mb-4" src="{{ asset('img/productos.png') }}" alt="" width="128" height="128">
        <p>Ver lista de productos en inventario</p>
        <p><a class="btn btn-success" href="{{ url('ajaxproducts')}}" role="button">Ir &raquo;</a></p>
        
      </div>
      <div class="col-md-4">
      <h2><span class="badge badge-success">Lista de proveedores</span></h2>
        <img class="mb-4" src="{{ asset('img/proveedores.png') }}" alt="" width="128" height="128">
        <p>Ver lista de proveedores del negocio</p>
        <p><a class="btn btn-success" href="{{ url('ajaxproveedor')}}" role="button">Ir &raquo;</a></p>
      </div>
      <div class="col-md-4">
      <h2><span class="badge badge-success">Registrar usuarios</span></h2>
        <img class="mb-4" src="{{ asset('img/helmet.png') }}" alt="" width="128" height="128">
        <p>Dar de alta usuarios al sistema</p>
        <p><a class="btn btn-success" href="{{ url('register') }}" role="button">Ir &raquo;</a></p>
      </div>
    </div>
    <br><br>

    <!-- Example row of columns -->
    <div class="row">
      <div class="col-md-4">
      <h2><span class="badge badge-success">Mostrar compras</span></h2>
        <img class="mb-4" src="{{ asset('img/compras.png') }}" alt="" width="128" height="128">
        <p>Ver lista de compras realizadas</p>
        <p><a class="btn btn-success" href="{{ url('ajaxcompra')}}" role="button">Ir &raquo;</a></p>
      </div>
      <div class="col-md-4">
      <h2><span class="badge badge-success">Mostrar ventas</span></h2>
        <img class="mb-4" src="{{ asset('img/ventas.png') }}" alt="" width="128" height="128">
        <p>Ver lista de ventas realizadas</p>
        <p><a class="btn btn-success" href="{{ url('ajaxventa')}}" role="button">Ir &raquo;</a></p>
      </div>
      <div class="col-md-4">
      <h2><span class="badge badge-success">Reporte de ventas</span></h2>
        <img class="mb-4" src="{{ asset('img/reportes.png') }}" alt="" width="128" height="128">
        <p>Ver reporte de ventas realizadas</p>
        <p><a class="btn btn-success" href="{{ url('reportes')}}" role="button">Ir &raquo;</a></p>
      </div>
</div>

@endsection
