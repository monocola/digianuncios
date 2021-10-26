<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotificationAdAcepted extends Mailable
{
    use Queueable, SerializesModels;

    public $anuncio;

    public function __construct($mianuncio)
    {
        $this->anuncio = $mianuncio;

    }


    public function build()
    {

        return $this->view('mails.new-ad')
            ->subject('Anuncio Aprobado')
            ->with([
                'titulo' => $this->anuncio->titulo,
                'descripcion' => $this->anuncio->descripcion,
                'imagen' => $this->anuncio->banner,
            ]);
    }
}
