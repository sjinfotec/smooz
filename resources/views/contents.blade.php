<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type=”text/javascript” src="{{ mix('js/app.js') }}" defer></script>
        <title>Contents Open</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Styles -->
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
        <div>
            <h3>オープニング</h3>
        </div>
        <div>
            コンテンツ作成
        </div>
        <div>
            <vue-base
            ></vue-base>
        </div>

        
    </body>
</html>
