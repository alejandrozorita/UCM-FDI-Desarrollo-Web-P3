@extends('layouts.app')

@section('contenido')
<div class="container">
    <div class="row">

		<!-- Administrador -->
		<div class="col-sm-12">
			<div class="titulo-secundario">Crear Autor</div>
			<hr>
		</div>

		<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Nuevo Autor ByteCode</div>
                <div class="panel-body">
                    {!! Form::open(array('route' => 'register','files' => true, 'class' => 'form-login')) !!}
						
						<div class="col-sm-6">
							<div class="form-group{{ $errors->has('imagen-autor') ? ' has-error' : '' }}">

	                            <div class="col-md-12">
	                               	<input class="form-control" type="file" name="imagen-autor" id="imagen_nuevo_autor" class="drag_drop" required="">

	                                @if ($errors->has('imagen-autor'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('imagen-autor') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>
						</div>
                        

						<div class="col-sm-6">
	                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	                            <label for="name" class="col-md-12 control-label">Nombre</label>

	                            <div class="col-md-12">
	                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

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
	                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

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
	                                <input id="password" type="password" class="form-control" name="password" required>

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
	                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
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


@endsection<!-- Sección dedicada al cuerpo de la página -->


