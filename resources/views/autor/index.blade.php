@extends('layouts.app')

@section('contenido')

<div class="container">
    <div class="row m-t-40">

		<!-- Noticias escritas por el autor -->
		<div class="col-sm-12">
			<div class="titulo-secundario">Mis noticias <a href="{!! route('noticia_nueva') !!}" class="boton boton float-right">Nueva noticia</a></div>
			<hr>
		</div>
		
		@foreach ($datos_vista['noticias_autor'] as $noticia)
			<!-- Noticias del autor -->
			<div class="col-sm-3">
				<div class="caja-minuatura">
			      	<img src="{!! asset('noticias/'.$noticia->id.'/'.$noticia->imagen) !!}" alt="imagen-noticia">
			      	<div class="extracto-noticia">
				        <h3>{!! $noticia->titulo !!}</h3>
				        <p>{!! $noticia->extracto !!}</p>
				        <a href="{!! route('borrar_noticia',$noticia->id) !!}" class="boton boton-alerta" onclick="return confirm('¿Está seguro de borrar la {!! $noticia->titulo !!}?')">Borrar noticia</a>
				        <a href="{!! route('editar_noticia',$noticia->id) !!}" class="boton boton-login">Editar</a>
			      	</div>
			    </div>
			</div>
		@endforeach

		<div class="col-sm-12">
			{{ $datos_vista['noticias_autor']->links() }}
		</div>

    </div>
</div>
@endsection<!-- Sección dedicada al cuerpo de la página -->
		