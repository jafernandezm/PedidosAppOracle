<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;


class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $clientes = Clientes::get();
        //\dd($restaurantes);
        //\dd($pedidos);
        return view('cliente.clienteList', compact(['clientes']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function show(Clientes $clientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function edit(Clientes $clientes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clientes $clientes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
   

    public function destroy($cliente)
    {
        try {
            $deleted = Clientes::where('DNI', $cliente)->delete();
    
            if ($deleted) {
                return back()->with('message', 'Cliente eliminado exitosamente');
            } else {
                return back()->withErrors(['message' => 'El cliente no existe']);
            }
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
    
            if (strpos($errorMessage, "ORA-20001") !== false) {
                return back()->withErrors(['message' => 'No se puede eliminar el cliente debido a que tiene pedidos en estado REST o RUTA']);
            } else {
                return back()->withErrors(['message' => 'Error al eliminar el cliente']);
            }
        }
    }

}
