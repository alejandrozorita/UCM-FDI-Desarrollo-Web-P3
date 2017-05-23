<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


//Controllers
use App\Http\Controllers\NoticiasController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\AutoresController;

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



    public function nuevo_autor()
    {
        $datos_vista['noticias'] = $this->noticiasController->get_todas_noticias_publicadas();

        $datos_vista['noticias_destacadas'] = $this->noticiasController->get_noticias_destacadas();

        $datos_vista['categorias'] = $this->categoriasController->get_todas_categorias();

        return view('admin.autor.nuevo',compact('datos_vista'));
    }
}
