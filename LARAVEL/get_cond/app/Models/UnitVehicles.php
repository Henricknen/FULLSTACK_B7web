<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class unitvehicles extends Model {
    use HasFactory;
    
    protected $hidden = [       // escondendo 'campos'
        'id_unit'
    ];

    public $timestamps = false;
    public $table = 'unitvehicles';      // nome real da tabela
}
