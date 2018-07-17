<?php

namespace App\Jobs;

use App\Entity\Currency;
use App\Mail\RateChanged;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendRateChangedEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;
    public $currency;
    public $oldRate;

    /**
     * Create a new job instance.
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
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $rateChangedMessage = new RateChanged($this->user, $this->currency, $this->oldRate);
        Mail::to($this->user)->send($rateChangedMessage->build());
    }
}
