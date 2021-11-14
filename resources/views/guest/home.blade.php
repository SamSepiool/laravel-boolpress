<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <!-- Styles -->
         <link href="{{ asset('css/app.css') }}" rel="stylesheet">
         <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

    </head>
    <body>

        @include('partials.header')
        
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    BOOLPRESS
                </div>

                <div class="links">
                    <h1>home.blade, home, at least it was before I got lost among the others</h1>
                    <h3><a href="{{route('blogHome')}}">go to the blog homepage</a></h3>
                </div>
            </div>
        </div>
    </body>
</html>
