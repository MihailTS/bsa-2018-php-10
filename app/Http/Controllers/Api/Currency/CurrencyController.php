<?php

namespace App\Http\Controllers\Api\Currency;

use App\Entity\Currency;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangeRateRequest;
use App\Jobs\SendRateChangedEmail;
use App\User;

class CurrencyController extends Controller
{
    public function changeRate(Currency $currency, ChangeRateRequest $request)
    {
        $oldRate = $currency->rate;
        $currency->rate = $request->getRate();
        $currency->save();

        $users = User::where('is_admin', false)->get();
        foreach ($users as $user) {
            $job = (new SendRateChangedEmail($user, $currency, $oldRate))->onQueue('notification');
            $this->dispatch($job);
        }

        return response()->json($currency);
    }
}
