<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostComent extends Model {
    public $timestamp = false;

    protected $table = 'postcoments';       // 'postcoments' nome da tabela
}
