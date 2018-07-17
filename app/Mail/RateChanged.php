<?php

namespace App\Mail;

use App\Entity\Currency;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RateChanged extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    private $currency;
    private $oldRate;

    /**
     * Create a new message instance.
     *
     * @param User $user
     * @param Currency $currency
     * @param float $oldRate
     */
    public function __construct(User $user, Currency $currency, float $oldRate)
    {
        $this->user = $user;
        $this->currency = $currency;
        $this->oldRate = $oldRate;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.currency_rate_changed')
            ->with([
                'user'     => $this->user,
                'currency' => $this->currency,
                'old_rate' => $this->oldRate,
            ]);
    }
}
