<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="code">{{ __('Code') }}</label>
            <input type="text" name="code" id="code" class="form-control @error('code') is-invalid @enderror" value="{{ isset($transaction) ? $transaction->code : old('code') }}" placeholder="{{ __('Code') }}" required />
            @error('code')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="branch-id">{{ __('Branch') }}</label>
            <select class="form-select @error('branch_id') is-invalid @enderror" name="branch_id" id="branch-id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select branch') }} --</option>
                
                        @foreach ($branches as $branch)
                            <option value="{{ $branch?->id }}" {{ isset($transaction) && $transaction?->branch_id == $branch?->id ? 'selected' : (old('branch_id') == $branch?->id ? 'selected' : '') }}>
                                {{ $branch?->name }}
                            </option>
                        @endforeach
            </select>
            @error('branch_id')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="date">{{ __('Date') }}</label>
            <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror" value="{{ isset($transaction) && $transaction?->date ? $transaction?->date?->format('Y-m-d') : old('date') }}" placeholder="{{ __('Date') }}" required />
            @error('date')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="amount">{{ __('Amount') }}</label>
            <input type="number" name="amount" id="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ isset($transaction) ? $transaction->amount : old('amount') }}" placeholder="{{ __('Amount') }}" required />
            @error('amount')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="description">{{ __('Description') }}</label>
            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="{{ __('Description') }}">{{ isset($transaction) ? $transaction->description : old('description') }}</textarea>
            @error('description')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="transaction-type">{{ __('Transaction Type') }}</label>
            <input type="text" name="transaction_type" id="transaction-type" class="form-control @error('transaction_type') is-invalid @enderror" value="{{ isset($transaction) ? $transaction->transaction_type : old('transaction_type') }}" placeholder="{{ __('Transaction Type') }}" required />
            @error('transaction_type')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="from-cash-type-id">{{ __('From Cash Type') }}</label>
            <select class="form-select @error('from_cash_type_id') is-invalid @enderror" name="from_cash_type_id" id="from-cash-type-id" class="form-control">
                <option value="" selected disabled>-- {{ __('Select from cash type') }} --</option>
                
                        @foreach ($cashTypes as $cashType)
                            <option value="{{ $cashType?->id }}" {{ isset($transaction) && $transaction?->from_cash_type_id == $cashType?->id ? 'selected' : (old('from_cash_type_id') == $cashType?->id ? 'selected' : '') }}>
                                {{ $cashType?->id }}
                            </option>
                        @endforeach
            </select>
            @error('from_cash_type_id')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="to-cash-type-id">{{ __('To Cash Type') }}</label>
            <select class="form-select @error('to_cash_type_id') is-invalid @enderror" name="to_cash_type_id" id="to-cash-type-id" class="form-control">
                <option value="" selected disabled>-- {{ __('Select to cash type') }} --</option>
                
                        @foreach ($cashTypes as $cashType)
                            <option value="{{ $cashType?->id }}" {{ isset($transaction) && $transaction?->to_cash_type_id == $cashType?->id ? 'selected' : (old('to_cash_type_id') == $cashType?->id ? 'selected' : '') }}>
                                {{ $cashType?->id }}
                            </option>
                        @endforeach
            </select>
            @error('to_cash_type_id')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="account-type-id">{{ __('Account Type') }}</label>
            <select class="form-select @error('account_type_id') is-invalid @enderror" name="account_type_id" id="account-type-id" class="form-control">
                <option value="" selected disabled>-- {{ __('Select account type') }} --</option>
                
                        @foreach ($accountTypes as $accountType)
                            <option value="{{ $accountType?->id }}" {{ isset($transaction) && $transaction?->account_type_id == $accountType?->id ? 'selected' : (old('account_type_id') == $accountType?->id ? 'selected' : '') }}>
                                {{ $accountType?->code }}
                            </option>
                        @endforeach
            </select>
            @error('account_type_id')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="dk">{{ __('Dk') }}</label>
            <select class="form-select @error('dk') is-invalid @enderror" name="dk" id="dk" class="form-control">
                <option value="" selected disabled>-- {{ __('Select dk') }} --</option>
                <option value="D" {{ isset($transaction) && $transaction->dk == 'D' ? 'selected' : (old('dk') == 'D' ? 'selected' : '') }}>D</option>
		<option value="K" {{ isset($transaction) && $transaction->dk == 'K' ? 'selected' : (old('dk') == 'K' ? 'selected' : '') }}>K</option>			
            </select>
            @error('dk')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>