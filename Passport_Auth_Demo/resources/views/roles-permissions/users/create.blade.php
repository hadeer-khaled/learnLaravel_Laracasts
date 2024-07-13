@extends('layouts.app')
@section('content')
    

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Create a Users
                        <a href="{{ url('users') }}" class="btn btn-danger  float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('users') }}">
                        @csrf

                        <div class="mb-3">
                          <label for="name" class="form-label">Name</label>
                          <input type="text" name="name" class="form-control" id="name" >
                        </div>
                        @error('name')
                            <p style="color: red;">  {{$message}} </p>
                        @enderror

                        <div class="mb-3">
                          <label for="email" class="form-label">Email</label>
                          <input type="email" name="email" class="form-control" id="email" >
                        </div>
                        @error('email')
                            <p style="color: red;">  {{$message}} </p>
                        @enderror

                        <div class="mb-3">
                          <label for="password" class="form-label">Password</label>
                          <input type="password" name="password" class="form-control" id="password" >
                        </div>
                        @error('password')
                            <p style="color: red;">  {{$message}} </p>
                        @enderror

                        <div class="mb-3">
                          <label for="roles" class="form-label">Roles</label>
                          <select name="roles[]" class="form-control" multiple>
                              <option value=""> Select Role</option>
                              @foreach ($roles as $role)
                                   <option value="{{$role->name}}">{{$role->name}}</option>
                                
                                @endforeach

                          </select>
                        </div>
                        @error('password')
                            <p style="color: red;">  {{$message}} </p>
                        @enderror

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection