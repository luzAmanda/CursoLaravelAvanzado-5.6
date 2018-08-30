<?php

namespace App\Exports;
use App\Genero;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class GeneroExport implements WithMultipleSheets
{
    public function sheets(): array
    {
        $generos = Genero::has('peliculas')->get();
        $sheets = [];

        foreach ($generos as $g) {
            $sheets[] = new GeneroPerMovieSheet($g);
        }

        return $sheets;
    }
}
