<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <title>{{config('app.name', 'WorkoutDiary')}}</title>
    </head>
    <body>
        @include('includes.navbar')
        <div class="container">
            @include('messages/flash-message')
            @yield('content')
        </div>
        
        <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
        <script>
            /* global CKEDITOR */
            CKEDITOR.replace( 'article-ckeditor' );
        </script>
    </body>
</html>