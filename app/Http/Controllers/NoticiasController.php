<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Auth;

//Model
use App\Models\Noticias;
use App\Models\User;
use App\Models\NoticiasFront;

//Repositories
use App\Repositories\NoticiasRepo;

use Illuminate\Http\Request;
use Cache;

class NoticiasController extends Controller
{
    /**
     * Constructor
     */
    public function __construct(NoticiasRepo $noticiasRepo)
    {
        Cache::flush();
    	$this->noticiasRepo = $noticiasRepo;
    }


    public function nueva_noticia($request = null, $autor_id = null)
    {

        if (is_null($autor_id) || is_null($request)) {
            return  [false, ''];
        }

        //Añadimos el valor slug al array de datos
        $data_validate = $request->all();
        $data_validate['slug'] = normalizar_string($request->titulo);
        //Validamos los datos del formulario
        $validate = self::validar_noticia($data_validate);

        if ($validate->fails()) {
            return  [false, $validate->messages()];
        }
            


        $noticia = new Noticias();

        $noticia->titulo = $request->titulo;
        $noticia->slug = normalizar_string($request->titulo);
        $noticia->extracto = $request->extracto;
        $noticia->contenido = $request->contenido;
        $noticia->publicada = $request->publicada;
        $noticia->user_id = $autor_id;
        $noticia->categoria_id = $request->categoria_id;

        $noticia->save();

        $noticia->imagen = self::actualizar_imagen($request->imagen_noticia, $noticia);
        $noticia->save();

        return [true, $noticia];
    }


    /**
     * Metodo para verificar los datos de la noticia
     */
    private function validar_noticia($request)
    {   
        $rules = [
            'titulo' => 'required|max:191',
            'extracto' => 'required|max:191',
            'contenido' => 'required',
            'categoria_id' => 'required',
            'slug' => 'unique:noticias',
            'imagen_noticia' => 'dimensions:min_width=100,min_height=100',
            'publicada' => 'required'
        ];

        return Validator::make($request, $rules);
    }



    /**
     * Borramos la noticia seleccionada
     */
    public function borrar_noticia($noticia_id = null)
    {
        if (is_null($noticia_id)) {
            return redirect()->back()->withErrors('No se ha selecionado una noticia válida');
        }

        $noticia = Noticias::find($noticia_id);

        if (!$noticia) {
            return redirect()->back()->withErrors('No se ha selecionado una noticia válida');
        }

        $noticia->delete();

        return redirect()->route('index_autor', 'borrada=1');
    }



    /**
     * Editamos la noticia
     */
    public function editar_noticia($request = null, $user_id = null)
    {

        if (is_null($user_id) || is_null($request)) {
            return [false,['No hemos encontrado la noticia']];
        }

        //Validamos los datos del formulario
        $validate = self::validar_update_noticia($request->all());

        if ($validate->fails()) {
            return [false,$validate->messages()];
        }

        //Buscamos la noticia
        $noticia = Noticias::find($request->noticia_id);

        if (!$noticia) {
            return [false,['No hemos encontrado la noticia']];
        }

        //Guardamos los datos en el objeto user y los guardamos en BD
        $noticia->titulo = $request->titulo;
        $noticia->slug = normalizar_string($request->titulo);
        $noticia->extracto = $request->extracto;
        $noticia->contenido = $request->contenido;
        $noticia->publicada = $request->publicada;
        $noticia->user_id = $user_id;
        $noticia->categoria_id = $request->categoria_id;

        $noticia->save();

        if ($request->imagen_noticia) {
            $noticia->imagen = self::actualizar_imagen($request->imagen_noticia, $noticia);
            $noticia->save();
        }

        return [true,$noticia];
    }



    /**
     * Metodo para verificar los datos de la noticia update
     */
    public function validar_update_noticia($request)
    {   
        $rules = [
            'titulo' => 'required|max:191',
            'extracto' => 'required|max:191',
            'imagen_noticia' => 'dimensions:min_width=100,min_height=100',
            'publicada' => 'required'
        ];

        return Validator::make($request, $rules);
    }



    /**
     * Método para subir la imagen de la noticia
     */
    private function actualizar_imagen($imagen_noticia, $noticia)
    {
        $nombre_imagen = $noticia->id . '.' .$imagen_noticia->getClientOriginalExtension();

        $imagen_noticia->move(
            base_path() . '/html/noticias/'.$noticia->id.'/', $nombre_imagen
        );

        return $nombre_imagen;
    }



    /**
     * Recibimos la peticón por POST y guardamos las imagenes como destacadas
     * Una vez guardadas, devolvemos todas las noticias para mostrar
     */
    public function establecer_orden_noticias(Request $request)
    {
        
        if (!isset($request->posicion) || !isset($request->noticia_destacada)) {
            return redirect()->back()->withErrors('No se ha podido borrar la noticia');
        }

        $noticias_front = NoticiasFront::all();

        //Si la posicion ya existe, la actualizams
        if (isset($noticias_front[$request->posicion])) {
            $noticia_front = $noticias_front[$request->posicion];
            $noticia_front->noticia_id = $request->noticia_destacada;
            $noticia_front->save();
        }
        //Si no existe, la creamos
        else{
            $noticia_front = New NoticiasFront;
            $noticia_front->noticia_id = $request->noticia_destacada;
            $noticia_front->save();
        }

        return redirect()->route('index_admin','destacada_editara=1');
    }



    /**
     * Quitamos la noticia de destacada
     */
    public function quitar_noticia_destacada(Request $request)
    {
        $borrado = $this->noticiasRepo->quitar_noticia_destacada($request->noticia_id);

        if ($borrado) {
            return redirect()->route('index_admin','borrada_destacada=1');
        }
        return redirect()->back()->withErrors('No se ha podido borrar la noticia');
    }


    /**
     * Devolvemos todas las noticias publicadas
     */
    public function get_todas_noticias_publicadas()
    {
    	return $this->noticiasRepo->get_todas_noticias_publicadas();
    }

    /**
     * Devolvemos las noticias destacadas
     */
    public function get_noticias_destacadas()
    {
        return $this->noticiasRepo->get_noticias_destacadas();
    }

    /**
     * Devolvemos noticias random
     */
    public function get_noticias_random()
    {
        return $this->noticiasRepo->get_noticias_random();
    }



    /**
     * Sacamos las noticias no destacadas
     */
    public function get_noticias_no_destacadas($arr_noticias_destacadas)
    {
        return $this->noticiasRepo->get_noticias_no_destacadas($arr_noticias_destacadas);
    }


    /**
     * Devolvemos todas las noticias
     */
    public function get_todas_noticias()
    {
    	return $this->noticiasRepo->get_todas_noticias();
    }


    /**
     * Todas las noticias del autor
     */
    public function get_todas_noticias_autor_paginado($autor_id,$paginate)
    {
        return $this->noticiasRepo->get_todas_noticias_autor_paginado($autor_id,$paginate);
    }



    /**
     * La noticia por slgu
     */
    public function get_notcia_por_slug($slug)
    {
        return $this->noticiasRepo->get_notcia_por_slug($slug);
    }


    /**
     * Scamos las noticias de una categoria
     */
    public function get_notcias_por_categoria($slug)
    {
        return $this->categoriasRepo->get_notcias_por_categoria($slug);
    }
    
}
