<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;


//Controllers
use App\Http\Controllers\NoticiasController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\AutoresController;

//Models
use App\Models\User;

use Cache;

class AdminController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(NoticiasController $noticiasController, CategoriasController $categoriasController,
                                AutoresController $autoresController)
    {   
        Cache::flush();
        $this->middleware('admin');
        $this->middleware('auth');
        $this->noticiasController = $noticiasController;
        $this->categoriasController = $categoriasController;
        $this->autoresController = $autoresController;

    }


	/**
	 * Mostramos la página privada del administrador
	 */
    public function index_admin(Request $request)
    {
        $datos_vista['noticias_destacadas'] = $this->noticiasController->get_noticias_destacadas();

        $datos_vista['noticias_no_destacadas'] = $this->noticiasController->get_noticias_no_destacadas($datos_vista['noticias_destacadas']->toArray());

        $datos_vista['posiciones_destacadas'] = self::crear_array_posicion($datos_vista['noticias_destacadas']->count(),1);

        $datos_vista['categorias'] = $this->categoriasController->get_todas_categorias();

        $datos_vista['autores'] = $this->autoresController->get_todos_autores_paginado(5);
    
        $datos_vista['mensaje_success'] = self::generar_alertas($request);

        return view('admin.index',compact('datos_vista'));
    }



    /**
     * Mostramos la vista para crear un nuevo autor
     */
    public function nuevo_autor(Request $request)
    {

        $datos_vista['categorias'] = $this->categoriasController->get_todas_categorias();

        //Verificamos si la carga de la pagina es tras crear un autor para mostrar mensaje de creado ok
        $datos_vista['mensaje_success'] = self::generar_alertas($request);

        return view('admin.autor.nuevo',compact('datos_vista'));
    }



    /**
     * Mostramos la vista para editar un nuevo autor
     */
    public function editar_autor(Request $request)
    {
        $datos_vista['autor'] = User::find($request->autor_id);

        if (!$datos_vista['autor']) {
            return redirect()->back()->withErrors('No se ha selecionado un autor válido');
        }

        $datos_vista['categorias'] = $this->categoriasController->get_todas_categorias();

        //Verificamos si la carga de la pagina es tras crear un autor para mostrar mensaje de creado ok
        $datos_vista['mensaje_success'] = self::generar_alertas($request);
        

        return view('admin.autor.editar',compact('datos_vista'));
    }


    /**
     * Editar autor
     */
    public function editar_autor_post(Request $request)
    {

        //Validamos los datos del formulario
        $validate = $this->autoresController->validar_update_autor($request->all());

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->messages())->withInput();
        }

        //Buscamos al autor
        $user = User::find($request->user_id);

        if (!$user) {
            return redirect()->back()->withErrors('No hemos encontrado al autor')->withInput();
        }

        //Guardamos los datos en el objeto user y los guardamos en BD
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->save();

        //En caso de haber subid una nueva imagen, la actualziamos
        if ($request->imagen_autor) {
            $user->imagen = $this->autoresController->actualizar_imagen($request->imagen_autor, $user);
            $user->save();
        }

        Cache::flush();
        
        return redirect()->route('index_admin','editado=1');
    }



    /**
     * Borramos el autor
     */
    public function borrar_autor($autor_id = null)
    {
        if (is_null($autor_id)) {
            return redirect()->back()->withErrors('No se ha selecionado un autor válido');
        }

        $autor = User::find($autor_id);

        if (!$autor) {
            return redirect()->back()->withErrors('No se ha selecionado un autor válido');
        }

        $autor->delete();

        return redirect()->route('index_admin', 'borrado=1');
    }


    /**
     * Creamos una array para seleccionar el indice de las noticas
     */
    private function crear_array_posicion($cantidad,$sumatorio)
    {   

        $bucle = $cantidad+$sumatorio;
        $array = array();
        for ($i=0; $i < $bucle; $i++) {
            $array[$i] = $i+1;
        }

        return $array;
    }



    /**
     * Automatizamos los mensajes generale de la plataforma
     */
    private function generar_alertas($request)
    {

        if (isset($request->borrado)) {
            $return = 'Autor borrado correctamente';
        }
        elseif (isset($request->borrada_destacada)) {
            $return = 'Autor borrado correctamente';
        }
        elseif (isset($request->destacada_editara)) {
            $return = 'Noticia Destacada editada correctamente';
        }
        elseif (isset($request->creado)) {
            $return = 'Autor creado correctamente';
        }
        elseif (isset($request->editado)) {
            $return = 'Autor editado correctamente';
        }
        else{
            $return = null;
        }

        return $return;
    }
}
