<!DOCTYPE html>
<html lang="{{LaravelLocalization::getCurrentLocale()}}" dir="{{LaravelLocalization::getCurrentLocaleDirection()}}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="css/icons.css">
    @if (LaravelLocalization::getCurrentLocale() == 'en')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    @else
    <link rel="stylesheet" href="{{asset('css/app-rtl.css')}}">
    @endif

    <title>Sell Your Dress</title>
</head>
<body>
@include('app.partials.header')

@yield('content')

@include('app.partials.footer')
</body>
</html>
