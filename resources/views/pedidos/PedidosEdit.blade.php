@extends('layouts.sbadmin')
@include('pedidos.pedidosForm')
@section('content')

<script>document.title = "Editando proveedor | Dr. Pet";</script>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Editando el registro de {{ $pedido->codigo}}</h1>
</div>
<hr>
 @yield('pedidos-form', $pedido) 

@endsection