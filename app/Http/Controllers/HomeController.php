<?php

namespace App\Http\Controllers;

use App\Genero;
use App\Pelicula;
use App\Charts\PeliculaChart;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $generos = Genero::count();
        // $peliculas = Pelicula::count();
        $chart = new PeliculaChart;
        return view('home', compact("chart"));
    }
}
