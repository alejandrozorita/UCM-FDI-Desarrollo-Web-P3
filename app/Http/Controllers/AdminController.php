<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


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
    public function index_admin()
    {
        $datos_vista['noticias'] = $this->noticiasController->get_todas_noticias_publicadas();

        $datos_vista['noticias_destacadas'] = $this->noticiasController->get_noticias_destacadas();

        $datos_vista['categorias'] = $this->categoriasController->get_todas_categorias();

        $datos_vista['autores'] = $this->autoresController->get_todos_autores_paginado(5);

        return view('admin.index',compact('datos_vista'));
    }



    /**
     * Mostramos la vista para crear un nuevo autor
     */
    public function nuevo_autor()
    {
        $datos_vista['noticias'] = $this->noticiasController->get_todas_noticias_publicadas();

        $datos_vista['noticias_destacadas'] = $this->noticiasController->get_noticias_destacadas();

        $datos_vista['categorias'] = $this->categoriasController->get_todas_categorias();

        return view('admin.autor.nuevo',compact('datos_vista'));
    }


    public function create_autor(Request $request)
    {
        $validar = self::validar_autor($autor->all());

        $autor = self::crear_autor($autor->all());

        return redirect()->route('index_admin')->withErrors('Usuario Creado');
    }




    private function validar_autor($autor)
    {
        $this->validate($autor, [
            'email' => 'required|unique:users|email|max:200',
            'name' => 'required',
            'password' => 'required',
            'rol' => 'required',
        ]);

        
    }


    private function crear_autor($autor)
    {
        return User::Create([$autor]);
    }
    
}
