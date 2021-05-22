<?php

namespace App\Http\Requests;

use App\Rules\ValidatePassword;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Password;

class WithdrawRequest extends FormRequest
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
            'amount' => 'required|numeric|min:1000',
            'bank_code' => 'required',
            'account_number' => 'required|numeric',
            'comment' => 'nullable',
            'password' => ['required', new ValidatePassword],
        ];
    }
}
