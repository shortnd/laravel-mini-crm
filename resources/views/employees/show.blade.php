@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            {{ $employee->full_name() }}
            <a href="{{ route('employees.edit', [$employee->company, $employee]) }}">Edit</a>
        </div>
        <div class="card-body">
            <p>
                <strong>Company:</strong> {{ $employee->company->name }}
            </p>
            <p>
                <strong>Email:</strong> {{ $employee->email}}
            </p>
            <p>
                <strong>Phone:</strong> {{ $employee->phone }}
            </p>
        </div>
        <div class="card-footer">
            <form action="{{ route('employees.destroy', [$employee->company, $employee]) }}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
