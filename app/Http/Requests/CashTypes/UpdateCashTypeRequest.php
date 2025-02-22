<?php

namespace App\Http\Requests\CashTypes;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCashTypeRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
			'status' => 'required|boolean',
			'income' => 'nullable|string|max:255',
			'cashout' => 'nullable|string|max:255',
			'transfer' => 'nullable|string|max:255',
        ];
    }
}
