<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
            .login_box{
                height:305px;
                width:500px;
                /* background:gray; */
                margin-top:calc((100vh - 310px) / 2 );
            }
            .login_header{
                height:60px;
                background:#1766e8;
                padding-top:10px;
            }
            .login_header_text{
                color:white;
            }
            .login_input{
                height:50px;
                width:98%;
                outline:none;
                border:none;
                margin-top:-20px;
                border-bottom:1px solid gray;
                background:none;
            }
            .login_body{
                padding-top:20px;
                text-align:left;
            }
            .login_input_label{
                margin-bottom:10px;
            }
            .login_button{
                width:300px;
                margin-top:15px;
                border-radius:10px;
                background:#0d7eff;
                border:none;
                color:white;
            }
            button:focus {
                border: none;
                outline: none;
                box-shadow:0px 0px 3px navy;
            }
        </style>
</head>
<body>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
