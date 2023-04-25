<?php

namespace App\Http\Requests\Task;

use App\Rules\RealAddressRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreService extends FormRequest
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
            'name' => 'required|min:2|max:30',
            'description' => 'nullable|min:10|max:500',
            'category_id' => 'required',
            'price' => 'required|integer|between:100,10000',
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
            'name.required' => 'Введите название вашей услуги',

            'description.required' => 'Заполните описание',
            'description.min' => 'Слишком короткое описание услуги',
            'description.max' => 'Слишком длинное описание услуги',

            'category_id.required' => 'Услуга должна принадлежать одной из категорий',

            'price.required' => 'Введите цену услуги',
            'price.integer' => 'Цена должна быть числовым значением',
            'price.between' => 'Слишком маленькая или большая цена',

            'image.mimes' => 'Превью должно быть в формате .png или .jpg',
            'image.max' => 'Слишком большой размер изображения',
        ];
    }
}
