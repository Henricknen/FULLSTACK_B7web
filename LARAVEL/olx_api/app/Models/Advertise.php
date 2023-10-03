<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertise extends Model {
    use HasFactory;

    protected $fillable =['price', 'isNegotiable', 'description', 'user_id', 'category_id', 'stste_id'];

    public function category() {
        return $this-> belongsTo(Category::class);      // indicando que este 'advertise' perteçe a uma categoria
    }

    public function state() {
        return $this-> belongsTo(State::class);
    }
    
    public function user() {
        return $this-> belongsTo(User::class);
    }
}
