@extends('layouts.app')
@section('content')
@foreach ($jobs as $job)
        <a href ="/job/{{$job['id']}}" class="underline">

                <li>Title: {{$job['title']}} - Salary : {{$job['salary']}}</li>
        </a>
@endforeach
@endsection