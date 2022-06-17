<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>403</title>
    @include("website.layout.include.css")

    <link rel="shortcut icon" href="{{asset("images/favicon.png")}}" type="image/x-icon">
</head>

<body>


<div class="overlayer" id="overlayer">
    <div class="loader">
        <div class="loader-inner"></div>
    </div>
</div>
<!--============= Error Section Starts Here =============-->
<div class="error-section padding-top padding-bottom bg_img" data-background="./assets/images/error-bg.png">
    <div class="container">
        <div class="error-wrapper">
            <div class="error-thumb">
                <img src="{{asset_website("images/contact.png")}}" alt="error">
            </div>
            <p>{{isset($message) ? $message : "forbidden"}}</p>
            <h4 class="title">Return to the <a href="{{route('website.main')}}">homepage</a></h4>
        </div>
    </div>
</div>
<!--============= Error Section Ends Here =============-->


@include("website.layout.include.js")
</body>

</html>

