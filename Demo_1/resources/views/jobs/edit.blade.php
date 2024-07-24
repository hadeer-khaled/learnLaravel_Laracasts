@extends('layouts.app')
@section('page_title' , 'edit job')
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
<form method="POST" action="/jobs/{{$job->id}}">
  @method('PATCH')
    @csrf
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base font-semibold leading-7 text-gray-900">Edit a job</h2>
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="sm:col-span-4">
            <label for="title" class="block text-sm font-medium leading-6 text-gray-900">title</label>
            <div class="mt-2">
              <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                <input type="text" name="title" id="title"  value="{{$job->title}}" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="janesmith">
              </div>
            </div>

            @error('title')
              <p style="color: red;">  {{$message}} </p>
            @enderror

          </div>
  
          <div class="col-span-full">
            <label for="salary" class="block text-sm font-medium leading-6 text-gray-900">salary</label>
            <div class="mt-2">
              <input type="number" name="salary" id="salary"  value="{{$job->salary}}" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="janesmith">
            </div>
          </div>

          @error('salary')
          <p style="color: red;">  {{$message}} </p>
        @enderror

        </div>
      </div>

      <div class="mt-6 flex items-center justify-end gap-x-6">
        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
      </div>
 
  </form>
  
@endsection
  {{-- </form>
  <form method="POST" action="/jobs/{{$job->id}}" id="delete-form" style="display:hidden;">
    @csrf
    @method("DELETE")
  </form> --}}