@extends('layouts.app')

@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <img src="{{ asset('assets/img/slider1.jpg') }}" alt="slider-noticia">
        </div>
        
        <div class="row">
            <!-- Título de la categoría -->
            <div class="col-sm-12">
                <div class="titulo-secundario">Noticias de la categoría 1</div>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="listado-noticias-categoria">
                <!-- Pintamos las noticia de la categoría -->
                <div class="noticia-categoria">
                    <div class="col-ms-3">
                        <img src="{{ asset('assets/img/img-noticia-categoria.png') }}" alt="">
                    </div>
                    <div class="col-sm-9">
                        <div class="sub-titulo"><a href="noticia1.html">Título noticia 1</a> </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut hendrerit neque ut nisi rhoncus faucibus. Nullam eget nulla metus. Phasellus tristique, eros eu lobortis tincidunt, mauris tellus interdum urna, volutpat hendrerit quam purus sed arcu. Morbi lacinia tortor ac massa vulputate, in tempus nulla eleifend. Etiam et nisi elementum, suscipit nibh eget, vulputate lacus. Vivamus lobortis neque pellentesque mi elementum, at fermentum erat viverra. Pellentesque elementum elementum sagittis. Proin accumsan, purus at ultricies suscipit, augue nunc mollis metus, a mollis felis urna laoreet orci. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas molestie leo velit, id condimentum orci volutpat in. Nullam eget leo tincidunt, elementum sapien vitae, gravida lacus. Etiam at odio eget dolor interdum molestie eget vel mauris. Maecenas molestie leo velit, id condimentum orci volutpat in. Nullam eget leo tincidunt, elementum sapien vitae, gravida lacus. Etiam at odio eget dolor interdum molestie eget vel mauris.</p>
                    </div>
                </div>

                <div class="noticia-categoria">
                    <div class="col-sm-3">
                        <img src="{{ asset('assets/img/img-noticia-categoria.png') }}" alt="">
                    </div>
                    <div class="col-sm-9">
                        <div class="sub-titulo"><a href="noticia2.html">Título noticia 2</a> </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut hendrerit neque ut nisi rhoncus faucibus. Nullam eget nulla metus. Phasellus tristique, eros eu lobortis tincidunt, mauris tellus interdum urna, volutpat hendrerit quam purus sed arcu. Morbi lacinia tortor ac massa vulputate, in tempus nulla eleifend. Etiam et nisi elementum, suscipit nibh eget, vulputate lacus. Vivamus lobortis neque pellentesque mi elementum, at fermentum erat viverra. Pellentesque elementum elementum sagittis. Proin accumsan, purus at ultricies suscipit, augue nunc mollis metus, a mollis felis urna laoreet orci. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas molestie leo velit, id condimentum orci volutpat in. Nullam eget leo tincidunt, elementum sapien vitae, gravida lacus. Etiam at odio eget dolor interdum molestie eget vel mauris. Maecenas molestie leo velit, id condimentum orci volutpat in. Nullam eget leo tincidunt, elementum sapien vitae, gravida lacus. Etiam at odio eget dolor interdum molestie eget vel mauris.</p>
                    </div>
                </div>

                <div class="noticia-categoria">
                    <div class="col-sm-3">
                        <img src="{{ asset('assets/img/img-noticia-categoria.png') }}" alt="">
                    </div>
                    <div class="col-sm-9">
                        <div class="sub-titulo"><a href="noticia3.html">Título noticia 3</a> </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut hendrerit neque ut nisi rhoncus faucibus. Nullam eget nulla metus. Phasellus tristique, eros eu lobortis tincidunt, mauris tellus interdum urna, volutpat hendrerit quam purus sed arcu. Morbi lacinia tortor ac massa vulputate, in tempus nulla eleifend. Etiam et nisi elementum, suscipit nibh eget, vulputate lacus. Vivamus lobortis neque pellentesque mi elementum, at fermentum erat viverra. Pellentesque elementum elementum sagittis. Proin accumsan, purus at ultricies suscipit, augue nunc mollis metus, a mollis felis urna laoreet orci. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas molestie leo velit, id condimentum orci volutpat in. Nullam eget leo tincidunt, elementum sapien vitae, gravida lacus. Etiam at odio eget dolor interdum molestie eget vel mauris. Maecenas molestie leo velit, id condimentum orci volutpat in. Nullam eget leo tincidunt, elementum sapien vitae, gravida lacus. Etiam at odio eget dolor interdum molestie eget vel mauris.</p>
                    </div>
                </div>
                
                <div class="noticia-categoria">
                    <div class="col-sm-3">
                        <img src="{{ asset('assets/img/img-noticia-categoria.png') }}" alt="">
                    </div>
                    <div class="col-sm-9">
                        <div class="sub-titulo"><a href="noticia2.html">Título noticia 2</a> </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut hendrerit neque ut nisi rhoncus faucibus. Nullam eget nulla metus. Phasellus tristique, eros eu lobortis tincidunt, mauris tellus interdum urna, volutpat hendrerit quam purus sed arcu. Morbi lacinia tortor ac massa vulputate, in tempus nulla eleifend. Etiam et nisi elementum, suscipit nibh eget, vulputate lacus. Vivamus lobortis neque pellentesque mi elementum, at fermentum erat viverra. Pellentesque elementum elementum sagittis. Proin accumsan, purus at ultricies suscipit, augue nunc mollis metus, a mollis felis urna laoreet orci. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas molestie leo velit, id condimentum orci volutpat in. Nullam eget leo tincidunt, elementum sapien vitae, gravida lacus. Etiam at odio eget dolor interdum molestie eget vel mauris. Maecenas molestie leo velit, id condimentum orci volutpat in. Nullam eget leo tincidunt, elementum sapien vitae, gravida lacus. Etiam at odio eget dolor interdum molestie eget vel mauris.</p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection

