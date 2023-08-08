<?php

namespace App\Http\Controllers\Mails;

use App\Http\Controllers\Controller;
use App\Mail\RegisterEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AuthMailController extends Controller
{
    public function sendRegisterMail() {        // método de envio de email

        $user = new User();     // instançiando um 'model'
        $user-> name = ': Luis Henrique S F';

        $registerEmail = new RegisterEmail($user-> name);        // criando 'email' com a função 'RegisterEmail'

        return $registerEmail;      // retornando a view
        // Mail::to('l.henrick@live.com')-> send($registerEmail);     // 'to' diz pra quem será enviado o email
    }
}
