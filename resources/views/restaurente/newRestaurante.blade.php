@extends('layouts.sbadmin')
@include('restaurente.restauranteForm')
@section('content')
<script>document.title = "Agregar proveedor | Dr. Pet";</script>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Registrar Proveedor</h1>
</div>
<hr>
@yield('restaurante-form')
@endsection