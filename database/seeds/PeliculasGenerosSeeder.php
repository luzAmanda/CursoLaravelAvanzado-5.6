<?php

use App\Genero;
use App\Pelicula;
use Illuminate\Database\Seeder;

class PeliculasGenerosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Pelicula::class, 20)->create()->each(function ($p) {
            $gens = Genero::find([rand(1, 20), rand(1, 20)]);
            if (count($gens) > 0) {
                $p->generos()->attach($gens);
            }
        });
    }
}
