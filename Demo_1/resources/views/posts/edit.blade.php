@extends('layouts.app')
@section('page_title' , 'edit post')
<!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
@section('content')
<form method="POST" action="/posts/{{$post->id}}">
    @csrf
    @method('PATCH')
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base font-semibold leading-7 text-gray-900">Edit Post:  {{$post->title}}</h2>
            
            @if($errors->any())
                  <ul style="color: red;">
                      @foreach($errors->all() as $error)
                          <li>
                            {{$error}}
                          </li>
                      @endforeach
                  </ul>
            @endif
  
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="sm:col-span-4">
            <label for="title" class="block text-sm font-medium leading-6 text-gray-900">title</label>
            <div class="mt-2">
              <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                <input type="text" name="title" id="title"   value="{{$post->title}}"
                class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="janesmith">
              </div>
            </div>

            @error('title')
              <p style="color: red;">  {{$message}} </p>
            @enderror

          </div>
  
          <div class="col-span-full">
            <label for="content" class="block text-sm font-medium leading-6 text-gray-900">content</label>
            <div class="mt-2">
              <textarea id="content" name="content" rows="3" value="{{$post->content}}"
               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
            </div>
          </div>

     
        </div>
      </div>

      <div class="mt-6 flex items-center justify-end gap-x-6">
        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        <button type="submit" form="delete-form" style="color: red;" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Delete</button>

    </div>
 
  </form>
  <form method="POST" action="/posts/{{$post->id}}" id="delete-form" style="display:hidden;">
    @csrf
    @method("DELETE")
  </form>
  
@endsection