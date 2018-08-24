<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;
use Input;
use Storage;

class Pelicula extends Model
{
    protected $primaryKey = "idPelicula";
    protected $table = "peliculas";
    public $timestamps = true;

    public $fillable = ['titulo', 'duracion', 'anio', 'imagen', 'idUser'];

    protected $hidden = ['pivot'];

    public function usuario()
    {
        return $this->belongsTo('\App\User', 'idUser');
    }

    public function generos()
    {
        return $this->belongsToMany('\App\Genero', 'peliculas_generos', 'idPelicula', 'idGenero');
    }

    public function scopeCortas($query)
    {
        return $query->where('duracion', '<', '120');
    }

    public function scopeActuales($query)
    {
        return $query->where('anio', date('Y'));
    }

    public function scopeAgrupar($query)
    {
        return $query->select('anio', 'duracion', DB::raw('count(*) as registros'))
            ->groupBy('anio', 'duracion');
    }

    public static function findGenero($array, $idGenero)
    {
        foreach ($array as $item) {
            foreach ($item as $value) {
                if ($value == $idGenero) {
                    return true;
                }
            }
        }
        return false;
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($pelicula) { // before delete() method call this
            $pelicula->generos()->detach();
            if ($pelicula->imagen != null) {
                Storage::delete($pelicula->imagen);
            }
        });

        static::creating(function ($pelicula) {
            $pelicula->idUser = Auth::id();
            if (Input::hasFile('imagen') && $pelicula->imagen != null) {
                $image = Input::file('imagen');
                $pelicula->imagen = $image->store('public/peliculas');
            }
        });

    }
}
