<?php
namespace App\Repositories;

use App\Models\Categorias;

use Auth;

class CategoriasRepo {


	public function get_todas_categorias()
	{
		return Categorias::all();
	}
}