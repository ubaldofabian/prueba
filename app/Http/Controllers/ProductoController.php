<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\True_;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['productos']=Producto::paginate();

        return view('producto.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function create()
    {
        return view('producto.crear');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */




    public function store(Request $request)
    {
//        $datosProducto = request()->all();
        $datosProducto = request()->except('_token');
        Producto::insert($datosProducto);

//        return response()->json($datosProducto);
          return redirect('producto')->with('mensaje','Producto Agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */





    public function edit($id)
    {
        $producto=Producto::findOrFail($id);
        return view('producto.editar', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */




    public function update(Request $request, $id)
    {
        //Se le quita el token y el metodo para actualizar
        //Se pregunta si el registro tiene el id igual al que esta pasando
        $datosProducto = request()->except(['_token','_method']);
        Producto::where('id','=',$id)->update($datosProducto);
        //Se vuelve a buscar la informacion de acuerdo a ese ID y se retorna
        $producto=Producto::findOrFail($id);
        return view('producto.editar', compact('producto'));

    }






    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Producto::destroy($id);
        return redirect('producto')->with('mensaje','Producto borrado');

    }
}
