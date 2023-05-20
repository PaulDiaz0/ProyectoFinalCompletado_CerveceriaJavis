<?php

namespace App\Http\Controllers;

use App\Models\ProductoUbicacion;
use App\Models\Producto;
use App\Models\Ubicacion;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Location;

class ProductoUbicacionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductoUbicacion  $productoUbicacion
     * @return \Illuminate\Http\Response
     */
    public function show(ProductoUbicacion $productoUbicacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductoUbicacion $productoubicacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto, Ubicacion $ubicacion)
    {
        $this->authorize('update',$producto);
        return view('stock',compact('producto','ubicacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductoUbicacion  $productoUbicacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $this->authorize('update',$producto);
        $request ->validate([
        'existencias' => 'required |integer ' ,
        ]);

        $producto->ubicacions()->syncWithoutDetaching([
            $request->ubicacion_id =>['existencias' => $request->existencias]
        ]);

        return redirect()->route('productos.show',$producto->id)
        ->with([
            'mensaje' => '¡Existencias Actualizadas!',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductoUbicacion  $productoUbicacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductoUbicacion $productoUbicacion)
    {
        //
    }
}