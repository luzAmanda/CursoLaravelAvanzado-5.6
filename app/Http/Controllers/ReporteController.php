<?php

namespace App\Http\Controllers;

use App\Exports\PeliculaExport;
use App\Exports\UsersExport;
use App\Exports\GeneroExport;
use App\User;
use Excel;
use PDF;

class ReporteController extends Controller
{
    public function reporteUsuarios()
    {
        $usuarios = User::with('roles')->orderBy('name')->get();
        $reporte = PDF::loadView('reportes.usuarios', compact('usuarios'));
        $reporte = $reporte->stream('Reporte Usuarios.pdf');
        return $reporte;
    }

    public function index()
    {
        return view('reportes.index');
    }

    public function reporteUsuariosExcel()
    {
        return Excel::download(new UsersExport, 'usuarios.xlsx');
    }

    public function reportePeliculasExcel()
    {
        return Excel::download(new PeliculaExport, 'peliculas.xlsx');
    }

    public function reporteGenerosExcel()
    {
        return Excel::download(new GeneroExport, 'generos.xlsx');
    }
}
