@extends('layouts.app')
@section('page_name' , 'Login')
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
<form method="POST" action="/login">
    @csrf
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base font-semibold leading-7 text-gray-900">Login</h2>
            
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
          
  
          <div class="col-span-full">
            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">email</label>
            <div class="mt-2">
                <input type="email" name="email" id="email" value="{{ old('email') }}"  class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="janesmith@gmail.com">
            </div>
            @error('email')
            <p style="color: red;">  {{$message}} </p>
             @enderror
          </div>

            
          <div class="col-span-full">
            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">password</label>
            <div class="mt-2">
                <input type="password" name="password" id="password"  class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="**********">
            </div>
            @error('password')
            <p style="color: red;">  {{$message}} </p>
             @enderror
          </div>

  

     
        </div>
      </div>

      <div class="mt-6 flex items-center justify-end gap-x-6">
        <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
      </div>
 
  </form>
  
@endsection