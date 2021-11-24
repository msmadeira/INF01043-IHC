<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailRepetido extends Mailable
{
    use Queueable, SerializesModels;
	
	private $nome;
	private $fabricante;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $nome, string $fabricante)
    {
        $this->nome = $nome;
		$this->fabricante = $fabricante;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('App EhVegan? - Resultado do produto solicitado.')
					->view('emails.emailProdRepetido')->with(['nome' => $this->nome, 'fabricante' => $this->fabricante]);
    }
}
