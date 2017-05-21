<?php

namespace App\Http\Controllers;

//Controllers
use App\Http\Controllers\NoticiasController;
use App\Http\Controllers\CategoriasController;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(NoticiasController $noticiasController, CategoriasController $categoriasController)
    {
        //$this->middleware('auth');
        $this->noticiasController = $noticiasController;
        $this->categoriasController = $categoriasController;

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos_vista['noticias'] = $this->noticiasController->get_todas_noticias_publicadas();

        $datos_vista['noticias_destacadas'] = $this->noticiasController->get_noticias_destacadas();

        $datos_vista['categorias'] = $this->categoriasController->get_todas_categorias();

        return view('index',compact('datos_vista'));
    }
}
