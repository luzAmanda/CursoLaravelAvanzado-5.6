<?php

namespace App;

use Faker;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable, EntrustUserTrait, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function peliculas()
    {
        return $this->hasMany('\App\Pelicula', 'idUser'); // modelo y clave foránea
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($usuario) {
            $faker = Faker\Factory::create();
            $password = $faker->password();
            info($password);
            $usuario->password = bcrypt($password);
        });
    }
}
