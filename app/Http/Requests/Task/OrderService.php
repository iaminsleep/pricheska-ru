<?php

namespace App\Http\Requests\Task;

use App\Rules\RealAddressRule;
use Illuminate\Foundation\Http\FormRequest;

class OrderService extends FormRequest
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
            'address' => ['string', 'required', new RealAddressRule()],
            'deadline' => 'required|date|after:yesterday',
        ];
    }

    public function messages()
    {
        return [
            'address.required' => 'Введите место встречи',
            'address.string' => 'Бюджет должен быть строковым значением',

            'deadline.required' => 'Дата обязательна для заполнения',
            'deadline.date' => 'Дата неправильного формата',
            'deadline.after' => 'Срок исполнения не может быть раньше текущей даты',
        ];
    }
}
