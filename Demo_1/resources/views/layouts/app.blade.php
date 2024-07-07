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

        @endauth
    </header>

    <div class="container">
        @yield('content')
    </div>

    <footer>
        This is Footer
    </footer>

</body>
</html>
