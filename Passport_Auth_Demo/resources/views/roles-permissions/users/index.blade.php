@extends('layouts.app')
@section('content')
    

<div class="container mt-5">
    <div class="row">
        @if(session('status'))
                <div class="alert alert-success"> {{ session('status') }}</div>
        @endif
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Users
                        <a href="{{ url('users/create') }}" class="btn btn-primary float-end">Add User</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Roles</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                                      
                                <tr>
                                    <th scope="row">{{$user->id}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>
                                        @if( !empty($user->getRoleNames()) )
                                            @foreach($user->getRoleNames() as $role )
                                                {{$role}}
                                            @endforeach
                                        @endif
                                    </td>
                                    <td> 
                                            <a href="{{url('/users/'.$user->id.'/edit')}}" class="btn btn-success">Edit</a>
                                            <form  method="POST" action="{{url('/users/'.$user->id)}}" style="display: inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"  class="btn btn-danger" > Delete</button>
                                            </form>
                                            {{-- <a href="{{url('/users/'.$user->id.'/destroy')}}" class="btn btn-danger">Delete</a> --}}
                                    </td>
                                </tr>

                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection