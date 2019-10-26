@extends('layouts.app')
<!--estiende el menu o como se llame la parte de ariba-->

@section('content')
	<!---->
	<div class="container">
	    <div class="row justify-content-center">
	        <div class="col-md-8">
	            <div class="card">
	                <div class="card-header d-flex justify-content-between align-items-center">
	                    <span>Modificar Ingreso</span>
	                    <a href="/ingresos" class="btn btn-primary btn-sm">Volver a lista de Ingreso...</a>
	                </div>
	                <div class="card-body">
	                  @if ( session('mensaje') )
	                    <div class="alert alert-success">{{ session('mensaje') }}</div>
	                  @endif
	                  <form method="POST" action="/ingresos/{{$request->id}}">
	                  	@method('PUT')	<!-- metodopara actualizar los datos de manera oculta -->
	                    @csrf
	                    <!--	MENSAJE DE VALIDACION-->
	                    @error('nombre')
				            <div class="alert alert-danger">
				              El Ingreso es Obligatorio
				            </div>
    					@enderror

	                    <input
	                      type="text"
	                      name="nombre"
	                      placeholder="Nombre"
	                      class="form-control mb-2"
	                      value="{{  $request->nombre }}"
	                    />

	                    @error('descripcion')
					        <div class="alert alert-danger alert-dismissible fade show" role="alert">
					          La Descripcion es Obligatorio
					          	<button type="button" class="close" data-dismiss="alert" aria-label="close">
					            	<span area-hidden="true">&times;</span>
					          	</button>
					        </div>
					    @enderror

	                    <input
	                      type="text"
	                      name="descripcion"
	                      placeholder="Descripcion"
	                      class="form-control mb-2"
	                      value="{{ $request->descripcion }}"
	                    />

	                    @error('fecha')
					        <div class="alert alert-danger alert-dismissible fade show" role="alert">
					        	La Fecha es Obligatorio
					        	<button type="button" class="close" data-dismiss="alert" aria-label="close">
					            	<span area-hidden="true">&times;</span>
					        	</button>
					        </div>
				    	@enderror

				    	<input type="date" name="fecha" placeholder="Fecha Del Ingreso" class="form-control mb-2" value="{{ $request->fecha }}">


					    @error('monto')
					        <div class="alert alert-danger alert-dismissible fade show" role="alert">
					        	El Monto es Obligatorio
					        	<button type="button" class="close" data-dismiss="alert" aria-label="close">
					            	<span area-hidden="true">&times;</span>
					          	</button>
					        </div>
					    @enderror

				    	<input type="integer" name="monto" placeholder="Monto Del Ingreso" class="form-control mb-2" value="{{ $request->monto }}">

	                    <button class="btn btn-warning btn-block" type="submit">Editar</button>
	                  </form>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>


@endsection