<?php

namespace App\Exports;

use App\Pelicula;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;

class PeliculaPerYearSheet implements FromCollection, ShouldAutoSize, WithHeadings,
WithTitle, WithMapping
{

    private $year;

    public function __construct(int $year)
    {
        $this->year = $year;
    }

    public function map($pelicula): array
    {
        return [
            $pelicula->idPelicula,
            $pelicula->titulo,
            $pelicula->duracion,
            $pelicula->generos_count,
        ];
    }

    public function collection()
    {
        return Pelicula::withCount('generos')
            ->where('anio', $this->year)
            ->get(['idPelicula', 'titulo', 'duracion', 'generos_count']);
    }

    public function title(): string
    {
        return '' . $this->year;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Título',
            'Duración',
            '# Géneros',
        ];
    }
}
