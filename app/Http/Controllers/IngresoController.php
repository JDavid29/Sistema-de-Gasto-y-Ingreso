<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingreso;   //utilizaremos el modelo creado en App/gastos.php

class IngresoController extends Controller
{
    //---------PROTEGE LAs Rutas Con SECCION o todas SUPER-------------
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return auth()->user();
        //accedemos al email y lo guardamos en esta variable usuarioemail
        $usuarioEmail = auth()->user()->email;
        //VARIABLE = APP/MODELO.php QUE SOLO GUARDE CUANDO (USUARIO,TENGA ESE $EMAIL)
        $ingresos = Ingreso::where('usuario', $usuarioEmail)->paginate(5);
        return view('ingresos.lista',compact('ingresos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //vista gastos/crear
        return view('ingresos.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validamos los elementos del formulario
        $request->validate([
            'nombre'=> 'required',
            'descripcion' =>'required',
            'fecha'=> 'required',
            'monto'=> 'required'
        ]); //que nombre y descripcion no venga vacio

        //
        $ingreso = new Ingreso();//modelo de la migrate
        $ingreso->nombre = $request->nombre;
        $ingreso->descripcion = $request->descripcion;
        $ingreso->fecha = $request->fecha;
        $ingreso->monto = $request->monto;

        $ingreso->usuario = auth()->user()->email;
        $ingreso->save();

        return back()->with('mensaje', 'Ingreso agregado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $request= Ingreso::findOrFail($id);  //va a comparar si realmente existe el id y va a guardar todos los campos en el objeto nota
        return view('ingresos.editar', compact('request'));//nota la pasamos a la vista
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //funcion de actualizacion de DATOS EN LA BASE DE DATOS
        $ingresoUpdate = Ingreso::findOrFail($id);
        $ingresoUpdate->nombre = $request->nombre; //estas tienen los nuevos campos de datos
        $ingresoUpdate->descripcion = $request->descripcion;
        $ingresoUpdate->fecha = $request->fecha;
        $ingresoUpdate->monto = $request->monto;

        $ingresoUpdate->save(); //guardamos

        return back()->with('mensaje', 'Ingreso actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //ELIMINACION DE DATO
        $ingresoEliminar = Ingreso::findOrFail($id);  //comparamos datos
        $ingresoEliminar->delete(); //eliminamos con esta funccion

        return back()->with('mensaje', 'Ingreso ELiminado');//mostramos reutilizando la funcion mensaje
    }



}
