<?php

namespace App\Http\Controllers;

use App\Models\Restaurantes;
use Illuminate\Http\Request;

class RestaurantesController extends Controller
{
    private $validationRules;
    public function __construct(){
        $this->validationRules = [
            'nombre' => 'required|string|max:255',
            'calle' => 'required|string|max:255',
            'codigo_postal' => 'required|integer|max:9999',
            'comision' => 'required|integer',
        ];
    }
    public function index()
    {
        $restaurantes=Restaurantes::get();
        //\dd($restaurantes);
        return view('restaurente.restauranteList',compact(['restaurantes']));
    }

    public function create()
    {
        return view('restaurente.newRestaurante');
    }

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
    public function show(Restaurantes $restaurantes)
    {
        //
    }
    public function edit(Restaurantes $restaurante)
    {
        return view('restaurente.RestauranteEdit',compact(['restaurante']));
    }
    public function update(Request $request, Restaurantes $restaurante)
    {
  
        $restauranteData = $request->except(['_token', '_method', 'created_at', 'updated_at']);
        //\dd($restauranteData);
       Restaurantes::where('codigo','=',$restaurante->codigo)->update([
        'nombre' => $restauranteData['nombre'],
        'calle' => $restauranteData['calle'],
        'codigo_postal' => $restauranteData['codigo_postal'],
        'comision' => $restauranteData['comision'],
       ]
       );
       return redirect()->route('restaurante.index')->with('message','¡Inventario de producto modificado con éxito!');
    }
    public function destroy($restaurante)
    {
        $codigo = Restaurantes::where('codigo', $restaurante)->first();
    
        if ($codigo) {
            // Eliminar registros relacionados en la tabla HORARIOS
            //$codigo->horarios()->delete();
    
            // Eliminar el restaurante
            $codigo->delete();
    
            return back()->with('success', 'Restaurante eliminado exitosamente');
        } else {
            return back()->withErrors(['message' => 'El restaurante no existe']);
        }
    }
}
