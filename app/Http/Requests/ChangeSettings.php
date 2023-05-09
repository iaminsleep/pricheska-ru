<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangeSettingsRequest extends FormRequest
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
            'name' => 'min:3|max:35',
            'email' => 'email:rfc,dns',
            'password' => 'nullable|min:8|max:25|confirmed',
            'city_id' => 'integer',
            'birth_date' => 'nullable|date|before:-18 years',
            'description' => 'nullable|string|max:1000',
            'specialization' => 'nullable|array',
            'phone' => 'nullable|string',
            'skype' => 'nullable|string|max:30',
            'avatar' => 'nullable|max:10000|mimes:jpg,jpeg,png',
            'notification_settings' => 'nullable',
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
            'email.email' => 'Введите действительный email',

            'name.min' => 'Слишком короткое имя',
            'name.max' => 'Слишком длинное имя',

            'password.min' => 'Длина пароля от 8 символов',
            'password.max' => 'Длина пароля не более 25 символов',
            'password.confirmed' => 'Пароли должны совпадать',

            'birth_date.date' => 'Дата неправильного формата',
            'description.max' => 'Слишком длинное описание',

            'phone.integer' => 'Телефон должен быть числовым значением',
            'skype.max' => 'Слишком длинный никнейм пользователя',

            'avatar.mimes' => 'Файл неверного формата',
            'avatar.max' => 'Слишком большой размер файла'
        ];
    }
}
