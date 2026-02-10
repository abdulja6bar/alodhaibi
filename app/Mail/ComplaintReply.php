<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ComplaintReply extends Mailable
{
    use Queueable, SerializesModels;

    public $reply_message;

    public function __construct($reply_message)
    {
        $this->reply_message = $reply_message;
    }

    public function build()
    {
        return $this->subject('رد على ملاحظتك - مؤسسة العضيبي')
                    ->view('emails.complaint_reply')
                    ->with(['messageText' => $this->reply_message]);
    }
}
