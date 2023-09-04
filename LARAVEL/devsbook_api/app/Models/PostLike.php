<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostLike extends Model {
    public $timestamp = false;

    protected $table = 'postlikes';     // 'postlikes' nome da tabela
}
