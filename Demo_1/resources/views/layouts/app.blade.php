<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('page_title')</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

</head>
<body>
    <header>
        This is Header 
        @auth
        <a href="{{route('posts.create')}}" class="btn"> Create a Post</a>
        <form method="POST" action="/logout">
            @csrf
            <button type="submit"> Logout </button>
        </form>

        @endauth
        @guest
            <a href="{{route('regiter.create')}}" class="btn"> Register</a>
            <a href="{{route('login.create')}}" class="btn"> Login</a>
        @endguest
    </header>

    <div class="container">
        @yield('content')
    </div>

    <x-footer />

</body>
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</html>
