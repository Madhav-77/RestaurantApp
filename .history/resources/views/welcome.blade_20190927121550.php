
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Food Maniac') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        </head>
    <body>
    <div class="view" style="background-image:url('https://images.pexels.com/photos/972533/pexels-photo-972533.jpeg'); background-size: cover; background-position: center center;">
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
                <div class="m-b-md">
                <div class="title">
                    Food Maniac</div>
                    
                </div>
            </div>
        </div>
    </div>
<!-- Footer -->
<footer class="page-footer font-small cyan darken-3">
    <div class="footer-copyright text-center py-3">© 2019 Copyright: foodmaniac.test</div>
</footer>
<!-- Footer -->
    </body>
</html>
mayuri
chahat
himani
gunjan
anushka
esha choppra
kriti