<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;     // importando a interface 'JWTSubject'
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements JWTSubject {
    use Notifiable;

    public $timestamps = false;

    protected $hidden = ['password', 'token'];      // os campos 'password' e 'token' serão ocultos

    public function getJWTIdentifier() {
        return $this-> getKey();        // retorna um 'key'
    }

    public function getJWTCustomClaims() {
        return [];      // retorna um 'array' vazio
    }
}
