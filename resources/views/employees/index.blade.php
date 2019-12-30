@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            {{ $company->name }} Employees
            <a href="{{ route('employees.create', $company) }}">Add Employee</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($employees as $employee)
                    <tr>
                        <td>{{ $employee->first_name }}</td>
                        <td>{{ $employee->last_name }}</td>
                        <td><a href="mailto:{{ $employee->email }}">{{ $employee->email }}</a></td>
                        <td>
                            <a href="tel:{{ $employee->phone }}">
                                {{ $employee->phone }}
                            </a>
                        </td>
                        <td class="flex">
                            <a href="{{ route('employees.show', [$company, $employee]) }}"
                                class="btn btn-primary">View</a>
                            <a href="{{ route('employees.edit', [$company, $employee]) }}"
                                class="btn btn-success">Edit</a>
                            <form action="{{ route('employees.destroy', [$company, $employee]) }}" method="post">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">No Employees in Database Please add some.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $employees->links() }}
        </div>
    </div>
</div>
@endsection
