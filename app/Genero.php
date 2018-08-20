<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genero extends Model
{
    use SoftDeletes;

    protected $primaryKey="idGenero";
    protected $table="generos";
    public $timestamps=true;

    protected $fillable = ['nombre'];
    protected $hidden = ['pivot'];

    protected $dates = ['deleted_at'];

    public function peliculas(){
        return $this->belongsToMany('\App\Pelicula', 'peliculas_generos','idGenero', 'idPelicula');
    }
}
