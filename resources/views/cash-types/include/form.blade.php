<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ isset($cashType) ? $cashType->name : old('name') }}" placeholder="{{ __('Name') }}" required />
            @error('name')
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
                <option value="0" {{ isset($cashType) && $cashType?->status == '0' ? 'selected' : (old('status') == '0' ? 'selected' : '') }}>{{ __('True') }}</option>
				<option value="1" {{ isset($cashType) && $cashType?->status == '1' ? 'selected' : (old('status') == '1' ? 'selected' : '') }}>{{ __('False') }}</option>
            </select>
            @error('status')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="income">{{ __('Income') }}</label>
            <input type="text" name="income" id="income" class="form-control @error('income') is-invalid @enderror" value="{{ isset($cashType) ? $cashType->income : old('income') }}" placeholder="{{ __('Income') }}" />
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
            <input type="text" name="cashout" id="cashout" class="form-control @error('cashout') is-invalid @enderror" value="{{ isset($cashType) ? $cashType->cashout : old('cashout') }}" placeholder="{{ __('Cashout') }}" />
            @error('cashout')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="transfer">{{ __('Transfer') }}</label>
            <input type="text" name="transfer" id="transfer" class="form-control @error('transfer') is-invalid @enderror" value="{{ isset($cashType) ? $cashType->transfer : old('transfer') }}" placeholder="{{ __('Transfer') }}" />
            @error('transfer')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>