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
                <strong>Address:</strong>
                <br>
                {{ $company->address }}
            </div>
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
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>First Name</td>
                                <td>Last Name</td>
                                <td>Email</td>
                                <td>Phone</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($company->employees as $employee)
                            <tr>
                                <td>
                                    {{ $employee->first_name }}
                                </td>
                                <td>
                                    {{ $employee->last_name }}
                                </td>
                                <td>
                                    <a href="mailto:{{ $employee->email }}">
                                        {{ $employee->email }}
                                    </a>
                                </td>
                                <td>
                                    <a href="tel:{{ $employee->phone }}">
                                        {{ $employee->phone }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('employees.edit', [$company, $employee]) }}"
                                        class="btn btn-secondary">
                                        Edit
                                    </a>
                                    <form method="POST"
                                        action="{{ route('employees.destroy', [$company, $employee]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">
                                    No Employees in database for this Company
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
