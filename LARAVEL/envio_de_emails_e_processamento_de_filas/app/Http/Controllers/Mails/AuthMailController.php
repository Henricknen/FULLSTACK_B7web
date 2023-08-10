<?php

namespace App\Http\Controllers\Mails;

use App\Http\Controllers\Controller;
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
        $user-> email = 'l.henrick@live.com';

        $user-> save();

        $registerEmail = new RegisterEmail($user);        // criando 'email' com a função 'RegisterEmail'

        Mail::to('l.henrick@live.com')->queue($registerEmail);     // método 'queue' coloca o email  na fila
        Mail::to('mail@gmail.com')->cc('outro@email.com')->send($registerEmail);     // enviando uma cópia carbono (CC) do email para 'mail@gmail.com' e possivelmente 'outro@email.com'
        return $registerEmail;      // retornando a view
    }
}

