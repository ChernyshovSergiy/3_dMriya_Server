<?php

namespace App\Mail\Order\Modeling;

use App\Models\Modeling;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Lang;

class VerifyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mod_order;

    public function __construct(Modeling $modeling)
    {
        $this->mod_order = $modeling;
    }

    public function build()
    {
        return $this->subject(Lang::get('mail.modeling_order_confirmation'))
            ->markdown('emails.order.modeling.verify');
    }
}
