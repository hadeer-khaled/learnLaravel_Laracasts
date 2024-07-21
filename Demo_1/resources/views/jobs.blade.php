@extends('layouts.app')
@section('content')
@foreach ($jobs as $job)
        <li>Title: {{$job['title']}} - Salary : {{$job['salary']}}</li>
@endforeach
@endsection