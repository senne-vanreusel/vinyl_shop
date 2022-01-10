@extends('layouts.template')

@section('title', 'Edit Users')

@section('main')
    <h1>Edit user: {{ $user->name }}</h1>
    <form action="/admin/users/{{ $user->id }}" method="post">
        @method('put')
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name"
                   class="form-control @error('name') is-invalid @enderror"
                   placeholder="Name"
                   minlength="3"
                   required
                   value="{{ old('name', $user->name) }}">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email"
                   class="form-control @error('email') is-invalid @enderror"
                   placeholder="email"
                   minlength="3"
                   required
                   value="{{ old('name', $user->email) }}">
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <input class="form-check-input" type="checkbox" name="active" value="1" id="active" @if($user->active == 1) checked @endif>
            <label class="form-check-label" for="active">
                Active
            </label>
        </div>
        <div class="form-group">
            <input class="form-check-input" type="checkbox" name="admin" value="1" id="admin" @if($user->admin == 1) checked @endif>
            <label class="form-check-label" for="admin">
                Admin
            </label>
        </div>
        <button type="submit" class="btn btn-success">Save Users</button>
    </form>
@endsection
