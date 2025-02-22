@extends('layouts.app')

@section('title', __('Detail of Account Types'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('Account Types') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Detail of account type.') }}
                    </p>
                </div>

                <x-breadcrumb>
                    <li class="breadcrumb-item">
                        <a href="/">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('account-types.index') }}">{{ __('Account Types') }}</a>
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
                    <td>{{ $accountType->code }}</td>
                </tr>
<tr>
                    <td class="fw-bold">{{ __('Name') }}</td>
                    <td>{{ $accountType->name }}</td>
                </tr>
<tr>
                    <td class="fw-bold">{{ __('Type') }}</td>
                    <td>{{ $accountType->type }}</td>
                </tr>
<tr>
                    <td class="fw-bold">{{ __('Income Statement') }}</td>
                    <td>{{ $accountType->income_statement }}</td>
                </tr>
<tr>
                    <td class="fw-bold">{{ __('Income') }}</td>
                    <td>{{ $accountType->income }}</td>
                </tr>
<tr>
                    <td class="fw-bold">{{ __('Cashout') }}</td>
                    <td>{{ $accountType->cashout }}</td>
                </tr>
<tr>
                                <td class="fw-bold">{{ __('Status') }}</td>
                                <td>{{ $accountType->status == 1 ? 'True' : 'False' }}</td>
                              </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Created at') }}</td>
                                        <td>{{ $accountType->created_at->format('Y-m-d H:i:s') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Updated at') }}</td>
                                        <td>{{ $accountType->updated_at->format('Y-m-d H:i:s') }}</td>
                                    </tr>
                                </table>
                            </div>

                            <a href="{{ route('account-types.index') }}" class="btn btn-secondary">{{ __('Back') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
