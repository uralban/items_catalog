<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesRequest extends FormRequest
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
            'catName' => 'required|min:2|max:64|unique:categories,name'
        ];
    }
    public function messages(){
      return [
        'catName.required' => 'Обязательно нужно внести название категории',
        'catName.min' => 'Название должно быть длиннее',
        'catName.max' => 'Название должно быть короче',
        'catName.unique' => 'Такая категория уже есть',
      ];
    }
}
