<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class StoreFeedback extends FormRequest
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
            'comment' => 'required|string|min:10|max:255',
            'rating' => 'required|integer|lte:5', // less than or equal
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
            'rating.required' => 'Выберите рейтинг',
            'rating.integer' => 'Рейтинг должен быть числовым значением',
            'rating.lte' => 'Даже не пытайся меня обмануть, пупсик.',

            'comment.required' => 'Введите небольшой комментарий',
            'comment.string' => 'Комментарий должен быть строковым значением',
            'comment.min' => 'Слишком короткий комментарий',
            'comment.max' => 'Достигнут лимит символов',
        ];
    }
}
