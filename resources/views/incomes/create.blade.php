@extends('layouts.app')

@section('title', __('Tambah Pemasukan'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('Pemasukan') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Tambah Pemasukan.') }}
                    </p>
                </div>

                <x-breadcrumb>
                    <li class="breadcrumb-item">
                        <a href="/">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('incomes.index') }}">{{ __('Pemasukan') }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('Tambah') }}
                    </li>
                </x-breadcrumb>
            </div>
        </div>

        <section class="section">
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('incomes.store') }}" method="POST">
                                @csrf
                                @method('POST')

                                @include('incomes.include.form')

                                <a href="{{ route('incomes.index') }}" class="btn btn-secondary">{{ __('Back') }}</a>

                                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
