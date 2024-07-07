@extends('layouts.app')
@section('page_title' , 'create post')
@section('content')
<div>
    @foreach($posts as $post)
        <div>
            <p> Title: {{$post->title}}</p>
            <p> Content: {{$post->content}}</p>
        </div>
    @endforeach
</div>
@endsection