<!doctype html>
<html>
<head>
    <title>
        {{-- Yield the title if it exists, otherwise default to 'Site Lists' --}}
        @yield('title','Site Lists')
    </title>

    <meta charset='utf-8'>
    <link href="/css/p4.css" type='text/css' rel='stylesheet'>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    {{-- Yield any page specific CSS files or anything else you might want in the <head> --}}
    @yield('head')

</head>
<body>

    @if(\Session::has('flash_message'))
        <div class='flash_message'>
            {{ \Session::get('flash_message') }}
        </div>
    @endif

    <header>
        <img
        src='/images/architecture site logo.jpg'
        style='width:300px'
        alt='architecture site logo'>
    </header>

    <nav>
    <ul>
        @if(Auth::check())
            <li><a href='/'>Home</a></li>
            <li><a href='/sites/create'>Add a Site</a></li>
            <li><a href='/logout'>Log out</a></li>
        @else
            <li><a href='/'>Home</a></li>
            <li><a href='/login'>Log in</a></li>
            <li><a href='/register'>Register</a></li>
        @endif

    </ul>
</nav>


    <section>
        {{-- Main page content will be yielded here --}}
        @yield('content')
    </section>

    <footer>
        &#9774 website by Gregg Tompkins
        &copy; {{ date('Y') }} &nbsp;&nbsp;
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    {{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
    @yield('body')

</body>


</html>
