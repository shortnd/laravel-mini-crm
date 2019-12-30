@extends('layouts.app')


@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Companies
        </div>
        <div class="card-body">
            <a href="{{ route('companies.create') }}" class="btn btn-success mb-3">Create new company</a>
            <div class="card">
                <div class="card-header">
                    Companies List
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Address</td>
                                <td>Website</td>
                                <td>Email</td>
                                @auth
                                <td></td>
                                @endauth
                            </tr>
                        </thead>
                        <tbody>
                            @if ($companies->count())
                            @foreach ($companies as $company)
                            <tr>
                                <td>
                                    <a href="{{ route('companies.show', $company) }}">
                                        {{ $company->name }}
                                    </a>
                                </td>
                                <td>
                                    {{ $company->address }}
                                </td>
                                <td>
                                    {{ $company->website }}
                                </td>
                                <td>
                                    {{ $company->email }}
                                </td>
                                @auth
                                <td>
                                    <a href="{{ route('companies.edit', $company) }}" class="btn">Edit</a>
                                    <form action="{{ route('companies.destroy', $company) }}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                                @endauth
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="5">No Companies in Database</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $companies->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
