@extends('layouts.app')
@section('page_title' , 'show post')
@section('content')

        <div>
            <p> Title: {{$post->title}}</p>
            <p> Content: {{$post->content}}</p>
        </div>
        <a href="{{route('posts.edit', $post->id)}}" class="btn"> Edit a Post</a>

@endsection