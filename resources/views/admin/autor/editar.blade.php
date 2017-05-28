@extends('layouts.app')

@section('contenido')
<div class="container">
    <div class="row">

		<!-- Administrador -->
		<div class="col-sm-12">
			<div class="titulo-secundario">Editar Autor</div>
			<hr>
		</div>

		<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Autor ByteCode</div>
                <div class="panel-body">
                    {!! Form::open(array('route' => 'editar_autor_post','files' => true, 'class' => 'form-login')) !!}

                    {!! Form::hidden('user_id', $datos_vista['autor']->id) !!}
						
						<div class="col-sm-6">
							<div class="form-group{{ $errors->has('imagen_autor') ? ' has-error' : '' }}">

	                            <div class="col-md-12">
	                               	<input class="drag_drop" type="file" name="imagen_autor" id="imagen_autor" data-value="{!! asset('autores/perfil/'.$datos_vista['autor']->id.'/'.$datos_vista['autor']->imagen) !!}" >

	                                @if ($errors->has('imagen_autor'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('imagen_autor') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>
						</div>
                        

						<div class="col-sm-6">
	                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	                            <label for="name" class="col-md-12 control-label">Nombre</label>

	                            <div class="col-md-12">
	                                <input id="name" type="text" class="form-control" name="name" value="{!! $datos_vista['autor']->name !!}" required autofocus>

	                                @if ($errors->has('name'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('name') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>



	                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	                            <label for="email" class="col-md-12 control-label">E-Mail</label>

	                            <div class="col-md-12">
	                                <input id="email" type="email" class="form-control" name="email" value="{!! $datos_vista['autor']->email !!}" required>

	                                @if ($errors->has('email'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('email') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>

	                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
	                            <label for="password" class="col-md-12 control-label">Contraseña</label>

	                            <div class="col-md-12">
	                                <input id="password" type="password" value='' class="form-control" name="password" >

	                                @if ($errors->has('password'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('password') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>

	                        <div class="form-group">
	                            <label for="password-confirm" class="col-md-12 control-label">Confirma Contraseña</label>

	                            <div class="col-md-12">
	                                <input id="password-confirm" value='' type="password" class="form-control" name="password_confirmation" >
	                            </div>
	                        </div>

	                    </div>
	                    <div class="form-group">
	                            <div class="col-md-6 col-md-offset-4">
	                                <button type="submit" class="btn btn-primary">
	                                    Guardar
	                                </button>
	                            </div>
	                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
	</div>
</div>


@endsection