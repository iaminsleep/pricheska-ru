<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
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
            'name' => 'required|min:2|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:50|confirmed',
            'role' => 'required|in:customer,hairdresser'
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
            // name
            'name.required' => 'Введите имя',
            'name.min' => 'Слишком короткое имя',
            'name.max' => 'Слишком длинное имя',

            // email
            'email.required' => 'Введите почту',
            'email.email' => 'Введите действительный почтовый адрес',
            'email.unique' => 'Пользователь с данной почтой уже существует',

            // password
            'password.required' => 'Введите пароль',
            'password.confirmed' => 'Пароли не совпадают',
            'password.min' => 'Слишком короткий пароль',
            'password.max' => 'Слишком длинный пароль',

            // role
            'role.required' => 'Выберите свою роль',
            'role.in' => 'Такой роли не существует',
        ];
    }
}
