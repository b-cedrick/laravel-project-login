<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifTentativeDeConnexionEchoue extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * Elements de elmentsDynamique
     * @var array
     */
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Array $data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS','mrcedrikmichel@gmail.com'))
                    ->subject('Mail relative à la sécurité de votre compte')
                    ->view('emails.notifTentative');
    }
}
