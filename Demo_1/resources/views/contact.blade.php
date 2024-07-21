@extends('layouts.app')
@section('content')
    this is contact
    <?php
    var_dump(request()->is("contact"));
?>
@endsection