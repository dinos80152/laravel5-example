<!DOCTYPE html>
<html>
<head>
    <title>Laravel 5 Example - @yield('title')</title>
    <meta charset="utf-8">

    @section('style')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    @show

</head>
<body>
    <header>
    </header>

    <nav>
    </nav>

    <section>
    @yield('content')
    </section>

    <footer>
    </footer>

    @section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    @show

</body>
</html>