<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller {
    
    public function index(Request $r) {     // método que irá listar todos o s endereços
        $addresses = Address::all();
        return $addresses;
    }
}
