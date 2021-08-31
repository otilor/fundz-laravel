<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupRequest extends FormRequest
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
            'name' => 'required',
            'visibility' => 'required',
            'privateMails' => 'required_if:visibility,private',
            'description' => 'required|min:50|max:500',
            'target' => 'required|numeric|min:1000'
        ];
    }
}
