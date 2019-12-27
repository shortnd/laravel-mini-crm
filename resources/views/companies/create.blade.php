@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Create Company
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        @foreach($errors->all() as $error)
                        <div>
                            {{ $error }}
                        </div>
                        @endforeach
                    </div>
                @endif
                <form action="{{ route('companies.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="email@email.com">
                    </div>
                    <div class="form-group">
                        <label for="logo">Logo</label>
                        <input type="file" name="logo" id="logo" class="form-control-file">
                    </div>
                    <div class="form-group">
                        <label for="url">URL</label>
                        <input type="text" name="url" id="url" placeholder="www.website.com" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
