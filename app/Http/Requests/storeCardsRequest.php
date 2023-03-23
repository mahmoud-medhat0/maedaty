<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeCardsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
                'number' => "required|max:14",
                'company' => "required",
                'char_number' => "required",
                'char_value' => "required",
        ];
    }
    public function messages(): array
    {
        return [
            'number.required' => "كارت الشحن مطلوب!",
            'company.required' => "يجب تحديد شركة الاتصال",
            'char_number.required' => "عدد شحنات الكارت مطلوبة",
            'char_value.required' => "قيمة الشحنة مطلوبة!",
        ];
    }
}