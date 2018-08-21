<?php

namespace App;

use App\Notifications\GeneroNotification;
use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genero extends Model
{
    use SoftDeletes;

    protected $primaryKey = "idGenero";
    protected $table = "generos";
    public $timestamps = true;

    protected $fillable = ['nombre'];
    protected $hidden = ['pivot'];

    protected $dates = ['deleted_at'];

    public function peliculas()
    {
        return $this->belongsToMany('\App\Pelicula', 'peliculas_generos', 'idGenero', 'idPelicula');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleted(function ($genero) {
            $user = Auth::user();
            $user->notify(new GeneroNotification($genero));
        });
        static::restored(function ($genero) {
            $user = Auth::user();
            $user->notify(new GeneroNotification($genero, true));
        });

    }
}
