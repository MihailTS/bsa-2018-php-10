<?php

namespace App\Http\Requests\Contracts;

interface ChangeRateRequest
{
    public function getRate() :float;
}
