<?php

use App\Actor;
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
            $actores = Actor::find([rand(1, 40), rand(1, 40), rand(1, 40)]);
            if (count($actores) > 0) {
                $p->actores()->attach($actores);
            }
        });
    }
}
