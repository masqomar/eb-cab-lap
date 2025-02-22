<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ isset($branch) ? $branch->name : old('name') }}" placeholder="{{ __('Name') }}" required />
            @error('name')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="address">{{ __('Address') }}</label>
            <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror" placeholder="{{ __('Address') }}" required>{{ isset($branch) ? $branch->address : old('address') }}</textarea>
            @error('address')
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
                <option value="0" {{ isset($branch) && $branch?->status == '0' ? 'selected' : (old('status') == '0' ? 'selected' : '') }}>{{ __('True') }}</option>
				<option value="1" {{ isset($branch) && $branch?->status == '1' ? 'selected' : (old('status') == '1' ? 'selected' : '') }}>{{ __('False') }}</option>
            </select>
            @error('status')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>