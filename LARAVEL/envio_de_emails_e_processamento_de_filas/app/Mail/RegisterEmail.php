<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RegisterEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $name;      // definição da propriedade '$name'

    public function __construct($name) {
        $this-> name = $name;
    }

    public function Build() {       // método 'Build' é responsavél por contruir a estrutura do email

        // $nome = 'Luis Henrique S F';        // dado que será passado para a view
        return $this-> view('Mail.registerMail', [       // retornando view com 'registerMail'
            'nome'=> $this-> name
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
            view: 'Mail.registerMail', // Substitua 'view.name' pelo nome correto da visualização
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
