<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model {
    use HasFactory;
    protected $table = 'Invoice';
    protected $fillable = [
        'description',
        'value',
        'address_id',
        'user_id'
    ];

    protected $hidden = [
        'user_id',
        'address_id'
    ];

    public function address() {     // método que criará um relaçionamento com endereço
        return $this-> hasOne(Address::class, 'id', 'address_id');
    }

    public function user() {     // método que criará um relaçionamento com usuário
        return $this-> hasOne(Address::class, 'id', 'user_id');
    }
}
