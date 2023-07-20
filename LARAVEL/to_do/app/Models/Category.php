<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model {
    use HasFactory;

    protected $fillable = [     // configurando 'fillable' colunas que serão preenchidas
        'title',
        'color',
        'user_id'
    ];

    public function user() {        // configurando relaçionamento, puxando 'usuário'
        return $this->belongsTo(User::class);
    }

    public function tasks() {       // puxando todas as 'tasks' ultilizando relaçionamento 'hasMany'
        return $this->hasMany(Task::class);
    }
}
