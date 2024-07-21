@extends('layouts.app')
@section('content')
@foreach ($job as $key=>$value)
        <li> {{$key}} => {{$value}} </li>
@endforeach
@endsection