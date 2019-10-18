<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel Passing {{ $var }}
                </div>

                <ul>

                    <?php foreach ($tests as $test): ?>

                    <li> <?php echo $test ?></li>

                    <!-- the shortcut of echo is  <?= $test ?> -->
                    <li> <?= $test ?> </li>

                    <!-- the shortcut of echo with laravel is {{ $test }} -->
                    <li> {{ $test }} </li>

                    <?php endforeach; ?>

                </ul>

                <!-- Easy and Best $_$ -->
                <ul>
                    @foreach($tests as $test)
                        <li> {{ $test }} </li>

                    @endforeach
                </ul>

                <!-- e.g.: /test?title=Sarah, it will show 'show data in query request Sarah'-->
                <h2> show data in query request {{ $fromQuery }}</h2>

                <!-- to escape script, It helpful to avoid user's script -->
                <h2> show script code as escaped  {{ $script }}</h2>

                <!-- to execute script -->

                <!-- <h2> execute following script  {!! $script !!} </h2> -->

                 <!-- <h2> execute following script  <?php echo $script ?> </h2> -->


                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
