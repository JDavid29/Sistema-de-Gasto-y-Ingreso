@extends('layouts.app')
<!--estiende el menu o como se llame la parte de ariba-->

@section('content')

	<h1 class="display-4 text-center">Bienvenid@</h1>

	<div class="container">
	    <div class="row justify-content-center">
	        <div class="col-md-10"><!--UN POCO MAS ANCHO-->
	            <div class="card">
	                <div class="card-header d-flex justify-content-between align-items-center">
	                    <span>Lista de Ingresos para {{auth()->user()->name}}</span>
	                    <a href="/ingresos/create" class="btn btn-primary btn-sm">Nuevo Ingreso</a>
	                    <!--VISTA PARA INGRESOS-->
	                    <a href="/gastos" class="btn btn-primary btn-sm">Gasto</a>
	                    <!--	CORREO EMAIL -->
	                    <a href="/correo" class="btn btn-primary btn-sm">Contacto</a>
	                </div>

	                <!--MENSAJE PARA LAELIMINACION DE DATOS-->
	                @if ( session('mensaje') )
	                    <div class="alert alert-success">{{ session('mensaje') }}</div>
	                @endif

	                <div class="card-body">
	                    <table class="table">
	                        <thead>
	                            <tr>
	                            <th scope="col">#id</th>
	                            <th scope="col">Nombre Del Ingreso</th>
					            <th scope="col">Descripcion Del Ingreso</th>   <!--  -->
					            <th scope="col">Fecha Del Ingreso</th>   <!--  -->
					            <th scope="col">Monto Del Ingreso</th>   <!--  -->
	                            <th scope="col">Acción</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                            @foreach ($ingresos as $item)
	                            <tr>
	                                <th scope="row">{{ $item->id }}</th>
	                                <td>{{ $item->nombre }}</td>
	                                <td>{{ $item->descripcion }}</td>
	                                <td> {{$item->fecha}} </td>
              						<td> {{$item->monto}} </td>
	                                <td>
	                                	<!--apellidoGASTO/VARIBLE-ITEM-a-ID-->
	                                	<a href="/ingresos/{{$item->id}}/edit" class="btn btn-warning btn-sm">Editar</a><!-- ruta de botones con la clase boostrap -->
	                                	<!--  -->

						                 <!-- Esto no es mas q Boostrap -->
						                 <!--LOS RESOURCE NO NECESITAN MENCIONANRSE SU FUNCION X Q YA ESTAN DEFINIDA-->
						                <form action="/ingresos/{{$item->id}}" method="POST" class="d-inline">    <!-- d-inline es para alinear en el espacio orizontal -->
						                 	@method('DELETE')    <!-- Metodo para eliminar  -->
						                  	@csrf
						                  	<button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
						                </form>
	                                </td>

	                            </tr>
	                            @endforeach
	                        </tbody>
	                    </table>
	                    {{$ingresos->links()}}
	                {{-- fin card body --}}
	                </div>
	            </div>
	        </div>
	    </div>
	</div>

@endsection