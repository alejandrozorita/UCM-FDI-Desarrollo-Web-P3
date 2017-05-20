@extends('layouts.app')

@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <img src="{{ asset('assets/img/slider1.jpg') }}" alt="slider-noticia">
        </div>
        <div class="col-sm-4">
            <div class="titulo-secundario">Todas las categorías</div>
            <hr>
            <ul class="listado-noticias">
                <li class="elemento-listado-noticias">
                    <span class="contenedor-noticias">54</span>
                    <a href="categoria2.html">Categoría 2</a>
                </li>
                <li class="elemento-listado-noticias">
                    <span class="contenedor-noticias">53</span>
                    <a href="categoria1.html">Categoría 1</a>
                </li>
                <li class="elemento-listado-noticias">
                    <span class="contenedor-noticias">22</span>
                    <a href="categoria2.html">Categoría 2</a>
                </li>
                <li class="elemento-listado-noticias">
                    <span class="contenedor-noticias">86</span>
                    <a href="categoria1.html">Categoría 1</a>
                </li>
                <li class="elemento-listado-noticias">
                    <span class="contenedor-noticias">31</span>
                    <a href="categoria2.html">Categoría 2</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="titulo-secundario">Últimas noticias</div>
                <hr>
            </div>
        </div>
        <div class="row">
            <!-- Listamos cada imagen igual ya que ahora no tiene funcionalidad -->
            <div class="col-3">
                <div class="caja-minuatura">
                  <img src="img/noticia.png" alt="imagen-noticia">
                  <div class="extracto-noticia">
                    <h3>Título de la noticia</h3>
                    <p>Extracto de la noticia. La puede leer a continuación.
                    Extracto de la noticia. La puede leer a continuación</p>
                    <a href="noticia1.html" class="boton boton-login">Leer</a>
                  </div>
                </div>
            </div>
            <!-- Listamos cada imagen igual ya que ahora no tiene funcionalidad -->
            <div class="col-3">
                <div class="caja-minuatura">
                  <img src="img/noticia.png" alt="imagen-noticia">
                  <div class="extracto-noticia">
                    <h3>Título de la noticia 3</h3>
                    <p>Extracto de la noticia. La puede leer a continuación.
                    Extracto de la noticia. La puede leer a continuación</p>
                    <a href="noticia3.html" class="boton boton-login">Leer</a>
                  </div>
                </div>
            </div>
            <!-- Listamos cada imagen igual ya que ahora no tiene funcionalidad -->
            <div class="col-3">
                <div class="caja-minuatura">
                  <img src="img/noticia.png" alt="imagen-noticia">
                  <div class="extracto-noticia">
                    <h3>Título de la noticia 2</h3>
                    <p>Extracto de la noticia. La puede leer a continuación.
                    Extracto de la noticia. La puede leer a continuación</p>
                    <a href="noticia2.html" class="boton boton-login">Leer</a>
                  </div>
                </div>
            </div>
            <!-- Listamos cada imagen igual ya que ahora no tiene funcionalidad -->
            <div class="col-3">
                <div class="caja-minuatura">
                  <img src="img/noticia.png" alt="imagen-noticia">
                  <div class="extracto-noticia">
                    <h3>Título de la noticia</h3>
                    <p>Extracto de la noticia. La puede leer a continuación.
                    Extracto de la noticia. La puede leer a continuación</p>
                    <a href="noticia1.html" class="boton boton-login">Leer</a>
                  </div>
                </div>
            </div>
            <!-- Listamos cada imagen igual ya que ahora no tiene funcionalidad -->
            <div class="col-3">
                <div class="caja-minuatura">
                  <img src="img/noticia.png" alt="imagen-noticia">
                  <div class="extracto-noticia">
                    <h3>Título de la noticia</h3>
                    <p>Extracto de la noticia. La puede leer a continuación.
                    Extracto de la noticia. La puede leer a continuación</p>
                    <a href="noticia1.html" class="boton boton-login">Leer</a>
                  </div>
                </div>
            </div>
            <!-- Listamos cada imagen igual ya que ahora no tiene funcionalidad -->
            <div class="col-3">
                <div class="caja-minuatura">
                  <img src="img/noticia.png" alt="imagen-noticia">
                  <div class="extracto-noticia">
                    <h3>Título de la noticia 2</h3>
                    <p>Extracto de la noticia. La puede leer a continuación.
                    Extracto de la noticia. La puede leer a continuación</p>
                    <a href="noticia2.html" class="boton boton-login">Leer</a>
                  </div>
                </div>
            </div>
            <!-- Listamos cada imagen igual ya que ahora no tiene funcionalidad -->
            <div class="col-3">
                <div class="caja-minuatura">
                  <img src="img/noticia.png" alt="imagen-noticia">
                  <div class="extracto-noticia">
                    <h3>Título de la noticia</h3>
                    <p>Extracto de la noticia. La puede leer a continuación.
                    Extracto de la noticia. La puede leer a continuación</p>
                    <a href="noticia1.html" class="boton boton-login">Leer</a>
                  </div>
                </div>
            </div>
            <!-- Listamos cada imagen igual ya que ahora no tiene funcionalidad -->
            <div class="col-3">
                <div class="caja-minuatura">
                  <img src="img/noticia.png" alt="imagen-noticia">
                  <div class="extracto-noticia">
                    <h3>Título de la noticia 3</h3>
                    <p>Extracto de la noticia. La puede leer a continuación.
                    Extracto de la noticia. La puede leer a continuación</p>
                    <a href="noticia3.html" class="boton boton-login">Leer</a>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

