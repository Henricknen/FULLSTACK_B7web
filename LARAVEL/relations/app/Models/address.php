<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class address extends Model {

    public $table = 'addresses';        // definindo o nome da tabela

    protected $fillable = [     // definindo o campo 'address' do banco de dados
        'address',
    ];

    protected $hideen = [
        'user_id'
    ];

    use HasFactory;

    public function user() {        // criação do relaçionamento
        return $this-> belongsTo(User::class);
    }
}
