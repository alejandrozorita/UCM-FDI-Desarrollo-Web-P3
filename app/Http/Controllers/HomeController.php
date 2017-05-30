<?php

namespace App\Http\Controllers;

//Controllers
use App\Http\Controllers\NoticiasController;
use App\Http\Controllers\CategoriasController;

//Models
use App\Models\Noticias;


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

        $datos_vista['noticias_destacadas'] = $this->noticiasController->get_noticias_random();

        $datos_vista['categorias'] = $this->categoriasController->get_todas_categorias_paginadas(5);

        return view('index',compact('datos_vista'));
    }


    /**
     * Vemos la pagina de una noticia en concreto
     */
    public function leer_noticia(Request $request)
    {

        if (!isset($request->noticia_slug)) {
            return redirect()->back()->withErrors('No se ha encontrado la noticia');
        }

        $datos_vista['noticia'] = $this->noticiasController->get_notcia_por_slug($request->noticia_slug);

        $datos_vista['categorias'] = $this->categoriasController->get_todas_categorias();

        //Verificamos si la carga de la pagina es tras crear un autor para mostrar mensaje de borrado ok
        if (isset($request->comentario_creado)) {
            $datos_vista['mensaje_success'] = 'Comentario publicado correctamente';
        }

        

        return view('noticias.noticia',compact('datos_vista'));
    }



    /**
     * Mostramos las noticias de una categoria
     */
    public function ver_noticias_categoria(Request $request)
    {
        if (!isset($request->categoria_slug)) {
            return redirect()->back()->withErrors('No se ha encontrado la categoria');
        }


        $datos_vista['categoria'] = $this->categoriasController->get_categoria_slug_con_nociticas($request->categoria_slug);

        if ($datos_vista['categoria']->noticias->count() < 1) {
            return redirect()->back()->withErrors('La categoría no tiene ninguna noticia');
        }

        $datos_vista['categorias'] = $this->categoriasController->get_todas_categorias();

        return view('categorias.noticias-categoria',compact('datos_vista'));
    }
}
