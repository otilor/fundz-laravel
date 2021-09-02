<?php


namespace App\Http\Requests;

use App\Rules\SafelocksSourceCheck;
use Illuminate\Foundation\Http\FormRequest;

class CreateSafelockRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'amount' => ['required', new SafelocksSourceCheck()],
            'source' => 'required',
            'duration' => 'required',
        ];
    }

    // messages
    public function messages()
    {
        return [
            'name.required' => 'Safelock name is required',
            'amount.required' => 'Safelock amount is required',
            // 'amount.safelocks_source_check' => 'You don\'t have enough fundz in the selected source',
            'source.required' => 'Safelock source is required',
            'return_date.required' => 'Safelock return date is required',
            'return_date.after' => 'You can only set date after today',
            'description.required' => 'Safelock description is required',
        ];
    }
}
