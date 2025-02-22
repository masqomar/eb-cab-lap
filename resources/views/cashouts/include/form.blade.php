<div class="row mb-2">
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
            <label for="from-cash-type-id">{{ __('Dari Kas') }}</label>
            <select class="form-select @error('from_cash_type_id') is-invalid @enderror" name="from_cash_type_id" id="from-cash-type-id" class="form-control">
                <option value="" selected disabled>-- {{ __('Pilihan Kas') }} --</option>
                
                        @foreach ($cashTypes as $cashType)
                            <option value="{{ $cashType?->id }}" {{ isset($transaction) && $transaction?->from_cash_type_id == $cashType?->id ? 'selected' : (old('from_cash_type_id') == $cashType?->id ? 'selected' : '') }}>
                                {{ $cashType?->name }}
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
            <label for="account-type-id">{{ __('Untuk Akun') }}</label>
            <select class="form-select @error('account_type_id') is-invalid @enderror" name="account_type_id" id="account-type-id" class="form-control">
                <option value="" selected disabled>-- {{ __('Pilihan Akun') }} --</option>
                
                        @foreach ($accountTypes as $accountType)
                            <option value="{{ $accountType?->id }}" {{ isset($transaction) && $transaction?->account_type_id == $accountType?->id ? 'selected' : (old('account_type_id') == $accountType?->id ? 'selected' : '') }}>
                                {{ $accountType?->name }}
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
</div>