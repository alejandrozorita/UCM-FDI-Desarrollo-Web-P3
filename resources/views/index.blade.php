@extends('layouts.app')

@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <div class="titulo-secundario">Noticias Destacadas</div>


            @if (count($datos_vista['noticias_titular']) > 0 )
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    @foreach ($datos_vista['noticias_titular'] as $key => $destacada)
                        @if ($key == 0)
                            <li data-target="#carousel-example-generic" data-slide-to="{!! $key !!}" class="active"></li>
                        @else
                            <li data-target="#carousel-example-generic" data-slide-to="{!! $key !!}"></li>
                        @endif
                        
                    @endforeach
                  </ol>

                  <div class="carousel-inner" role="listbox">

                        @foreach ($datos_vista['noticias_titular'] as $key => $destacada)
                            @if ($key == 0)
                                <div class="item active">
                            @else
                                <div class="item">
                            @endif
                            
                                <a href="{!! route('leer_noticia',$destacada->slug) !!}"><img src="{!! asset('noticias/'.$destacada->id.'/'.$destacada->imagen) !!}" alt="{!! $destacada->titulo !!}"></a>
                                <div class="carousel-caption">
                                {!! $destacada->extracto !!}
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>

            @endif

        </div>

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
            <div class="col-sm-12">
            {{ $datos_vista['categorias']->links() }}
        </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="titulo-secundario">Últimas noticias</div>
            <hr>
        </div>
    </div>

    <div class="row">

        @foreach ($datos_vista['noticias_destacadas'] as $destacada)
        
            <div class="col-sm-3">
                <div class="caja-minuatura">
                  <img src="{!! asset('noticias/'.$destacada->noticia->id.'/'.$destacada->noticia->imagen) !!}" alt="{!! $destacada->noticia->slug !!}">
                  <div class="extracto-noticia">
                    <h3>{!! $destacada->noticia->titulo !!}</h3>
                    <p>{!! $destacada->noticia->extracto !!}</p>
                    <a href="{!! route('leer_noticia', $destacada->noticia->slug) !!}" class="boton boton-login">Leer</a>
                  </div>
                </div>
            </div>

        @endforeach
    </div>
</div>
@endsection

