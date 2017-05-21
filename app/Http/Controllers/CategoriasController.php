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
}
