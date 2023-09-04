<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRelation extends Model {
    public $timestamp = false;

    protected $table = 'userrelations';         // ''userrelations' nome da tabela
}
