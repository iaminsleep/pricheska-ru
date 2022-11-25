<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class StoreResponse extends FormRequest
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
            'payment' => 'required|integer',
            'comment' => 'required|string|min:5|max:280',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'payment.required' => 'Введите вашу оплату',
            'payment.integer' => 'Оплата должна быть числовым значением',

            'comment.required' => 'Введите небольшой комментарий',
            'comment.string' => 'Комментарий должен быть строковым значением',
            'comment.min' => 'Слишком короткий комментарий',
            'comment.max' => 'Достигнут лимит символов',
        ];
    }
}
