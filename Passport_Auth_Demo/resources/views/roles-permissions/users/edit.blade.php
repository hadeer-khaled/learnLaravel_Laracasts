@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Edit a User
                        <a href="{{ url('/users') }}" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        @csrf
                        @method('PATCH')

                        <div class="mb-3">
                          <label for="name" class="form-label">Name</label>
                          <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" id="name" >
                        </div>
                        @error('name')
                            <p style="color: red;">  {{$message}} </p>
                        @enderror

                        <div class="mb-3">
                          <label for="email" class="form-label">Email</label>
                          <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" id="email" >
                        </div>
                        @error('email')
                            <p style="color: red;">  {{$message}} </p>
                        @enderror

                        <div class="mb-3">
                          <label for="roles" class="form-label">Roles</label>
                          <select name="roles[]" class="form-control" multiple>
                              <option value="">Select Role</option>
                              @foreach ($roles as $role)
                                   <option 
                                        value="{{ $role->name }}"
                                        {{ in_array($role->name, $userRoles) ? 'selected' : '' }}
                                    >{{ $role->name }}</option>
                              @endforeach
                          </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
