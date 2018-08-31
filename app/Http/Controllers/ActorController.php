<?php

namespace App\Http\Controllers;

use App\Actor;
use App\Http\Requests\ActorRequest;

class ActorController extends Controller
{
    public function index()
    {
        $actores = Actor::withCount('peliculas')->orderBy('apellidos')->get();
        return $actores->toJson();
    }

    public function store(ActorRequest $request)
    {
        return Actor::create($request->all());
    }
}
