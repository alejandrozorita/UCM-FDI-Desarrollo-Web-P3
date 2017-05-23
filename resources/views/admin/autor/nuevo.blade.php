@extends('layouts.app')

@section('contenido')
<div class="container">
    <div class="row">

		<!-- Administrador -->
		<div class="col-12">
			<div class="titulo-secundario">Crear Autor</div>
			<hr>
		</div>

		<!-- Mostramos el autor con su imagen -->
		<div class="col-3">
		</div>
		<!-- Mostramos el autor con su imagen -->
		<div class="col-5">
			<form class="form-login">
				<div class="form-group">
					<div class="caja-minuatura">
						<!-- La imagen no levara file ya que se cambiara desde la propia imagen  -->
						<input class="form-control" type="file" name="imagen-autor" id="imagen_nuevo_autor" class="drag_drop">
				      	<div class="caja-autor">
				        	<input type="text" name="nombre-autor" class="form-inputs" value="nombre-autor" placeholder="Nombre del autor">
				        	<a href="" class="boton boton-login">Crear Autor</a>
				      	</div>
				    </div>
			    </div>
		    </form>
		</div>
	</div>
</div>
@endsection<!-- Sección dedicada al cuerpo de la página -->