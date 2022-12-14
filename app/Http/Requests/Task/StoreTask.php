<?php

namespace App\Http\Requests\Task;

use App\Rules\RealAddressRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreTask extends FormRequest
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
            'title' => 'required|min:10|max:200',
            'description' => 'required|min:10|max:2000',
            'category_id' => 'required',
            'address' => ['string', 'required', new RealAddressRule()],
            'budget' => 'required|integer|between:100,10000',
            'deadline' => 'required|date|after:yesterday',
            'image' => 'nullable|mimes:jpeg,jpg,png|max:10000',
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
            'title.required' => 'Введите заголовок задания (это то, что первым делом увидит исполнитель)',

            'description.required' => 'Заполните описание, чтобы исполнитель знал, с чем имеет дело',
            'description.min' => 'Слишком короткое описание задания',
            'description.max' => 'Слишком длинное описание задания',

            'category_id.required' => 'Задание должно принадлежать одной из категорий',

            'address.required' => 'Введите место встречи',
            'address.string' => 'Бюджет должен быть строковым значением',

            'budget.required' => 'Введите бюджет задания',
            'budget.integer' => 'Бюджет должен быть числовым значением',
            'budget.between' => 'Слишком маленький или большой бюджет задания',

            'deadline.required' => 'Дата обязательна для заполнения',
            'deadline.date' => 'Дата неправильного формата',
            'deadline.after' => 'Срок исполнения не может быть раньше текущей даты',

            'image.mimes' => 'Превью должно быть в формате .png или .jpg',
            'image.max' => 'Слишком большой размер изображения',
        ];
    }
}
