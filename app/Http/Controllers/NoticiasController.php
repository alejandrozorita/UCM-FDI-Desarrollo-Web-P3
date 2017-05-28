<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Auth;

//Model
use App\Models\Noticias;
use App\Models\User;

//Repositories
use App\Repositories\NoticiasRepo;

use Illuminate\Http\Request;

class NoticiasController extends Controller
{
    /**
     * Constructor
     */
    public function __construct(NoticiasRepo $noticiasRepo)
    {
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
            base_path() . '/public/noticias/'.$noticia->id.'/', $nombre_imagen
        );

        return $nombre_imagen;
    }

    /**
     * Devolvemos todas las noticias publicadas
     */
    public function get_todas_noticias_publicadas()
    {
    	return $this->noticiasRepo->get_todas_noticias_publicadas();
    }

    /**
     * Devolvemos la noticia destacada
     */
    public function get_noticias_destacadas()
    {
    	return $this->noticiasRepo->get_noticias_destacadas();
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



    
}
