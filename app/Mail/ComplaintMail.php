<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ComplaintMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $files;

    public function __construct($data, $files = [])
    {
        $this->data = $data;
        $this->files = $files;
    }

    public function build()
{
    $email = $this->subject('ملاحظة جديدة من ' . $this->data['name'])
                  ->view('emails.complaint'); // قالب البريد

    // إرفاق الملفات
    foreach ($this->files as $file) {
        $email->attach($file['path'], [
            'as' => $file['name'],
            'mime' => $file['mime'],
        ]);
    }

    return $email;
}

}
