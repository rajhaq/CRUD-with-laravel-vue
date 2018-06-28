<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- font -->
        <link href="https://fonts.googleapis.com/css?family=Comfortaa|Righteous" rel="stylesheet">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Styles -->
        <!-- Material Design Bootstrap -->
        <link href="{{ asset('css/compiled.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">
        <!-- Your custom styles (optional) -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">

                    <section id="app"></section>
                </div>
            </div>
        </div>

        
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>