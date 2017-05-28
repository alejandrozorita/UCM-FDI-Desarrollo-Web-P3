<?php

use Illuminate\Database\Seeder;

use App\Models\Categorias;


class CategoriasTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


		Categorias::create([      
            'nombre' => 'Tecnología',
            'slug' => 'tecnologia'
        ]);

        Categorias::create([      
            'nombre' => 'Política',
            'slug' => 'politica'
        ]);

        Categorias::create([      
            'nombre' => 'Nuevas tecnologías',
            'slug' => 'nuevas-tecnologias'
        ]);
    }
}