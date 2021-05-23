<?php

namespace App\Http\Requests;

use App\Rules\ValidatePassword;
use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'old_pass' => ['required', new ValidatePassword],
            'new_pass' => 'required|same:confirm_new_pass',
        ];
    }
}
