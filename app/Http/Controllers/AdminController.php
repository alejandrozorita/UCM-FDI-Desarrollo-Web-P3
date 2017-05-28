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
        $this->middleware('admin');
        //$this->middleware('auth');
        $this->noticiasController = $noticiasController;
        $this->categoriasController = $categoriasController;
        $this->autoresController = $autoresController;

    }


	/**
	 * Mostramos la página privada del administrador
	 */
    public function index_admin(Request $request)
    {
        $datos_vista['noticias'] = $this->noticiasController->get_todas_noticias_publicadas();

        $datos_vista['noticias_destacadas'] = $this->noticiasController->get_noticias_destacadas();

        $datos_vista['categorias'] = $this->categoriasController->get_todas_categorias();

        $datos_vista['autores'] = $this->autoresController->get_todos_autores_paginado(5);
    
        //Verificamos si la carga de la pagina es tras crear un autor para mostrar mensaje de borrado ok
        if (isset($request->borrado)) {
            $datos_vista['mensaje_success'] = 'Autor borrado correctamente';
        }

        return view('admin.index',compact('datos_vista'));
    }



    /**
     * Mostramos la vista para crear un nuevo autor
     */
    public function nuevo_autor(Request $request)
    {
        $datos_vista['noticias'] = $this->noticiasController->get_todas_noticias_publicadas();

        $datos_vista['noticias_destacadas'] = $this->noticiasController->get_noticias_destacadas();

        $datos_vista['categorias'] = $this->categoriasController->get_todas_categorias();

        //Verificamos si la carga de la pagina es tras crear un autor para mostrar mensaje de creado ok
        if (isset($request->creado)) {
            $datos_vista['mensaje_success'] = 'Autor creado correctamente';
        }

        return view('admin.autor.nuevo',compact('datos_vista'));
    }



    /**
     * Mostramos la vista para editar un nuevo autor
     */
    public function editar_autor(Request $request)
    {
            
        $datos_vista['noticias'] = $this->noticiasController->get_todas_noticias_publicadas();

        $datos_vista['noticias_destacadas'] = $this->noticiasController->get_noticias_destacadas();

        $datos_vista['categorias'] = $this->categoriasController->get_todas_categorias();
        
        //Verificamos si la carga de la pagina es tras crear un autor para mostrar mensaje de creado ok
        if (isset($request->creado)) {
            $datos_vista['mensaje_success'] = 'Autor creado correctamente';
        }

        return view('admin.autor.nuevo',compact('datos_vista'));
    }


    /**
     * Editar autor
     */
    public function editar_autor_post(Request $request)
    {
        
        //Verificamos si la carga de la pagina es tras crear un autor para mostrar mensaje de creado ok
        if (isset($request->creado)) {
            $datos_vista['mensaje_success'] = 'Autor creado correctamente';
        }

        return view('admin.autor.nuevo',compact('datos_vista'));
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


}
