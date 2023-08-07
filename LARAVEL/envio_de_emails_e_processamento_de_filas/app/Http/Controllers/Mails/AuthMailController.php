<?php

namespace App\Http\Controllers\Mails;

use App\Http\Controllers\Controller;
use App\Mail\RegisterEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AuthMailController extends Controller
{
    public function sendRegisterMail() {        // método de envio de email
        $registerEmail = new RegisterEmail();        // instançiando a classe 'mail'

        Mail::to('l.henrick@live.com')-> send($registerEmail);     // 'to' diz pra quem será enviado o email
    }
}
