@extends('layouts.app')

@section('title', __('Detail of Branches'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('Branches') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Detail of branch.') }}
                    </p>
                </div>

                <x-breadcrumb>
                    <li class="breadcrumb-item">
                        <a href="/">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('branches.index') }}">{{ __('Branches') }}</a>
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
                    <td>{{ $branch->name }}</td>
                </tr>
<tr>
                    <td class="fw-bold">{{ __('Address') }}</td>
                    <td>{{ $branch->address }}</td>
                </tr>
<tr>
                                <td class="fw-bold">{{ __('Status') }}</td>
                                <td>{{ $branch->status == 1 ? 'True' : 'False' }}</td>
                              </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Created at') }}</td>
                                        <td>{{ $branch->created_at->format('Y-m-d H:i:s') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Updated at') }}</td>
                                        <td>{{ $branch->updated_at->format('Y-m-d H:i:s') }}</td>
                                    </tr>
                                </table>
                            </div>

                            <a href="{{ route('branches.index') }}" class="btn btn-secondary">{{ __('Back') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
