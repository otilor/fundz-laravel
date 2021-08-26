<?php

namespace App\Http\Requests;

use App\Rules\SafelocksSourceCheck;
use Illuminate\Foundation\Http\FormRequest;

class TopupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'amount' => ['required' , new SafelocksSourceCheck()],
            'source' => 'required',
        ];
    }
}
