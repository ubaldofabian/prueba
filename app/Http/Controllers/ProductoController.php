<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\True_;

class ProductoController extends Controller
{
    public function index()
    {
        return view('producto.index', [
            'productos' => Producto::query()->where('precio', '>', 40)->get(),
        ]);
    }

    public function create()
    {
        return view('producto.crear');
    }

    public function store(Request $request)
    {
//        $datosProducto = request()->all();
        $datosProducto = request()->except('_token');
        Producto::insert($datosProducto);

//        return response()->json($datosProducto);
        return redirect('producto')->with('mensaje', 'Producto Agregado');
    }

    public function show(Producto $producto)
    {
        //
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('producto.editar', compact('producto'));
    }

    public function update(Request $request, $id)
    {
        //Se le quita el token y el metodo para actualizar
        //Se pregunta si el registro tiene el id igual al que esta pasando
        $datosProducto = request()->except(['_token', '_method']);
        Producto::where('id', '=', $id)->update($datosProducto);
        //Se vuelve a buscar la informacion de acuerdo a ese ID y se retorna
        $producto = Producto::findOrFail($id);
        return view('producto.editar', compact('producto'));

    }

    public function destroy($id)
    {
        Producto::destroy($id);
        return redirect('producto')->with('mensaje', 'Producto borrado');

    }
}
