<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RegisterEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $user;      // definição da propriedade '$user'

    public function __construct(User $qualquerNome) {
        $this-> user = $qualquerNome;
    }

    public function build() {       // método 'Build' é responsavél por contruir a estrutura do email

        // $nome = 'Luis Henrique S F';        // dado que será passado para a view
        return $this-> view('Mail.registerMail', [       // retornando view com 'registerMail'
            'nome'=> $this-> user-> name
        ]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Register Email',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'Mail.registerMail',      // Substitua 'view.name' pelo nome correto da visualização
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
