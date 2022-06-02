<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNewsRequest extends FormRequest
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
            'category_id' => ['required', 'integer', 'min:1', 'exists:categories,id'],
            'title' => ['required','unique:News', 'string', 'min:5'],
            'author' => ['required', 'string', 'min:2'],
            'image' => ['nullable', 'string', 'mimes:png,jpg'],
            'short_description' => ['required', 'string', 'min:10'],
            'full_description' => ['required', 'string', 'min:30'],
            'status' => ['required', 'string', 'min:4']
        ];
    }
}
