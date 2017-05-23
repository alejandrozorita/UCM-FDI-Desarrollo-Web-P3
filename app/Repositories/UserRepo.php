<?php
namespace App\Repositories;

use App\Models\User;

use Auth;

class UserRepo {


	public function get_todos_autores()
	{
		return User::where('rol','autor')->get();
	}

	public function get_todos_autores_paginado($num = 5)
	{
		return User::where('rol','autor')->paginate($num);
	}
}