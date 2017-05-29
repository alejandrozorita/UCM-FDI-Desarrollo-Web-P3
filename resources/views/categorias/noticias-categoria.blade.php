@extends('layouts.app')

@section('contenido')
<div class="container">
    <div class="row">

        <div class="row">
            <!-- Título de la categoría -->
            <div class="col-sm-12">
                <div class="titulo-secundario">Noticias de la categoria: {!! $datos_vista['categoria']->nombre !!}</div>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="listado-noticias-categoria">

                @foreach ($datos_vista['categoria']->noticias as $noticia)
                    <!-- Pintamos las noticia de la categoría -->
                    <div class="noticia-categoria">
                        <div class="col-sm-3">
                            <a href="{!! route('leer_noticia',$noticia->slug) !!}"><img src="{{ asset('noticias/'.$noticia->id.'/'.$noticia->imagen) }}" alt=""></a>
                        </div>
                        <div class="col-sm-9">
                            <div class="sub-titulo"><a href="{!! route('leer_noticia',$noticia->slug) !!}">{!! $noticia->titulo !!}</a> </div>
                            <p>{!! $noticia->extracto !!}.</p>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection

