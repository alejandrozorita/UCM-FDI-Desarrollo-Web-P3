@extends('layouts.app')

@section('contenido')
<div class="container">
    <div class="row">

		<!-- Administrador -->
		<div class="col-sm-12">
			<div class="titulo-secundario">Editar Noticia</div>
			<hr>
		</div>

		<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Noticia ByteCode</div>
                <div class="panel-body">
                    {!! Form::open(array('route' => 'editar_noticia_post','files' => true, 'class' => 'form-login')) !!}

                    {!! Form::hidden('noticia_id', $datos_vista['noticia']->id) !!}
                    {!! Form::hidden('publicada', '1') !!}
						
						<div class="col-sm-6">
							<div class="form-group{{ $errors->has('imagen_noticia') ? ' has-error' : '' }}">

	                            <div class="col-md-12">
	                               	<input class="drag_drop" type="file" name="imagen_noticia" id="imagen_noticia" data-value="{!! asset('noticias/'.$datos_vista['noticia']->id.'/'.$datos_vista['noticia']->imagen) !!}" >

	                                @if ($errors->has('imagen-autor'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('imagen_noticia') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>
						</div>
                        

						<div class="col-sm-6">
	                        <div class="form-group{{ $errors->has('titulo') ? ' has-error' : '' }}">
	                            <label for="titulo" class="col-md-12 control-label">Título</label>

	                            <div class="col-md-12">
	                                <input id="titulo" type="text" class="form-control" name="titulo" value="{!! $datos_vista['noticia']->titulo !!}" required autofocus>

	                                @if ($errors->has('titulo'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('titulo') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>



	                        <div class="form-group{{ $errors->has('extracto') ? ' has-error' : '' }}">
	                            <label for="extracto" class="col-md-12 control-label">Extracto</label>

	                            <div class="col-md-12">
	                                <input id="extracto" type="text" class="form-control" name="extracto" value="{!! $datos_vista['noticia']->extracto !!}" required>

	                                @if ($errors->has('extracto'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('extracto') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>

	                        <div class="form-group{{ $errors->has('categoria') ? ' has-error' : '' }}">
	                            <label for="email" class="col-md-12 control-label">Categoria</label>

	                            <div class="col-md-12">
	                                <select name="categoria_id" required="">
	                                	@foreach ($datos_vista['categorias'] as $categoria)
		                                	@if ($categoria->id == $datos_vista['noticia']->categoria_id)
		                                		<option selected="" value="{!! $categoria->id !!}">{!! $categoria->nombre !!}</option>
		                                	@else
		                                		<option value="{!! $categoria->id !!}">{!! $categoria->nombre !!}</option>
		                                	@endif
	                                	@endforeach
	                                </select>

	                                @if ($errors->has('categoria'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('categoria') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>
	                    </div>

	                    <div class="col-sm-12">
	                    	<div class="form-group{{ $errors->has('contenido') ? ' has-error' : '' }}">
	                            <label for="email" class="col-md-12 control-label">Conteido</label>

	                            <div class="col-md-12">
	                            
	                                <textarea class="form-control" name="contenido" id="contenido">{!! $datos_vista['noticia']->contenido !!}</textarea>

	                                @if ($errors->has('contenido'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('contenido') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>
						</div>

	                    <div class="col-md-12">
                           	<div class="form-group">
                           		<div class="col-md-12">
	                                <button type="submit" class="btn btn-primary pull-right" style="margin-top: 20px">
	                                    Guardar
	                                </button>
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
	</div>
</div>


@endsection