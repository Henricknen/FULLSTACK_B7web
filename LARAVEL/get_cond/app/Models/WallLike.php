<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WallLike extends Model {
    use HasFactory;

    public $timestamps = false;
    public $table = 'walllikes';
}
