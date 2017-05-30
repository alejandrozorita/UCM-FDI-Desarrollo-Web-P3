<?php
namespace App\Repositories;

use App\Models\Categorias;

use Auth;

class CategoriasRepo {


	public function get_todas_categorias()
	{
		return Categorias::with('noticias')->get();
	}


	/**
	 * Sacamos la categoria por su slug con sus noticias
	 */
	public function get_categoria_slug_con_nociticas($slug)
	{
		return Categorias::where('slug',$slug)->with('noticias')->first();
	}


	/**
     * Sacamos noticias paginadas para no desmontar el front
     */
    public function get_todas_categorias_paginadas($num = 5)
    {
        return Categorias::with('noticias')->paginate($num);
    }
}