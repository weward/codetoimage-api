<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CodeStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|min:1',
            'code' => 'required|min:3',
            'style_id' => 'required|numeric',
        ];
    }
}
