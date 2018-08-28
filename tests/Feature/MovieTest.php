<?php

namespace Tests\Feature;

use Tests\TestCase;

class MovieTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testJSON()
    {
        $response = $this->json('GET', '/api/movie/11');
        $response->assertSuccessful()
            ->assertJson([
                'idPelicula' => 11,
                'idUser' => 1,
            ]);
    }

    public function testEstructure()
    {
        $response = $this->json('GET', '/api/movie/11');
        $response->assertSuccessful()
            ->assertJsonStructure([
                'idPelicula', 'titulo', 'duracion', 'anio',
            ]);
    }
}
