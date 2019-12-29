@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Edit {{ $employee->full_name() }}
        </div>
        <div class="card-body">
            <form action="{{ route('employees.update', [$employee->company, $employee]) }}" method="post">
                @csrf
                @method("PATCH")
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" id="first_name" placeholder="First name"
                            value="{{ $employee->first_name }}"
                            class="form-control @error('first_name') is-invalid @enderror">
                    </div>
                    <div class="col-md-6">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" id="last_name"
                            class="form-control @error('last_name') is-invalid @enderror"
                            value="{{ $employee->last_name }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email"
                        class="form-control @error('email') is-invalid @enderror" value="{{ $employee->email }}">
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror"
                        value="{{ $employee->phone }}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ URL::previous() }}" type="button" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
