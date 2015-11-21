<!doctype html>
<html>
<head>
    <title>P4 about</title>
    <meta charset='utf-8'>
    <link href="/css/p4.css" type='text/css' rel='stylesheet'>
</head>
<body>

    <header>
        <img
        src='http://making-the-internet.s3.amazonaws.com/laravel-foobooks-logo@2x.png'
        style='width:300px'
        alt='Gregg's development Logo'>
    </header>

    <section>
        <h1>Show about: {{ $title }}</h1>
    </section>

    <footer>
        &copy; {{ date('Y') }}
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

</body>
</html>
