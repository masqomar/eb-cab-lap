<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="code">{{ __('Code') }}</label>
            <input type="text" name="code" id="code" class="form-control @error('code') is-invalid @enderror" value="{{ isset($accountType) ? $accountType->code : old('code') }}" placeholder="{{ __('Code') }}" required />
            @error('code')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ isset($accountType) ? $accountType->name : old('name') }}" placeholder="{{ __('Name') }}" required />
            @error('name')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="type">{{ __('Type') }}</label>
            <input type="text" name="type" id="type" class="form-control @error('type') is-invalid @enderror" value="{{ isset($accountType) ? $accountType->type : old('type') }}" placeholder="{{ __('Type') }}" />
            @error('type')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="income-statement">{{ __('Income Statement') }}</label>
            <input type="text" name="income_statement" id="income-statement" class="form-control @error('income_statement') is-invalid @enderror" value="{{ isset($accountType) ? $accountType->income_statement : old('income_statement') }}" placeholder="{{ __('Income Statement') }}" />
            @error('income_statement')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="income">{{ __('Income') }}</label>
            <input type="text" name="income" id="income" class="form-control @error('income') is-invalid @enderror" value="{{ isset($accountType) ? $accountType->income : old('income') }}" placeholder="{{ __('Income') }}" />
            @error('income')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="cashout">{{ __('Cashout') }}</label>
            <input type="text" name="cashout" id="cashout" class="form-control @error('cashout') is-invalid @enderror" value="{{ isset($accountType) ? $accountType->cashout : old('cashout') }}" placeholder="{{ __('Cashout') }}" />
            @error('cashout')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="status">{{ __('Status') }}</label>
            <select class="form-select @error('status') is-invalid @enderror" name="status" id="status" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select status') }} --</option>
                <option value="0" {{ isset($accountType) && $accountType?->status == '0' ? 'selected' : (old('status') == '0' ? 'selected' : '') }}>{{ __('True') }}</option>
				<option value="1" {{ isset($accountType) && $accountType?->status == '1' ? 'selected' : (old('status') == '1' ? 'selected' : '') }}>{{ __('False') }}</option>
            </select>
            @error('status')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>