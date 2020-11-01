<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AskQuestionRequest extends FormRequest
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
            'title' => 'required|max:255',
            'body' => 'required|max:1000'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'タイトルは必須です',
            'title.max' => 'タイトルは２５５文字以内で入力してください',
            'body.required' => '本文は必須です',
            'body.max' => '本文は１０００文字以内で入力してください',
        ];
    }
}
