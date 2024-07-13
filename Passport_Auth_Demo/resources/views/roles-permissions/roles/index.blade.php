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
                        Roles
                        <a href="{{ url('roles/create') }}" class="btn btn-primary float-end">Add Role</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                                      
                                <tr>
                                    <th scope="row">{{$role->id}}</th>
                                    <td>{{$role->name}}</td>
                                    <td> 
                                            <a href="{{url('/roles/'.$role->id.'/give-permission')}}" class="btn btn-success">Add / Edit Permission</a>
                                            <a href="{{url('/roles/'.$role->id.'/edit')}}" class="btn btn-success">Edit</a>
                                            <form  method="POST" action="{{url('/roles/'.$role->id)}}" style="display: inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"  class="btn btn-danger" > Delete</button>
                                            </form>
                                            {{-- <a href="{{url('/roles/'.$role->id.'/destroy')}}" class="btn btn-danger">Delete</a> --}}
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