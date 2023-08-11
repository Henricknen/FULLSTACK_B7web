<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model {
    use HasFactory;

    protected $fillable = [
        'is_done',
        'title',
        'description',
        'due_date',
        'user_id',
        'category_id'
    ];

    public function user() {       // puxando o usuário que a task pertençe
        return $this-> belongsTo(User::class);
    }

    public function category() {        // puxando uma categoria
        return $this-> belongsTo(Category::class);
    }
}