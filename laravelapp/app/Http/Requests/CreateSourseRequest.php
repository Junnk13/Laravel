<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSourseRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'user_name' => ['required', 'string', 'min:2'],
            'user_email' => ['required', 'email:rfc,dns', 'unique:Sourses', 'string'],
            'url' => ['required', 'string', 'unique:Sourses']
        ];
    }
}
