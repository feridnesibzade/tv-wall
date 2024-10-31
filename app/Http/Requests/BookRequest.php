<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'tvSize.value' => 'required|integer',
            'wallMount.value' => 'required|integer',
            'wallType.value' => 'required|integer',
            'extraService.value' => 'required|integer',
            'liftAssistance.value' => 'required|integer',
            'date' => 'required',
            'time' => 'required|array',
            'address' => 'required',
            'address_detail' => 'required',
            'fullname' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ];
    }

    public function attributes(): array
    {
        return [
            'tvSize.value' => 'Tv size',
            'wallMount.value' => 'Wall mount',
            'wallType.value' => 'Wall type',
            'extraService.value' => 'Extra service',
            'liftAssistance.value' => 'Lift Assistance',
            'date' => 'Date',
            'time' => 'Time',
            'address' => 'Address',
            'address_detail' => 'Floor, Apartment',
            'fullname' => 'Fullname',
            'phone' => 'Phone',
            'email' => 'E-mail',
        ];
    }
}
