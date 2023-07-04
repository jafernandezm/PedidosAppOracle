<?php

namespace App\Http\Controllers;

use App\Models\Pedidos;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $pedidos=Pedidos::get();
        //\dd($restaurantes);
        //\dd($pedidos);
        return view('pedidos.pedidosList',compact(['pedidos']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        // return view('restaurente.newRestaurante');
        return view('pedidos.newPedidos');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validationRules);
        $restauranteData = $request->except(['_token', '_method', 'created_at', 'updated_at']);
        //\dd($restauranteData);
        $ultimoCodigo = Restaurantes::max('codigo'); // Recupera el último código

        $nuevoCodigo = $ultimoCodigo + 1; // Aumenta el último código en 1

        $restauranteData['codigo'] = $nuevoCodigo; // Asigna el nuevo código al arreglo de datos
        Restaurantes::create([
            'codigo' => $restauranteData['codigo'],
            'nombre' => $restauranteData['nombre'],
            'calle' => $restauranteData['calle'],
            'codigo_postal' => $restauranteData['codigo_postal'],
            'comision' => $restauranteData['comision'],
        ]);
        return redirect()->route('restaurante.index')->with('message','¡Restaurante creado con éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function show(Pedidos $pedidos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedidos $pedido)
    {
        //return view('restaurente.RestauranteEdit',compact(['restaurante']));

        return view('pedidos.PedidosEdit',compact(['pedido']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedidos $pedido)
    {   
        $pedidoData = $request->except(['_token', '_method', 'created_at', 'updated_at']);
        
        $rowsUpdated = Pedidos::where('codigo', $pedido->codigo)->update([
            'estado' => $pedidoData['estado'],
            'fecha_hora_pedido' => $pedidoData['fecha_hora_pedido'],
            'fecha_hora_entrega' => $pedidoData['fecha_hora_entrega'],
            'importe_total' => $pedidoData['importe_total'],
            'cliente' => $pedidoData['cliente'],
            'codigodescuento' => $pedidoData['descuento']
        ]);
    
        if ($rowsUpdated > 0) {
            // El registro se actualizó correctamente
            return redirect()->route('pedidos.index')->with('message', '¡Pedido actualizado exitosamente!');
        } else {
            // No se actualizó ningún registro
            return redirect()->route('pedidos.index')->with('message', 'No se pudo actualizar el pedido.');
        }
    }
    
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedidos $pedidos)
    {
        //
    }
}
