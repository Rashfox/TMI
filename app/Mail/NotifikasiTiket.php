<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NotifikasiTiket extends Mailable
{
    use Queueable, SerializesModels;

    public $data; // Variabel untuk menampung data yang mau dikirim

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Konfirmasi Pendaftaran Event Baru', // Subjek email
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.notifikasi', // Arahkan ke file blade template email
        );
    }
}