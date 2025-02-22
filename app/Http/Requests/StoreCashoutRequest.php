<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCashoutRequest extends FormRequest
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
            'date' => 'required|date',
            'amount' => 'required|numeric|min:1', // Validasi untuk "amount" (angka lebih dari 0)
            'description' => 'nullable|string|max:255', // Validasi untuk "description" (boleh kosong, tapi jika ada harus string)
            'account_type_id' => 'required|integer|exists:account_types,id', // Validasi untuk "account_type_id" (integer dan harus ada di tabel account_types)
            'from_cash_type_id' => 'required|integer|exists:cash_types,id', // Validasi untuk "from_cash_type_id" (integer dan harus ada di tabel cash_types)
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'The code field is required.',
            'date.required' => 'The date field is required.',
            'date.after_or_equal' => 'The date must be today or in the future.',
            'amount.required' => 'The amount field is required.',
            'amount.numeric' => 'The amount must be a number.',
            'description.max' => 'The description may not be greater than 255 characters.',
            'account_type_id.required' => 'The account type field is required.',
            'account_type_id.exists' => 'The selected account type is invalid.',
            'from_cash_type_id.required' => 'The cash type field is required.',
            'from_cash_type_id.exists' => 'The selected cash type is invalid.',
        ];
    }
}
