<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('page_title')</title>
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

    <footer>
        This is Footer
    </footer>

</body>
</html>
