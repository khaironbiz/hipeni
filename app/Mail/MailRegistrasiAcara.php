<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailRegistrasiAcara extends Mailable
{
    public $data_email;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data_email)
    {
        $this->data_email=$data_email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@ovon.my.id')
            ->subject('Registrasi Acara')
            ->view('email.registrasi_acara');
    }
}
