<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $primaryKey = "idActor";
    protected $table = "actores";
    protected $fillable = ['nombres', 'apellidos'];
    public $timestamps = true;

    public function peliculas()
    {
        return $this->belongsToMany('\App\Pelicula', 'peliculas_actores', 'idActor', 'idPelicula');
    }
}
