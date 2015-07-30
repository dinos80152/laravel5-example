<!DOCTYPE html>
<html>
<head>
    <title>Laravel 5 Example - @yield('title')</title>
    <meta charset="utf-8">

    @section('style')
    @show

</head>
<body>
    @yield('content')

    <footer>
    </footer>

    @section('script')
    @show

</body>
</html>