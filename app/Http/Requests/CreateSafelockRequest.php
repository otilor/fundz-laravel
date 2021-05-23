<?php


namespace App\Http\Requests;


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
            'safelock_name' => 'required|string',
        ];
    }
}
