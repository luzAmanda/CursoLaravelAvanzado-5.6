<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([GeneroSeeder::class, ActorSeeder::class, PeliculasGenerosSeeder::class]);
    }
}
