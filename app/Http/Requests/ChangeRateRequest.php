<?php

namespace App\Http\Requests;

use App\Entity\Currency;
use App\Http\Requests\Contracts\ChangeRateRequest as ChangeRateRequestContract;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class ChangeRateRequest extends FormRequest implements ChangeRateRequestContract
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        $currency = $this->route('currency');
        return Gate::allows('update', $currency);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'rate'=>'required|numeric|min:0|max:999999.99'
        ];
    }

    /**
     * @return float
     */
    public function getRate() :float
    {
        return $this->get('rate');
    }
}
