<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ config('app.name') }}</title>

    @include("website.layout.include.css")

    @stack("css")

    @livewireStyles

    <link rel="shortcut icon" href="{{asset_website("images/gp-logo.png")}}" type="image/x-icon">
    <meta name="csrf-token" content="{{csrf_token()}}">
</head>

<body>
<!--============= ScrollToTop Section Starts Here =============-->
<div class="overlayer" id="overlayer">
    <div class="loader">
        <div class="loader-inner"></div>
    </div>
</div>
<a href="#0" class="scrollToTop">
    <i class="fas fa-angle-up"></i>
</a>
<div class="overlay"></div>
<!--============= ScrollToTop Section Ends Here =============-->


<!--============= Header Section Starts Here =============-->
@include('website.layout._header')
<!--============= Header Section Ends Here =============-->

@include("website.layout._watching-list")

@yield("content")

<!--============= Footer Section Starts Here =============-->
@include("website.layout._footer")
<!--============= Footer Section Ends Here =============-->


@include("website.layout.include.js")

@stack("js")

@livewireScripts

</body>

</html>
