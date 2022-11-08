<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;

class StorePost extends FormRequest
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
            'title' => 'required|min:2|max:100',
            'description' => 'required|min:10|max:1000',
            'content' => 'required|min:100|max:10000',
            'category_id' => 'required|integer',
            'thumbnail' => 'nullable|mimes:jpeg,jpg,png|max:10000',
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
            // title
            'title.required' => 'Название обязательно для ввода',
            'title.min' => 'Слишком короткое название',
            'title.max' => 'Слишком длинное название',

            // description
            'description.required' => 'Описание обязательно для ввода',
            'description.min' => 'Слишком короткое описание',
            'description.max' => 'Слишком длинное описание',

            // content
            'content.required' => 'Заполните вашу статью контентом',
            'content.min' => 'Слишком мало информации для статьи',
            'content.max' => 'Слишком много информации для статьи',

            // category_id
            'category_id.required' => 'Выберите категорию',

            // thumbnail
            'thumbnail.mimes' => 'Превью должно быть в формате .png или .jpg',
            'thumbnail.max' => 'Слишком большой размер изображения',
        ];
    }
}
