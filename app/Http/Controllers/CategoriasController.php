<?php

namespace App\Http\Controllers;

//Model
use App\Models\Categorias;

//Repositories
use App\Repositories\CategoriasRepo;

use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function __construct(CategoriasRepo $categoriasRepo)
    {
        //$this->middleware('auth');
        $this->categoriasRepo = $categoriasRepo;
    }



    public function get_todas_categorias()
    {
    	return $this->categoriasRepo->get_todas_categorias();
    }


    /**
     * Sacamos noticias paginadas para no desmontar el front
     */
    public function get_todas_categorias_paginadas($num)
    {
        return $this->categoriasRepo->get_todas_categorias_paginadas($num);
    }


    /**
	 * Sacamos la categoria por su slug con sus noticias
	 */
	public function get_categoria_slug_con_nociticas($slug)
	{
		return $this->categoriasRepo->get_categoria_slug_con_nociticas($slug);
	}
}
