<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'coupon' => 'nullable|string|min:2|max:20',
            'items' => 'required|array',
            'items.*.id' => 'required|numeric',
            'items.*.qty' => 'required|numeric|min:1',
            'user_id' => "nullable|numeric"
        ];
    }
}
