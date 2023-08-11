<?php

namespace App\Http\Controllers\Mails;

use App\Http\Controllers\Controller;
use App\Jobs\SendAuthMail;
use App\Mail\RegisterEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AuthMailController extends Controller
{
    public function sendRegisterMail() {        // método de envio de email para destinarios indicados aqui

        $user = new User();     // instançiando um 'model'
        $user-> name = ': Luis Henrique S F...';
        $user-> password = '1234';
        $user-> email = 'l.henrick2023@live.com';

        $user-> save();

        SendAuthMail::dispatch($user);      // cadastrando o job na fila
    }
}

