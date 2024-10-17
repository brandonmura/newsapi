<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News App</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<nav class="navbar">
    <a href="{{ route('home') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
    <div class="search-container">
        <form action="{{ route('articles.search') }}" method="GET">
            <input type="text" name="query" placeholder="Search..." class="search-bar">
            <button type="submit" class="search-button">Search</button>
        </form>
    </div>
</nav>
<div class="container">
    @yield('content')
</div>
</body>
</html>
