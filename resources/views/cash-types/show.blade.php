@extends('layouts.app')

@section('title', __('Detail of Cash Types'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('Cash Types') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Detail of cash type.') }}
                    </p>
                </div>

                <x-breadcrumb>
                    <li class="breadcrumb-item">
                        <a href="/">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('cash-types.index') }}">{{ __('Cash Types') }}</a>
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
                    <td class="fw-bold">{{ __('Name') }}</td>
                    <td>{{ $cashType->name }}</td>
                </tr>
<tr>
                                <td class="fw-bold">{{ __('Status') }}</td>
                                <td>{{ $cashType->status == 1 ? 'True' : 'False' }}</td>
                              </tr>
<tr>
                    <td class="fw-bold">{{ __('Income') }}</td>
                    <td>{{ $cashType->income }}</td>
                </tr>
<tr>
                    <td class="fw-bold">{{ __('Cashout') }}</td>
                    <td>{{ $cashType->cashout }}</td>
                </tr>
<tr>
                    <td class="fw-bold">{{ __('Transfer') }}</td>
                    <td>{{ $cashType->transfer }}</td>
                </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Created at') }}</td>
                                        <td>{{ $cashType->created_at->format('Y-m-d H:i:s') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Updated at') }}</td>
                                        <td>{{ $cashType->updated_at->format('Y-m-d H:i:s') }}</td>
                                    </tr>
                                </table>
                            </div>

                            <a href="{{ route('cash-types.index') }}" class="btn btn-secondary">{{ __('Back') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
