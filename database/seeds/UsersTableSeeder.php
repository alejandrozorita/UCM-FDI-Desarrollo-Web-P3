<?php

use Illuminate\Database\Seeder;

use App\Models\User;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


		User::create([      
            'name' => 'Admin',
            'email' => 'admin@bytecode.es',
            'rol' => 'admin',
            'password' => bcrypt('123456')
        ]);

        User::create([      
            'name' => 'Autor 1',
            'email' => 'autor1@bytecode.es',
            'rol' => 'autor',
            'password' => bcrypt('123456')
        ]);

        User::create([      
            'name' => 'Autor 2',
            'email' => 'autor2@bytecode.es',
            'rol' => 'autor',
            'password' => bcrypt('123456')
        ]);
    }
}
