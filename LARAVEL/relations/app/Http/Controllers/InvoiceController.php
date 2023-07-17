<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller {

    public function index() {       // rota index listará todas as 'Invoice'
        $invoices = Invoice::all();
        return $invoices;
    }

    public function createInvoice(Request $r) {       // rota criará uma nova 'Invoice'
        $data = $r-> only(['descripition', 'value', 'addresses_id', 'user_id']);
        $invoice = Invoice::create($data);
        return $invoice;
    }

    public function findOne(Request $r) {     // método que exibirÁ uma 'invoice'
        $invoice = Invoice::find($r-> id);
        return $invoice-> user;
    }
}