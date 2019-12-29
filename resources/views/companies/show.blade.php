@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            {{ $company->name }}
            <a href="{{ route('companies.edit', $company) }}">
                Edit {{ $company->name }}
            </a>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <strong>Logo:</strong> <img src="{{ asset($company->logo) }}" alt="{{ $company->name }} logo" />
            </div>
            <div class="mb-3">
                <strong>Email:</strong> {{ $company->name }}
            </div>
            <div class="mb-3">
                <strong>Website:</strong>
                <a href="{{ $company->url }}">{{ $company->url }}</a>
            </div>

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    Employees
                    <a href="{{ route('employees.create', [$company]) }}">
                        Add Employee
                    </a>
                </div>
                <div class="card-body">
                    Employee Count: {{ $company->employees->count() }}
                    <br>
                    <a href="{{ route('employees.index', [$company]) }}">View Employees</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
