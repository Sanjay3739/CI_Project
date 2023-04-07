<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script>
        CKEDITOR.replace( 'summary-ckeditor' );
        </script>
    <link rel="stylesheet" href="{{asset('CSS/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('CSS/style.css')}}">
    <link rel="stylesheet" href={{ asset('css/landing_style.css') }}>
    <link rel="stylesheet" type="text/css" href="{{asset('css/skl.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/thum.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/storylisting.css')}}" />
    <title>@yield('title')</title>
    <script src="{{asset('JS/jquery.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<script>
    $(".alert").slideUp(2000);
</script>
    <title>Document</title>
</head>
<body>

    @include('include.header')
    @yield('content')
    @include('include.footer')
    @include('include.ContactUS')
    <script src="{{asset('JS/jquery.min.js')}}"></script>


</body>
@include('layouts.scripts')
</html>
