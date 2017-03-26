<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
{{--<link href="{{url('css/font-awesome.css')}}" rel="stylesheet" type="text/css">--}}

<!-- Styles -->
    {{--<link rel="stylesheet" href="{{url('css/bootstrap.css')}}">--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{url('css/app.css')}}">

    {{--<style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }
    </style>--}}
</head>
<body>
@include('partials.navbar')
<div class="container-fluid">
    @yield('content')
    @include('partials.footer')
</div>
<!-- Scripts -->
<script src="{{url('js/jquery.js')}}"></script>
<script src="{{url('js/bootstrap.js')}}"></script>
@yield('script')
</body>
</html>
