<?php

namespace App\Http\Controllers;

use App\Mail\ResponsivaMd;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Ubicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    public function __construct(){
        //$this->middleware('auth')->only('store','destoy'); Solo aplica a los metodos mencionado
        $this->middleware('verified')->except('index', 'show','home'); //Aplica a todos los metodos excepto a los metodos mencionado
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function home(){
        $productos=Producto::with('categoria:id,nombre_categoria')->with('archivos')->get(); //(Eager loading)
        return view('productos.homeProductos', compact('productos'));
    }


    public function index()
    {
        //$productos= Producto::all();
       $productos= Producto::with('categoria:id,nombre_categoria')->with('archivos')->get();  //Reducir las sentencias sql (Eager loading)
        return view('productos.indexProductos', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $this->authorize('create',Producto::class); //Primer parametro es el nombre del metodo de nuestra policy

        $categorias=Categoria::all();
        return view('productos.formProductos', compact('categorias'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create',Producto::class); //Primer parametro es el nombre del metodo de nuestra policy

        $request ->validate([
            'nombre' => 'required |min:5|max:255',
            'precio' => 'required |numeric|min:0',
            'descripcion' => 'required |min:5|max:255',
            'contenido' => ['required'],
            'categoria_id' => 'required',
        ]);

        //$request->merge(['user_id' => Auth::id()]); //Esto sirve para agregarle mas atributos
        $producto = Producto::create($request->all()); //solo funciona si los nombres de las columnas corresponden a los nombres del formulario

        $ubicacions=Ubicacion::all();

        foreach($ubicacions as $ubicacion){
            $producto->ubicacions()->attach($ubicacion->id, ['existencias' => 0, 'created_at' => now(), 'updated_at' => now()]);
        }

        return redirect('/productos') //redirecciona al index
        ->with([
            'mensaje' => '¡Producto Agregado!',
            'alert-type' => 'alert-success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return view('productos.showProducto',compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        $this->authorize('update',$producto); //Primer parametro es el nombre del metodo de nuestra policy

        $categorias=Categoria::all();
        return view('productos.formProductos', compact('producto', 'categorias'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $this->authorize('update',$producto); //Primer parametro es el nombre del metodo de nuestra policy


        $request ->validate([
            'nombre' => 'required |min:5|max:255',
            'precio' => 'required |numeric|min:0',
            'descripcion' => 'required |min:5|max:255',
            'contenido' => ['required'],
            'categoria_id' => 'required',
        ]);
        Producto::where('id', $producto->id)->update($request->except(['_token','_method']));


        return redirect('/productos')
        ->with([
            'mensaje' => 'Actualizacion exitosa',
            'alert-type' => 'alert-success',
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $this->authorize('delete',$producto); //Primer parametro es el nombre del metodo de nuestra policy

        foreach($producto->archivos as $archivo){
            Storage::delete($archivo->nombre_hash);
        }

        $producto->delete();

        return redirect('/productos')
        ->with([
            'mensaje' => 'Producto eliminado',
            'alert-type' => 'alert-danger',
        ]);
    }


    public function enviarResponsiva(){
        Mail::to(Auth::user()->email)->send(new ResponsivaMd());
        return redirect()->back();
    }

}