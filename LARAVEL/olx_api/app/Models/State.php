<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model {
    use HasFactory;

    protected $fillable =['name', 'slug'];
    public $timestamps = false;

    public function advertises() {
        return $this-> hasMany(Advertise::class);
    }

    public function users() {
        return $this-> hasMany(User::class);
    }
}
