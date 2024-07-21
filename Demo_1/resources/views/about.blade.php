@extends('layouts.app')
@section('content')
    this is about
    <?php
    var_dump(request()->is("about"));
?>
@endsection