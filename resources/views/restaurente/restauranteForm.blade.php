@section('restaurante-form')


<div>
    <h3>Datos del Restaurante</h3>
    <hr>
    @if (isset($restaurante))
    <form class="form" method="POST" action="{{ route('restaurante.update',$restaurante) }}">
        @method('PATCH')
        <p>crear</p>
    @else
    <form class="form" method="POST" action="{{ route('restaurante.store') }}">
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
                    @if (isset($restaurante))
                        value="{{ $restaurante->codigo }}"
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
                <label for="proveedor">Nombre:</label>
            </div>
            <div class="col-md-5">
                <input 
                    type="text"
                    class="form-control @error('nombre') is-invalid @enderror"
                    name="nombre"
                    id="nombre"
                    placeholder="Nombre..."
                    @if (isset($restaurante))
                    value="{{ $restaurante->nombre }}"
                    @else
                    value="{{ old('restaurante') }}"
                    @endif
                    required>
                @error('nombre')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
        </div>

        {{-- CONCEPTO --}}
        <div class="form-group">
            <div class="col-sm-1 text-left">
                <label for="calle">Calle:</label>
            </div>
            <div class="col-md-5">
                <input
                    type="text"
                    class="form-control @error('concepto') is-invalid @enderror"
                    name="calle"
                    id="calle"
                    placeholder="Calle..."
                    @if (isset($restaurante))
                    value="{{ $restaurante->calle }}"
                    @else
                    value="{{ old('restaurante') }}"
                    @endif
                    required>
                @error('calle')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
        </div>

        {{-- CIUDAD --}}
        <div class="form-group">
            <div class="col-sm-2 text-left">
                <label for="codigo_postal">Codigo postal:</label>
            </div>
            <div class="col-md-3">
                <input
                    type="text"
                    min="0"
                    class="form-control @error('codigo_postal') is-invalid @enderror"
                    name="codigo_postal"
                    id="codigo_postal"
                    placeholder="Codigo Postal..."
                    @if (isset($restaurante))
                    value="{{ $restaurante->codigo_postal }}"
                    @else
                    value="{{ old('restaurante') }}"
                    @endif
                    required>
                @error('codigo_postal')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
        </div>

        {{-- PROVINCIA --}}
        <div class="form-group">
            <div class="col-sm-1 text-left">
                <label for="comision">Comision:</label>
            </div>
            <div class="col-md-3">
                <input
                    type="number"
                    min="0"
                    max="1000"
                    class="form-control @error('comision') is-invalid @enderror"
                    name="comision"
                    id="comision"
                    placeholder="Comision..."
                    @if (isset($restaurante))
                    value="{{ $restaurante->comision }}"
                    @else
                    value="{{ old('restaurante') }}"
                    @endif
                    required>
                @error('comision')
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