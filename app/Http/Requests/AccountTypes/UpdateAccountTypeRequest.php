<?php

namespace App\Http\Requests\AccountTypes;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAccountTypeRequest extends FormRequest
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
            'code' => 'required|string|max:255',
			'name' => 'required|string|max:255',
			'type' => 'nullable|string|max:255',
			'income_statement' => 'nullable|string|max:255',
			'income' => 'nullable|string|max:255',
			'cashout' => 'nullable|string|max:255',
			'status' => 'required|boolean',
        ];
    }
}
