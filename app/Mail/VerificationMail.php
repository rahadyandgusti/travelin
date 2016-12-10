<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $nameFile;
    protected $nameResponder;
    protected $job;
    public function __construct($nameResponder,$nameFile,$job)
    {
        $this->nameFile = $nameFile;
        $this->nameResponder = $nameResponder;
        $this->job = $job;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.verifikasi')
                ->with([
                    'nameResponder' => $this->nameResponder,
                    'job' => $this->job,
                ])
                ->subject('Verifikasi Tagihan')
                ->attach(public_path('excel/'.$this->nameFile.'.xls'));
    }
}
