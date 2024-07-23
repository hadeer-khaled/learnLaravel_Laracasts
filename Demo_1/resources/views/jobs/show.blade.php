@extends('layouts.app')
@section('content')

{{-- @foreach ($job as $key=>$value)
        <li> {{$key}} => {{$value}} </li>
@endforeach --}}

<li>ID: {{$job->id}}</li>
<li>Title: {{$job->title}}</li>
<li>Salary: {{$job->salary}}</li>

@auth
        @if (Auth::id() === $job->employer->user_id)
        <div class="mt-4">
        <a href="{{ route('jobs.edit', $job->id) }}" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"> Edit</a>
        </div>
        @endif
@endauth

@endsection