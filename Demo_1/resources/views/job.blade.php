@extends('layouts.app')
@section('content')

{{-- @foreach ($job as $key=>$value)
        <li> {{$key}} => {{$value}} </li>
@endforeach --}}

<li>ID: {{$job->id}}</li>
<li>Title: {{$job->title}}</li>
<li>Salart: {{$job->salary}}</li>
@endsection