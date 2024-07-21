@extends('layouts.app')
@section('content')
    this is home
    <?php
        var_dump(request()->is("/"));
    ?>
@endsection