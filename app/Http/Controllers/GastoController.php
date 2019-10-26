<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gastos;   //utilizaremos el modelo creado en App/gastos.php

class GastoController extends Controller
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
        $gastos = Gastos::where('usuario', $usuarioEmail)->paginate(5);
        return view('gastos.lista',compact('gastos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //vista gastos/crear
        return view('gastos.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {               //CREA
        //validamos los elementos del formulario
        $request->validate([
            'nombre'=> 'required',
            'descripcion' =>'required',
            'fecha'=> 'required',
            'monto'=> 'required'
        ]); //que nombre y descripcion no venga vacio

        //
        $gasto = new Gastos();//modelo de la migrate
        $gasto->nombre = $request->nombre;
        $gasto->descripcion = $request->descripcion;
        $gasto->fecha = $request->fecha;
        $gasto->monto = $request->monto;

        $gasto->usuario = auth()->user()->email;
        $gasto->save();

        return back()->with('mensaje', 'Gasto agregado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'hola';
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
        $request= Gastos::findOrFail($id);  //va a comparar si realmente existe el id y va a guardar todos los campos en el objeto nota
        return view('gastos.editar', compact('request'));//nota la pasamos a la vista
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
        $gastoUpdate = Gastos::findOrFail($id);
        $gastoUpdate->nombre = $request->nombre; //estas tienen los nuevos campos de datos
        $gastoUpdate->descripcion = $request->descripcion;
        $gastoUpdate->fecha = $request->fecha;
        $gastoUpdate->monto = $request->monto;

        $gastoUpdate->save(); //guardamos

        return back()->with('mensaje', 'Gasto actualizado');
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
        $gastoEliminar = Gastos::findOrFail($id);  //comparamos datos
        $gastoEliminar->delete(); //eliminamos con esta funccion

        return back()->with('mensaje', 'Gasto ELiminado');//mostramos reutilizando la funcion mensaje
    }
}
