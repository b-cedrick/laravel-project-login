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
    public $elmentsDynamique;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Array $elmentsDynamique)
    {
        $this->elmentsDynamique = $elmentsDynamique;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('baro.cedrick@gmail.com')->view('emails.notifTentative');
    }
}
