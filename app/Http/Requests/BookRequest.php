<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;

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
        // 6Lf9xHoqAAAAAOwZnIH5s4z75b4n4y37PZ0xk1VO
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => '6Lf9xHoqAAAAAOwZnIH5s4z75b4n4y37PZ0xk1VO',
            'response' => request()->recaptchaToken
        ])->json();

        if (!$response['success'] || $response['score'] < 0.5) {
            throw ValidationException::withMessages([
                'recaptcha' => 'reCAPTCHA verification failed.',
            ]);
        }
        return [
            'tvSize.value' => 'required|integer',
            'wallMount.value' => 'required|integer',
            'wallType.value' => 'required|integer',
            'extraService' => 'required|array',
            'liftAssistance.value' => 'required|integer',
            'date' => 'required',
            'time' => 'required|array',
            'address' => 'required',
            'address_detail' => 'required',
            'fullname' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'zip_code' => 'required|integer|exists:zip_codes,zip_code',
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
            'zip_code' => 'Zip Code',
        ];
    }
}
