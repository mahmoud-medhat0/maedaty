<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeMa3datyRequest extends FormRequest
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
                'title' => "required",
                'address' => "required||max:200",
                'lat' => "required",
                'lng' => "required",
                'for' => "required",
                'maedaType' => "required",
                'government_id' => "required",
                'city_id' => "required",
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => "لا يمكن تركت اسم المائدة فارغ",
            'address.required' => "لا يمكن ترك عنوان المائدة فارغ",
            'address.max' => "العنوان يجب ان يكون اقل من 200 حرف",
            'lat.required' => "يجب اختيار مكان على الخريطة أو تحديد خط العرض",
            'lng.required' => "يجب اختيار مكان على الخريطة أو تحديد خط الطول",
            'for.required' => "يجب تحديد لمن تكون المائدة",
            'maedaType.required' => "يجب تحديد نوع المائدة",
            'government_id.required' => "يجب اختيار المحافظة",
            'city_id.required' => "يجب تحديد المركز",
        ];
    }
}