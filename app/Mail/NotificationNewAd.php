<?php

namespace App\Mail;

use App\Anuncio;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotificationNewAd extends Mailable
{
    use Queueable, SerializesModels;

    public $anuncio;

    public function __construct($mianuncio)
    {
        $this->anuncio = $mianuncio;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {


        return $this->view('mails.new1-ad')
            ->subject('Anuncio Creado')
            ->with([
                'titulo' => $this->anuncio->titulo,
                'descripcion' => $this->anuncio->descripcion,
                'imagen' => $this->anuncio->banner,
            ]);
    }


}
