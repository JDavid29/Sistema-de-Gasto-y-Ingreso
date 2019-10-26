@extends('layouts.app')

@section('content')
	<!---->
	<div class="container">
	    <div class="row justify-content-center">
	        <div class="col-md-8">
	            <div class="card">
	                <div class="card-header d-flex justify-content-between align-items-center">
	                    <span>Agregar Ingreso</span>
	                    <a href="/ingresos" class="btn btn-primary btn-sm">Volver a lista de ingresos...</a>
	                </div>
	                <div class="card-body">
	                  @if ( session('mensaje') )
	                    <div class="alert alert-success">{{ session('mensaje') }}</div>
	                  @endif
	                  <form method="POST" action="/ingresos">
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
	                      value="{{ old('nombre') }}"
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
	                      value="{{ old('descripcion') }}"
	                    />

	                    @error('fecha')
					        <div class="alert alert-danger alert-dismissible fade show" role="alert">
					        	La Fecha es Obligatorio
					        	<button type="button" class="close" data-dismiss="alert" aria-label="close">
					            	<span area-hidden="true">&times;</span>
					        	</button>
					        </div>
				    	@enderror

				    	<input type="date" name="fecha" placeholder="Fecha Del Ingreso" class="form-control mb-2" value="{{ old('fecha') }}">


					    @error('monto')
					        <div class="alert alert-danger alert-dismissible fade show" role="alert">
					        	El Monto es Obligatorio
					        	<button type="button" class="close" data-dismiss="alert" aria-label="close">
					            	<span area-hidden="true">&times;</span>
					          	</button>
					        </div>
					    @enderror

				    	<input type="integer" name="monto" placeholder="Monto Del Ingreso" class="form-control mb-2" value="{{ old('monto') }}">

	                    <button class="btn btn-primary btn-block" type="submit">Guardar</button>
	                  </form>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>


@endsection