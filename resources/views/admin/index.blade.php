@extends('layouts.app')

@section('contenido')

<div class="container">
    <div class="row">

		<!-- Administrador -->
		<div class="col-sm-12">
			<div class="titulo-secundario">Autores <a href="{!! route('nuevo_autor') !!}" class="boton boton float-right">Añadir Autor</a></div>
			<hr>
		</div>
		
		@foreach ($datos_vista['autores'] as $autor)
			<!-- Mostramos el autor con su imagen -->
			<div class="col-sm-3">
				<div class="caja-minuatura">
			      <img src="{!! asset('autores/perfil/'.$autor->id.'/'.$autor->imagen)  !!}" alt="{!! $autor->name !!}">
			      <div class="caja-autor">
			        <h3>{!! $autor->name !!}</h3>
			        <a href="{!! route('borrar_autor', $autor->id) !!}" class="boton boton-alerta" onclick="return confirm('¿Está seguro de borrar a {!! $autor->name !!}?. ¡¡¡Se borrarán sus noticias escritas!!!!')">Borrar usuario</a>
			        <a href="{!! route('editar_autor', $autor->id) !!}" class="boton boton-login">Editar</a>
			      </div>
			    </div>
			</div>
		@endforeach
		
		<div class="col-sm-12">
			{{ $datos_vista['autores']->links() }}
		</div>

		<!-- Noticias -->
		<div class="col-sm-12">
			<div class="titulo-secundario">Gestione sus noticias destacadas </div>
			<hr>
		</div>


		<!-- Noticias -->
		<div class="col-sm-12 selector-noticias-destacadas">
			{!! Form::open(['route' => 'establecer_orden_noticias']) !!}
				<div class="col-sm-2">Seleccione noticia: </div>

				<div class="col-sm-5">
					<select name="noticia_destacada" id="select_noticia_destacada"  class="form-control" required="">
						<option disabled="" selected=""></option>
		            	@foreach ($datos_vista['noticias_no_destacadas'] as $noticia)
		            		<option value="{!! $noticia->id !!}">{!! $noticia->titulo !!}</option>
		            	@endforeach
		            </select>
		        </div>

				<div class="col-sm-2">En la posición:</div>

				<div class="col-sm-1">
					<select name="posicion" id="select_posicion_destacada"  class="form-control" required="">
	            		<option disabled="" selected=""></option>
		            	@foreach ($datos_vista['posiciones_destacadas'] as $key => $posicion)
		            		<option value="{!! $key !!}">{!! $posicion !!}</option>
		            	@endforeach
		            </select>
				</div>
				
				{!! Form::submit('Guardar', ['class' => 'btn btn btn-primary']) !!}
			{!! Form::close() !!}

			<hr>
		</div>

		<!-- Orden de la noticia -->
		
			@foreach ($datos_vista['noticias_destacadas'] as $destacada)
				<div class="col-sm-3">
					<div class="caja-minuatura">
				      	<img src="{!! asset('noticias/'.$destacada->noticia->id.'/'.$destacada->noticia->imagen) !!}" alt="{!! $destacada->noticia->slug !!}">
				      	<div class="extracto-noticia">
					        <h3>{!! $destacada->noticia->titulo !!}</h3>
					        <p>{!! $destacada->noticia->extracto !!}</p>
					    </div>
					    <a href="{!! route('quitar_noticia_destacada',$destacada->id) !!}" class="boton boton-alerta" title="">Quitar destacada</a>
				    </div>
			    </div>
			@endforeach
		

    </div>
</div>
@endsection<!-- Sección dedicada al cuerpo de la página -->


		