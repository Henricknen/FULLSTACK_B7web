<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertise extends Model {
    use HasFactory;

    protected $fillable =['price', 'isNegotiable', 'description', 'user_id', 'category_id', 'stste_id'];

}
