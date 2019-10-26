<?php

namespace App\Http\Controllers;

use App\Mail\MessageReceived;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*PARA QUE EL LOGIN VERIFIQUE SI INICIO SESION O NO*/
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        //
        //$usuarioEmail = auth()->user()->email;
        //VARIABLE = APP/MODELO.php QUE SOLO GUARDE CUANDO (USUARIO,TENGA ESE $EMAIL)
        return view('correo.correo');
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
        //validamos los elementos del formulario
        //guardamos los datos en una variable
        $mensaje = $request->validate([
            'nombre'=> 'required',
            'email' =>'required|email',
            'asunto'=> 'required',
            'mensaje'=> 'required|min:3'
        ]); //que nombre y descripcion no venga vacio

        //para enviar email e import presione F5
        //php artisan make:mail MessageReceived F5 <-------en consola
        Mail::to('jose.david.jaa@gmail.com')->send(new MessageReceived($mensaje)); //la pasamos la variable al constructor

        //redirigimos a la pagina anterior
        return back()->with('mensaje', 'Correo Electronico Enviado!');//back te vuelve atras pero con los datos que guardaste mas un mensaje por encima del formulario

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

/*
php artisan r:l     NOS MUESTRA TOAS LAS FUNCIONES DE RESOURCE*/