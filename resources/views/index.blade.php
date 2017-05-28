@extends('layouts.app')

@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <div class="titulo-secundario">Noticias Destacadas</div>

            @if (count($datos_vista['noticias_destacadas']) > 0 )

                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">

                        @foreach ($datos_vista['noticias_destacadas'] as $destacada)
                            <div class="item ">
                                <img src="{!! asset('noticias/'.$destacada->id.'/'.$destacada->imagen) !!}" alt="{!! $destacada->titulo !!}">
                                <div class="carousel-caption">
                                {!! $destacada->extracto !!}
                                </div>
                            </div>
                        @endforeach

                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previa</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Siguiente</span>
                    </a>
                </div>

            @endif

        </div>
        <div class="col-sm-4">
            <div class="titulo-secundario">Todas las categorías</div>
            <hr>
            <ul class="listado-noticias">

                @foreach ($datos_vista['categorias'] as $categoria)
                    <li class="elemento-listado-noticias">
                        @if ($categoria->noticia)
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
        <div class="col-sm-12">
            <div class="titulo-secundario">Últimas noticias</div>
            <hr>
        </div>
    </div>

    <div class="row">

        @foreach ($datos_vista['noticias'] as $noticia)
        
            <div class="col-sm-3">
                <div class="caja-minuatura">
                  <img src="{!! asset('noticias/'.$noticia->id.'/'.$noticia->imagen) !!}" alt="imagen-noticia">
                  <div class="extracto-noticia">
                    <h3>{!! $noticia->titulo !!}</h3>
                    <p>{!! $noticia->extracto !!}</p>
                    <a href="{!! route('leer_noticia', $noticia->slug) !!}" class="boton boton-login">Leer</a>
                  </div>
                </div>
            </div>

        @endforeach
    </div>
</div>
@endsection

