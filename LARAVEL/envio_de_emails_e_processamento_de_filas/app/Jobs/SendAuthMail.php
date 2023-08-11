<?php

namespace App\Jobs;

use App\Mail\RegisterEmail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Monolog\Registry;

class SendAuthMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $user;

    public function __construct(User $user) {
        $this-> user = $user;
    }

    /**
     * Execute the job.
     */
    
    public function handle(): void {
        $registerEmail = new RegisterEmail($this->user); // criando 'email' com a função 'RegisterEmail'
    
        Mail::to('lui@hotmail.com')
            ->cc('outro@email.com')
            ->send($registerEmail); // 'send' envia o email
    }
    
}
