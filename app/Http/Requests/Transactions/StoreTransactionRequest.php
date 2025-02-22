<?php

namespace App\Http\Requests\Transactions;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransactionRequest extends FormRequest
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
			'branch_id' => 'required|exists:App\Models\Branch,id',
			'date' => 'required|date',
			'amount' => 'required|numeric',
			'description' => 'nullable|string|max:255',
			'transaction_type' => 'required|string|max:255',
			'from_cash_type_id' => 'nullable|exists:App\Models\CashType,id',
			'to_cash_type_id' => 'nullable|exists:App\Models\CashType,id',
			'account_type_id' => 'nullable|exists:App\Models\AccountType,id',
			'dk' => 'nullable|in:D,K',
        ];
    }
}
