<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css">

    <title> @yield('title','Sarah')  </title>

    <style>
        .is-completed {
            text-decoration: line-through;
        }
    </style>

</head>
<body>

<div class="container" style="margin-top: 50px">
    @yield('content')
</div>

</body>
</html>
