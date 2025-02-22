@extends('layouts.app')

@section('title', __('Account Types'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('Account Types') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Below is a list of all account types.') }}
                    </p>
                </div>
                <x-breadcrumb>
                    <li class="breadcrumb-item"><a href="/">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Account Types') }}</li>
                </x-breadcrumb>
            </div>
        </div>

        <section class="section">
            <x-alert></x-alert>

                @can('account type create')
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('account-types.create') }}" class="btn btn-primary mb-3">
                            <i class="fas fa-plus"></i>
                            {{ __('Create a new account type') }}
                        </a>
                    </div>
                @endcan

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive p-1">
                                <table class="table table-striped" id="data-table" width="100%">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Code') }}</th>
											<th>{{ __('Name') }}</th>
											<th>{{ __('Type') }}</th>
											<th>{{ __('Income Statement') }}</th>
											<th>{{ __('Income') }}</th>
											<th>{{ __('Cashout') }}</th>
											<th>{{ __('Status') }}</th>
                                            <th>{{ __('Created At') }}</th>
                                            <th>{{ __('Updated At') }}</th>
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.0/datatables.min.css" />
@endpush

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.0/datatables.min.js"></script>
    <script>
        $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('account-types.index') }}",
            columns: [
                {
                    data: 'code',
                    name: 'code',
                },
				{
                    data: 'name',
                    name: 'name',
                },
				{
                    data: 'type',
                    name: 'type',
                },
				{
                    data: 'income_statement',
                    name: 'income_statement',
                },
				{
                    data: 'income',
                    name: 'income',
                },
				{
                    data: 'cashout',
                    name: 'cashout',
                },
				{
                    data: 'status',
                    name: 'status',
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'updated_at',
                    name: 'updated_at'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ],
        });
    </script>
@endpush
