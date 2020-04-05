<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Item;

class ItemsRequest extends FormRequest
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
      $url = ItemsRequest::url();
      $id = substr($url, strlen($url)-14, 1);
        return [
            'itemName' => [
                'required',
                Rule::unique('items', 'name')->ignore($id),
                'min:2|max:64'
              ],
            'itemCategories' => 'required',
            'itemCost' => 'required|numeric',
            'itemDesc' => 'required|min:5|max:254'
        ];
    }

    public function messages(){
      return [
        'itemName.required' => 'Обязательно нужно внести название товара',
        'itemName.min' => 'Название должно быть длиннее',
        'itemName.max' => 'Название должно быть короче',
        'itemName.unique' => 'Такой товар уже есть',
        'itemCategories.required' => 'Обязательно нужно выбрать категорию',
        'itemCost.required' => 'Обязательно нужно добавить цену',
        'itemCost.numeric' => 'Цена должна быть числом',
        'itemDesc.required' => 'Обязательно нужно добавить описание товара',
        'itemDesc.min' => 'Описание должно быть длиннее',
        'itemDesc.max' => 'Описание должно быть короче'
      ];
    }
}
