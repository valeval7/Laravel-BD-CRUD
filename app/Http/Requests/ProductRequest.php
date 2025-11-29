<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    $productId = $this->route('product') ? $this->route('product')->id : null;

    return [
      'name' => ['required', 'string', 'max:255'],
      'description' => ['nullable', 'string'],
      'price' => ['required', 'numeric', 'min:0', 'max:99999999.99'],
      'stock' => ['required', 'integer', 'min:0'],
      'sku' => [
        'required',
        'string',
        'max:255',
        Rule::unique('products', 'sku')->ignore($productId)
      ],
      'category_id' => ['required', 'exists:categories,id'],
      'active' => ['boolean'],
    ];
  }

  public function messages(): array
  {
    return [
      'name.required' => 'El nombre es obligatorio',
      'name.max' => 'El nombre no puede exceder 255 caracteres',
      'price.required' => 'El precio es obligatorio',
      'price.numeric' => 'El precio debe ser un número',
      'price.min' => 'El precio debe ser mayor o igual a 0',
      'stock.required' => 'El stock es obligatorio',
      'stock.integer' => 'El stock debe ser un número entero',
      'stock.min' => 'El stock debe ser mayor o igual a 0',
      'sku.required' => 'El SKU es obligatorio',
      'sku.unique' => 'El SKU ya existe en el sistema',
      'category_id.required' => 'La categoría es obligatoria',
      'category_id.exists' => 'La categoría seleccionada no existe',
    ];
  }
}
