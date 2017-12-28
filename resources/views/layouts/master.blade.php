<!DOCTYPE html>
<html lang="en">
    <head>
        @include('partials.header')
    </head>
    <body>
        <div class="blog-header">
            <div class="container">
                <h1 class="blog-title">Laravel blog</h1>
            </div>
    <div class="blog-masthead">
    <div class="container">
        <nav class="nav blog-nav">
            <a class="nav-link active" href="#">Home</a>
            <a class="nav-link" href="#">New features</a>
            <a class="nav-link" href="#">Press</a>
            <a class="nav-link" href="#">New hires</a>
            <a class="nav-link" href="#">About</a>
            @if (Auth::check())
            <a class="nav-link ml-auto" href="#">{{ Auth()->user()->name }}</a>
            <a class="nav-link ml-auto" href="/logout">Logout</a>
            @endif 
            @if (!Auth::check());
            <a class="nav-link ml-auto" href="/register">Registration</a>
            <a class="nav-link ml-auto" href="/login">Login</a>
            @endif
        </nav>
    </div>
</div>
        </div>
        <div class="container">
        @if ($message = session('message'))
            <div class="alert alert-success">{{ $message }}</div>
        @endif
            <div class="row">
                <div class="col-sm-8 blog-main">
                    @yield('content')
                </div>
                <div class="col-sm-3 offset-sm-1 blog-sidebar">
                    @include('partials.sidebar')
                </div>
            </div>
        </div>
        @include('partials.footer')
    </body>
</html>