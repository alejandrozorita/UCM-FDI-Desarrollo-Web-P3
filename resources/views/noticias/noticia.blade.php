@extends('layouts.app')

@section('contenido')
<div class="container">
    <div class="row">
        
        <div class="row">
            <!-- Título de la categoría -->
            <div class="col-sm-12">
                <div class="titulo-secundario">{!! $datos_vista['noticia']->titulo !!}</div>
                <hr>
            </div>
        </div>

        <div class="row">
            <!-- imagen de la noticia -->
            <div class="col-sm-8">
                <img src="{!! asset('noticias/'.$datos_vista['noticia']->id.'/'.$datos_vista['noticia']->imagen) !!}" alt="imagen-noticia">
            </div>

            <!-- Seguimos mostrando las categorías para mejorar la navegación del usuario -->
            <div class="col-sm-4">
              <div class="titulo-secundario">Todas las categorías</div>
              <hr>
              <ul class="listado-noticias">

                  @foreach ($datos_vista['categorias'] as $categoria)

                      <li class="elemento-listado-noticias">
                          @if ($categoria->noticias)
                              <span class="contenedor-noticias">{!! $categoria->noticias->count() !!}</span>
                          @else
                              <span class="contenedor-noticias">0</span>
                          @endif
                          
                          <a href="{!! route('ver_noticias_categoria',$categoria->slug) !!}" style="cursor: pointer;text-decoration: none;">{!! $categoria->nombre !!}</a>
                      </li>
                  @endforeach
                  
              </ul>
            </div>
        </div>

        <div class="row">
            <!-- Pintamos el contenido de la noticia -->
            <div class="col-sm-12 caja-noticia">
              {!! $datos_vista['noticia']->contenido !!}
            </div>
          </div>

          <div class="row">
              <!-- Pintamos los comentarios de la noticia -->
              <div class="col-sm-12">
                  <div class="titulo-secundario">Comentarios</div>
                  <hr>
              </div>
          </div>

          <div class="row">
              <!-- Pintamos los comentarios de la noticia -->
              <div class="col-sm-12">
                  <h4>Introduzca su nuevo comentario</h4>
                  <hr>
                  {!! Form::open(['route' => 'nuevo_comentario']) !!}
                  {!! Form::hidden('noticia_id', $datos_vista['noticia']->id) !!}
                    <textarea class="form-control" name="texto" id="contenido">{!! old('texto') !!}</textarea>
                    {!! Form::submit('Publicar', ['class' => 'btn btn-primary btn-submit-comentario']) !!}
                  {!! Form::close() !!}
              </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
{!! dd($datos_vista['noticia']) !!}
              @foreach ($datos_vista['noticia']->comentarios as $comentario)
                <div class="contenido-comentario">
                  <div class="imagen-comentario">
                    <!-- Enlace a la pagina de comentarios del usuario -->
                    <a href="comentarios-usuario.html">
                      <img class="" src="{!! asset('assets/img/user.png') !!}" alt="imagen-usuario">
                    </a>
                  </div>
                  <div class="texto-comentario">
                    <p class="nombre-comentario">{!! $comentario->texto !!}</p>
                    <p>Hace 3 minutos</p>
                  </div>
                </div>
                <hr>
              @endforeach
                
            </div>
            <div class="col-sm-12">
                <div class="contenido-comentario">
                  <div class="imagen-comentario">
                    <!-- Enlace a la pagina de comentarios del usuario -->
                    <a href="comentarios-usuario.html">
                      <img class="" src="{!! asset('assets/img/user.png') !!}" alt="imagen-usuario">
                    </a>
                  </div>
                  <div class="texto-comentario">
                    <p class="nombre-comentario">Comentario usuario 2</p>
                    <p>Me encanta esta noticia!!</p>
                    <p>Hace 4 horas</p>
                  </div>
                </div>
                <hr>
            </div>
            <div class="col-sm-12">
                <div class="contenido-comentario">
                  <div class="imagen-comentario">
                    <!-- Enlace a la pagina de comentarios del usuario -->
                    <a href="comentarios-usuario.html">
                      <img class="" src="{!! asset('assets/img/user.png') !!}" alt="imagen-usuario">
                    </a>
                  </div>
                  <div class="texto-comentario">
                    <p class="nombre-comentario">Comentario usuario 3</p>
                    <p>Me encanta esta noticia!!</p>
                    <p>Ayer</p>
                  </div>
                </div>
                <hr>
            </div>
            <div class="col-sm-12">
                <div class="contenido-comentario">
                  <div class="imagen-comentario">
                    <!-- Enlace a la pagina de comentarios del usuario -->
                    <a href="comentarios-usuario.html">
                      <img class="" src="{!! asset('assets/img/user.png') !!}" alt="imagen-usuario">
                    </a>
                  </div>
                  <div class="texto-comentario">
                    <p class="nombre-comentario">Comentario usuario 4</p>
                    <p>Me encanta esta noticia!!</p>
                    <p>Hace 5 días</p>
                  </div>
                </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection

