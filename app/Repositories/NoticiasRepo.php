<?php
namespace App\Repositories;

use App\Models\Noticias;
use App\Models\NoticiasFront;

use Auth;

class NoticiasRepo {


	/**
	 * Sacamos todas las noticias publicadas
	 */
	public function get_todas_noticias_publicadas()
	{
		return Noticias::where('publicada',1)->orderBy('created_at','DESC')->get();
	}


	/**
	 * Sacamos todas las noticias
	 */
	public function get_todas_noticias()
	{
		return Noticias::all();
	}


	/**
	 * Sacamos todas las noticias publicadas de un aturo dado
	 */
	public function get_noticias_autor_publicadas($user_id = null)
	{
		if (is_null($user_id)) {
			return null;
		}

		return Noticias::where('user_id',$user_id)->where('publicada',1)->orderBy('created_at','DESC')->get();
	}


	/**
	 * Sacamos todas las noticias de un aturo dado
	 */
	public function get_todas_noticias_autor_paginado($user_id = null, $num = 10)
	{
		if (is_null($user_id)) {
			return null;
		}

		return Noticias::where('user_id',$user_id)->orderBy('created_at','DESC')->paginate($num);
	}


	/**
	 * Scamos noticias aleatorias para el slider del front
	 */
	public function get_noticias_random()
	{	

		$noticias = self::get_todas_noticias();

		if (count($noticias) < 1) {
			return $noticias;
		}
		elseif (count($noticias) > 3) {
			return $noticias->random(3);
		}
		else{
			return $noticias->random($noticias->count());
		}
		
	}



	/**
	 * Sacamos las noticias destacadas
	 */
	public function get_noticias_destacadas()
	{
		return NoticiasFront::with('noticia')->get();
	}



	/**
	 * Sacamos las noticias que no estén en destacads para el listado
	 */
	public function get_noticias_no_destacadas($arr_noticias_destacadas)
	{
		return Noticias::whereNotIn('id',array_pluck($arr_noticias_destacadas, 'noticia_id'))->get();
	}



	/**
     * Quitamos la noticia de destacada
     */
    public function quitar_noticia_destacada($noticia_id)
    {   
        return NoticiasFront::destroy($noticia_id);
    }



	/**
	 * Sacamos la noticia por Slug
	 */
	public function get_notcia_por_slug($slug = null)
	{
		if (is_null($slug)) {
			return null;
		}

		return Noticias::where('slug',$slug)->orderBy('created_at','DESC')->with('comentarios')->first();

	}
	

}