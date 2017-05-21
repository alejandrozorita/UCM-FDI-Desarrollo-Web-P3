<?php

namespace App\Http\Controllers;

//Model
use App\Models\Noticias;

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
}
