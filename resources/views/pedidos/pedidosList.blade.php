@extends('layouts.sbadmin')
@section('content')

<script>
    document.title = "Pedidos | Dr. Pet";
</script>

<script src="{{asset('libs/jquery/jquery.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('libs/datatables/dataTables.bootstrap4.min.css') }}">

{{-- @if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif --}}
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<div class="card-shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Lista de Pedidos</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="table" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>estado</th>
                        <th>fecha pedido</th>
                        <th>fecha entrega</th>
                        <th>importe</th>
                        <th>cliente</th>
                        <th>descuento</th>
                        <th>Estados</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pedidos as $pedido)
                        <tr>
                            <td>{{ $pedido->codigo }}</td>
                            <td> 
                                <span class="{{ trim($pedido->estado) === 'REST' ? 'bg-blue-500 text-white font-bold py-2 px-2 border border-blue-700 rounded text-center mx-2' :
                                    (trim($pedido->estado) === 'CANCEL' ? 'bg-red-500 text-white font-bold py-2 px-2 border border-blue-700 rounded text-center mx-2' :
                                    (trim($pedido->estado) === 'RUTA' ? 'bg-yellow-500 text-white font-bold py-2 px-2 border border-blue-700 rounded text-center mx-2' :
                                    (trim($pedido->estado) === 'ENTREGADO' ? 'bg-green-500 text-white font-bold py-2 px-2 border border-blue-700 rounded text-center mx-2' :
                                    (trim($pedido->estado) === 'RECHAZADO' ? 'bg-purple-500 text-white font-bold py-2 px-2 border border-blue-700 rounded text-center mx-2' : '')))) }}">
                                    {{ $pedido->estado }}
                                </span>
    
                                </td>
                            <td>{{ $pedido->fecha_hora_pedido }}</td>
                            <td>{{ $pedido->fecha_hora_entrega }}</td>
                            <td>{{ $pedido->importe_total }}</td>
                            <td>{{ $pedido->cliente }}</td>
                            <td>{{ $pedido->codigodescuento }}</td>
                            <td class="text-center">
                                <!--Boton de editar-->
                                <a class="btn btn-circle btn-warning" href="{{ route('pedidos.edit',$pedido) }}">
                                    <i class="fas fa-edit"></i>
                                </a>
                                

                                <!--Boton de eliminar-->
                                <a class="btn btn-circle btn-danger" href="#" data-toggle="modal" data-target="#deleteProveedorModal{{$pedido->codigo}}">
                                    <i class="fas fa-trash"></i>
                                </a> 

                                {{-- <a class="btn btn-circle btn-danger" href="{{ route('restaurante.destroy', ['restaurante' => $restaurante->codigo]) }}">
                                    <i class="fas fa-trash"></i>
                                </a> --}}

                                <!--Modal para borrar registro-->
                                 <div class="modal fade" id="deleteProveedorModal{{$pedido->codigo}}" tabindex="-1" role="dialog"  aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">¿Seguro que quiere eliminar a {{$pedido->nombre}}?</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">Ingrese la contraseña de su usuario para borrarlo.
                                                @if(isset($pedido))
                                                     <form method="POST" action="{{ route('pedidos.destroy', ['pedido' => $pedido->codigo]) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                                                            <button class="btn btn-primary" type="submit">Confirmar</button>
                                                        </div>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>  

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@if($errors->any())
    <script>
        $(document).ready(function(){
            $("#deleteModal").modal('show');
        });
    </script>
@endif

@endsection
