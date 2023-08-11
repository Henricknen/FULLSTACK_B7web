<?php

namespace App\Models;

use App\Models\User;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model {
    use HasFactory;

    protected $fillable = [     // configurando 'fillable' colunas que serão preenchidas
        'title',
        'color',
        'user_id'
    ];

    public function user() {        // configurando relacionamento, puxando 'usuário'
        return $this->belongsTo(User::class);
    }

    public function tasks() {       // puxando todas as 'tasks' utilizando relacionamento 'hasMany'
        return $this->hasMany(Task::class);
    }
}
