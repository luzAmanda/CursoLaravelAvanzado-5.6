<?php

namespace App;

use App\Notifications\GeneroNotification;
use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OneSignal;

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
            $route = route("generos.show", $genero->idGenero);
            OneSignal::sendNotificationToAll("Se envió a papelera el género " . $genero->nombre . " a las " . $genero->deleted_at, $route);
            $user = Auth::user();
            $user->notify(new GeneroNotification($genero));
        });
        static::restoring(function ($genero) {
            info("restoring");
            $user = Auth::user();
            $user->notify(new GeneroNotification($genero, true));
        });

    }
}
