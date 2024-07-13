@extends('layouts.app')
@section('content')
    

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        {{$role->name}} | Add a Role Permission
                        <a href="{{ url('roles') }}" class="btn btn-danger  float-end">Back</a>
                    </h4>
                </div>
                @if(session('status'))
                     <div class="alert alert-success"> {{ session('status') }}</div>
                 @endif
                <div class="card-body">
                    <form method="POST" action="{{ url('/roles/'.$role->id.'/store-permission') }}">
                        @csrf
                        @method('PUT')
                        @foreach ($permissions as $permission)
                        <div>
                            <label>
                                <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                                {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                                {{ ucfirst($permission->name) }}
                            </label>
                        </div>
                    @endforeach
                        @error('name')
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