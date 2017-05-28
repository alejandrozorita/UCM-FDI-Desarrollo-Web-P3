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
			<div class="titulo-secundario">Selector orden noticias </div>
			<hr>
		</div>

		<!-- Orden de la noticia -->
		<!-- IMPORTANTE: NO PONGO BOTÓN DE SUBMIT YA QUE LA IDEA ES QUE SE HAGA EL SUBMIT POR AJAX-->
		<div class="col-sm-3">
			<div class="caja-minuatura">
		      	<img src="img/noticia.png" alt="imagen-noticia">
		      	<div class="extracto-noticia">
			        <h3>Título de la noticia 1</h3>
			        <p>Extracto de la noticia. La puede leer a continuación.
			        Extracto de la noticia. La puede leer a continuación</p>
			        <label>Seleccione su posisción</label>
			        <select name="noticia_id">
			        	<option value="posicion_id">1</option>
			        	<option value="posicion_id" selected="">2</option>
			        	<option value="posicion_id">3</option>
			        	<option value="posicion_id">4</option>
			        	<option value="posicion_id">5</option>
			        </select>
			    </div>
		    </div>
		</div>
		<!-- Orden de la noticia -->
		<div class="col-sm-3">
			<div class="caja-minuatura">
		      	<img src="img/noticia.png" alt="imagen-noticia">
		      	<div class="extracto-noticia">
			        <h3>Título de la noticia 2</h3>
			        <p>Extracto de la noticia. La puede leer a continuación.
			        Extracto de la noticia. La puede leer a continuación</p>
			        <label>Seleccione su posisción</label>
			        <select name="noticia_id">
			        	<option value="posicion_id">1</option>
			        	<option value="posicion_id">2</option>
			        	<option value="posicion_id" selected="">3</option>
			        	<option value="posicion_id">4</option>
			        </select>
		      	</div>
		    </div>
		</div>

		<!-- Orden de la noticia -->
		<div class="col-sm-3">
			<div class="caja-minuatura">
		      	<img src="img/noticia.png" alt="imagen-noticia">
		      	<div class="extracto-noticia">
			        <h3>Título de la noticia 3</h3>
			        <p>Extracto de la noticia. La puede leer a continuación.
			        Extracto de la noticia. La puede leer a continuación</p>
			        <label>Seleccione su posisción</label>
			        <select name="noticia_id">
			        	<option value="posicion_id">1</option>
			        	<option value="posicion_id">2</option>
			        	<option value="posicion_id">3</option>
			        	<option value="posicion_id" selected="">4</option>
			        </select>
		      	</div>
		    </div>
		</div>


		<!-- Orden de la noticia -->
		<div class="col-sm-3">
			<div class="caja-minuatura">
		      	<img src="img/noticia.png" alt="imagen-noticia">
		      	<div class="extracto-noticia">
			        <h3>Título de la noticia 4</h3>
			        <p>Extracto de la noticia. La puede leer a continuación.
			        Extracto de la noticia. La puede leer a continuación</p>
			        <label>Seleccione su posisción</label>
			        <select name="noticia_id">
			        	<option value="posicion_id" selected="">1</option>
			        	<option value="posicion_id">2</option>
			        	<option value="posicion_id">3</option>
			        	<option value="posicion_id">4</option>
			        </select>
		      	</div>
		    </div>
		</div>

    </div>
</div>
@endsection<!-- Sección dedicada al cuerpo de la página -->
		