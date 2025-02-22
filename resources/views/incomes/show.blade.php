@extends('layouts.app')

@section('title', __('Detail of Transactions'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('Transactions') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Detail of transaction.') }}
                    </p>
                </div>

                <x-breadcrumb>
                    <li class="breadcrumb-item">
                        <a href="/">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('transactions.index') }}">{{ __('Transactions') }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('Detail') }}
                    </li>
                </x-breadcrumb>
            </div>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <tr>
                    <td class="fw-bold">{{ __('Code') }}</td>
                    <td>{{ $transaction->code }}</td>
                </tr>
<tr>
                    <td class="fw-bold">{{ __('Branch') }}</td>
                    <td>{{ $transaction->branch ? $transaction->branch->name : '' }}</td>
                </tr>
<tr>
                    <td class="fw-bold">{{ __('Date') }}</td>
                    <td>{{ isset($transaction->date) ? $transaction->date?->format("Y-m-d") : '' }}</td>
                </tr>
<tr>
                    <td class="fw-bold">{{ __('Amount') }}</td>
                    <td>{{ $transaction->amount }}</td>
                </tr>
<tr>
                    <td class="fw-bold">{{ __('Description') }}</td>
                    <td>{{ $transaction->description }}</td>
                </tr>
<tr>
                    <td class="fw-bold">{{ __('Transaction Type') }}</td>
                    <td>{{ $transaction->transaction_type }}</td>
                </tr>
<tr>
                    <td class="fw-bold">{{ __('From Cash Type') }}</td>
                    <td>{{ $transaction->from_cash_type ? $transaction->from_cash_type->id : '' }}</td>
                </tr>
<tr>
                    <td class="fw-bold">{{ __('To Cash Type') }}</td>
                    <td>{{ $transaction->to_cash_type ? $transaction->to_cash_type->id : '' }}</td>
                </tr>
<tr>
                    <td class="fw-bold">{{ __('Account Type') }}</td>
                    <td>{{ $transaction->account_type ? $transaction->account_type->code : '' }}</td>
                </tr>
<tr>
                    <td class="fw-bold">{{ __('Dk') }}</td>
                    <td>{{ $transaction->dk }}</td>
                </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Created at') }}</td>
                                        <td>{{ $transaction->created_at->format('Y-m-d H:i:s') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Updated at') }}</td>
                                        <td>{{ $transaction->updated_at->format('Y-m-d H:i:s') }}</td>
                                    </tr>
                                </table>
                            </div>

                            <a href="{{ route('transactions.index') }}" class="btn btn-secondary">{{ __('Back') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
