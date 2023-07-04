@section('pedidos-form')


<div>
    <h3>Datos del Pedidos</h3>
    <hr>
    @if (isset($pedido))
    <form class="form" method="POST" action="{{ route('pedidos.update',$pedido) }}">
        @method('PATCH')
        <p>crear</p>
    @else
    <form class="form" method="POST" action="{{ route('pedidos.store') }}">
    @endif
        @csrf
        {{-- restaurante --}}
        @if (isset($restaurante))
        <div class="form-group">
            <div class="col-sm-1 text-left">
                <label for="nit">codigo</label>
            </div>
            <div class="col-md-4">
                <input 
                    type="number"
                    class="form-control @error('codigo') is-invalid @enderror"
                    name="codigo"
                    id="codigo"
                    placeholder="Codigo..."
                    @if (isset($pedido))
                        value="{{ $pedido->codigo }}"
                    @else
                    value="{{ old('codigo') }}"
                    @endif
                    required>
                    @error('codigo')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
            </div>
        </div>
        @endif
        {{-- NOMBRE PROVEEDOR --}}
        <div class="form-group">
            <div class="col-sm-1 text-left">
                <label for="estado">Estado:</label>
            </div>
            <div class="col-md-5">
                <select class="form-control @error('estado') is-invalid @enderror" name="estado" id="estado" required>
                    <option value="">Selecciona un estado</option>
                    <option value="REST" {{ isset($pedido) && trim($pedido->estado) === 'REST' ? 'selected' : '' }}>REST</option>
                    <option value="CANCEL" {{ isset($pedido) && trim($pedido->estado) === 'CANCEL' ? 'selected' : '' }}>CANCEL</option>
                    <option value="RUTA" {{ isset($pedido) && trim($pedido->estado) === 'RUTA' ? 'selected' : '' }}>RUTA</option>
                    <option value="ENTREGADO" {{ isset($pedido) && trim($pedido->estado) === 'ENTREGADO' ? 'selected' : '' }}>ENTREGADO</option>
                    <option value="RECHAZADO" {{ isset($pedido) && trim($pedido->estado) === 'RECHAZADO' ? 'selected' : '' }}>RECHAZADO</option>
                </select>
                @error('estado')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        

        {{-- CONCEPTO --}}
        <div class="form-group">
            <div class="col-sm-1 text-left">
                <label for="calle">Fecha Pedido:</label>
            </div>
            <div class="col-md-5">
                <input
                    type="date"
                    class="form-control @error('fecha_hora_pedido') is-invalid @enderror"
                    name="fecha_hora_pedido"
                    id="fecha_hora_pedido"
                    placeholder="Fecha Pedido..."
                    @if (isset($pedido))
                    value="{{ date('Y-m-d', strtotime($pedido->fecha_hora_pedido)) }}"
                    @else
                    value="{{ old('fecha_hora_pedido') }}"
                    @endif
                    required>
                @error('fecha_hora_pedido')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        

        {{-- CIUDAD --}}
        <div class="form-group">
            <div class="col-sm-1 text-left">
                <label for="calle">Fecha Pedido:</label>
            </div>
            <div class="col-md-5">
                <input
                    type="date"
                    class="form-control @error('fecha_hora_entrega') is-invalid @enderror"
                    name="fecha_hora_entrega"
                    id="fecha_hora_entrega"
                    placeholder="Fecha Pedido..."
                    @if (isset($pedido))
                    value="{{ date('Y-m-d', strtotime($pedido->fecha_hora_entrega)) }}"
                    @else
                    value="{{ old('fecha_hora_entrega') }}"
                    @endif
                    required>
                @error('fecha_hora_entrega')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        

        {{-- PROVINCIA --}}
        <div class="form-group">
            <div class="col-sm-1 text-left">
                <label for="comision">Importe Total:</label>
            </div>
            <div class="col-md-3">
                <input
                    type="number"
                    
                    class="form-control @error('comision') is-invalid @enderror"
                    name="importe_total"
                    id="importe_total"
                    placeholder="Importe..."
                    @if (isset($pedido))
                    value="{{ $pedido->importe_total }}"
                    @else
                    value="{{ old('pedido') }}"
                    @endif
                    required>
                @error('comision')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
        </div>
        {{-- PROVINCIA --}}
        <div class="form-group">
            <div class="col-sm-1 text-left">
                <label for="cliente">Cliente</label>
            </div>
            <div class="col-md-3">
                <input
                    type="text"
                    class="form-control @error('cliente') is-invalid @enderror"
                    name="cliente"
                    id="cliente"
                    placeholder="cliente..."
                    @if (isset($pedido))
                    value="{{ $pedido->cliente }}"
                    @else
                    value="{{ old('pedido') }}"
                    @endif
                    required>
                @error('cliente')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-sm-1 text-left">
                <label for="descuento">Descuento:</label>
            </div>
            <div class="col-md-3">
                <input
                    type="number"
                    min="0"
                   
                    class="form-control @error('comision') is-invalid @enderror"
                    name="descuento"
                    id="descuento"
                    placeholder="Descuento..."
                    @if (isset($pedido))
                    value="{{ $pedido->codigodescuento }}"
                    @else
                    value="{{ old('pedido') }}"
                    @endif
                    required>
                @error('descuento')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
        </div>
        {{-- BOTON --}}
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Registrar proveedor</button>
            <a href="{{ route('restaurante.index') }}" class="btn btn-link">Volver al listado de proveedores</a>
        </div>

        {{-- <div class="text-left">
            <button type="submit" class="btn btn-success btn-icon-split">
                <span class="icon"><i class="fas fa-save"></i></span>
                <span class="text">Guardar</span>
            </button>
        </div> --}}

    </form>
</div>
@endsection

{{-- @section('scripts')
    <script>
        $(document).ready(function() {
            $('#proveedores').DataTable();
        } );
    </script>
@endsection --}}