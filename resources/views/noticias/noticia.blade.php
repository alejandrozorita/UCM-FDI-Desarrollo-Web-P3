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
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut hendrerit neque ut nisi rhoncus faucibus. Nullam eget nulla metus. Phasellus tristique, eros eu lobortis tincidunt, mauris tellus interdum urna, volutpat hendrerit quam purus sed arcu. Morbi lacinia tortor ac massa vulputate, in tempus nulla eleifend. Etiam et nisi elementum, suscipit nibh eget, vulputate lacus. Vivamus lobortis neque pellentesque mi elementum, at fermentum erat viverra. Pellentesque elementum elementum sagittis. Proin accumsan, purus at ultricies suscipit, augue nunc mollis metus, a mollis felis urna laoreet orci. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas molestie leo velit, id condimentum orci volutpat in. Nullam eget leo tincidunt, elementum sapien vitae, gravida lacus. Etiam at odio eget dolor interdum molestie eget vel mauris.</p>

                <p>Mauris non commodo enim. Fusce rhoncus metus dolor, quis commodo nisl ullamcorper eget. In mollis ligula magna, facilisis suscipit mauris accumsan ut. Vestibulum in vulputate libero. Fusce sed ex justo. Sed eu turpis ut purus pretium mattis. Sed ullamcorper accumsan auctor. Praesent ultricies congue vehicula. Ut sagittis quam sodales neque sodales laoreet. Proin auctor enim nec tellus facilisis, ac fringilla urna aliquet.</p>

                <p>Morbi ac purus vestibulum, mattis sem eget, iaculis augue. Mauris blandit sem id auctor faucibus. Phasellus viverra, ipsum eu semper lobortis, augue est porta eros, ac aliquet neque metus in odio. Vestibulum tristique ante sit amet purus pulvinar dapibus quis vel sem. Quisque quam ex, interdum sit amet porta at, gravida vel nisl. Quisque consectetur turpis at orci volutpat, id condimentum turpis ultrices. Sed quis elit quis felis porta facilisis. Donec fermentum id justo ac porta. Nunc quis facilisis libero. Maecenas est lacus, tincidunt eget fermentum ac, pretium eu ipsum. Etiam at efficitur tellus. Praesent rhoncus imperdiet nulla, sed convallis sapien ornare vel.</p>

                <p>Ut fringilla congue sapien, consectetur facilisis libero ultricies et. Aenean sollicitudin tortor quis orci scelerisque sollicitudin. Quisque dignissim quam id pellentesque varius. In eget auctor ligula, id rhoncus libero. Aliquam in lacus turpis. Maecenas venenatis, mauris et pharetra ultricies, erat erat ornare tellus, vitae congue nunc lacus id metus. Vivamus hendrerit risus dolor, nec interdum libero ornare in. Nunc sit amet turpis in tortor auctor feugiat vitae non eros.</p>

                <p>Nullam vitae justo pulvinar, pulvinar metus pharetra, malesuada massa. Quisque rutrum arcu ut est pretium, a auctor lacus dictum. Sed malesuada eros finibus, blandit dolor vel, gravida ligula. Curabitur dolor leo, molestie vel pretium ac, lacinia ac mauris. Aliquam erat volutpat. Pellentesque vitae metus ullamcorper, ullamcorper erat a, ornare justo. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras vitae ullamcorper libero, et rhoncus lectus. Phasellus at iaculis felis.</p>

                <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In in facilisis sem. Ut vitae lacus non elit cursus sagittis. Ut at facilisis augue. Morbi et dapibus velit. Quisque iaculis vitae erat eu mattis. Ut ac quam fermentum, maximus justo sit amet, tristique justo. Curabitur vehicula elit at enim porttitor fermentum. Sed vel orci sapien. Proin at augue nibh.</p>

                <p>Cras quis arcu a massa tincidunt commodo. Etiam at accumsan nisl. Donec neque augue, blandit interdum dolor fringilla, vehicula scelerisque mauris. Nam venenatis est vitae elementum aliquam. Phasellus sollicitudin hendrerit tortor sed dictum. Nulla facilisi. In in consequat leo, et consectetur est. Vivamus ut ex id mi venenatis bibendum id vitae felis. Nullam blandit eros orci, ut fringilla felis faucibus non. Curabitur maximus cursus ullamcorper. Suspendisse sollicitudin consequat quam, ut lobortis nibh. Duis et enim erat. Nam efficitur ipsum tortor, eget varius lorem vehicula aliquam. Nullam vel vehicula odio, non iaculis metus.</p>

                <p>Donec neque risus, elementum et tempor a, feugiat vitae velit. Integer porttitor vel elit in facilisis. Suspendisse dapibus, purus in ornare pharetra, est quam vehicula purus, vel maximus ante felis ac sapien. Donec a nunc lacinia, fringilla enim vel, sollicitudin dolor. Sed molestie a justo non pellentesque. Sed fringilla elit nec commodo sagittis. Suspendisse et nunc quis ex auctor sodales vel vel purus. Nunc aliquam, ante eu ultricies pharetra, nisl libero accumsan lacus, auctor tincidunt quam nulla quis sem. Vestibulum feugiat luctus turpis, non ullamcorper mi ultrices eu. Ut ultrices turpis nec luctus faucibus. Morbi facilisis sapien nisi, mollis tempus nunc mattis nec. Nullam condimentum ullamcorper sapien in imperdiet.</p>

                <p>Fusce lectus dui, pharetra sollicitudin turpis vitae, molestie hendrerit odio. Nulla pharetra condimentum eros at tempus. Nam ante lacus, condimentum vel sapien ut, scelerisque commodo lectus. Vestibulum varius commodo risus, vitae dignissim ligula tincidunt non. Sed tristique sapien purus, ut fermentum lorem vehicula sed. Fusce quis pharetra augue, porttitor dictum mauris. Mauris in lectus leo. Donec et velit erat.</p>

                <p>Nunc et sapien dui. Vestibulum id dui sagittis, ultricies est eu, placerat odio. Nulla facilisi. Donec sit amet magna ornare, pellentesque nibh eu, semper sapien. Pellentesque condimentum augue scelerisque, molestie orci sit amet, laoreet risus. Nulla tortor odio, ultrices sed consequat vitae, porta sed purus. Curabitur ac velit a velit condimentum condimentum ut ut risus. Suspendisse a rutrum ligula. In commodo id orci vitae efficitur. Fusce laoreet lacinia urna, dignissim rutrum est pulvinar sit amet. Sed dapibus, justo a aliquam dignissim, risus justo porta urna, id maximus sem sem eu elit.</p>
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
            <div class="col-sm-12">
                <div class="contenido-comentario">
                  <div class="imagen-comentario">
                    <!-- Enlace a la pagina de comentarios del usuario -->
                    <a href="comentarios-usuario.html">
                      <img class="" src="{!! asset('assets/img/user.png') !!}" alt="imagen-usuario">
                    </a>
                  </div>
                  <div class="texto-comentario">
                    <p class="nombre-comentario">Comentario usuario 1</p>
                    <p>Me ha gustado mucho esta noticia</p>
                    <p>Hace 3 minutos</p>
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

