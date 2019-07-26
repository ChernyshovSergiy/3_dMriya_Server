<?php

namespace App\Mail\Order\Printing;

use App\Models\Printing;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Lang;

class VerifyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $print_order;

    public function __construct(Printing $printing)
    {
        $this->print_order = $printing;
    }

    public function build()
    {
        return $this->subject(Lang::get('mail.printing_order_confirmation'))
            ->markdown('emails.order.printing.verify');
    }
}
