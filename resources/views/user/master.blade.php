<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.web3canvas.com/themeforest/unisco/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 14 Apr 2019 05:51:37 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Home - Unisco - Education Website Template for University, College, School</title>

    <script src="/user/cdn-cgi/apps/head/-mEFVS8y7qx5pVzWHQTCQu5gnVM.js"></script><link rel="stylesheet" href="/user/css/bootstrap.min.css">

    <link href="/user/fonts.googleapis.com/css530e.css?family=Lora:400,700" rel="stylesheet">

    <link rel="stylesheet" href="/user/css/font-awesome.min.css">

    <link rel="stylesheet" href="/user/css/simple-line-icons.css">

    <link rel="stylesheet" href="/user/css/slick.css">
    <link rel="stylesheet" href="/user/css/slick-theme.css">
    <link rel="stylesheet" href="/user/css/owl.carousel.min.css">

    <link href="/user/css/style.css" rel="stylesheet">
</head>
<body>

<div class="about_bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="index.html"><img src="images/responsive-logo.png" class="responsive-logo img-fluid" alt="responsive-logo"></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown">
                        <span class="icon-menu"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('about.show')}}">About<span class="sr-only"></span></a>
                            </li>
                            {{--<li class="nav-item">--}}
                                {{--<a class="nav-link" href="admission-form.html">Admissions</a>--}}
                            {{--</li>--}}
                            {{--<li class="nav-item">--}}
                                {{--<a class="nav-link" href="academics.html">Academics</a>--}}
                            {{--</li>--}}
                            <li class="nav-logo">
                                <a href="{{route('home')}}" class="navbar-brand"><img src="/uploads/{{$meta->logo}}" class="img-fluid" alt="logo"></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('contact')}}">Contact</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h1>{{$meta->title}}</h1>
            </div>
        </div>
    </div>
</div>

@section('content')
    @show


<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="foot-logo">
                    <a href="{{route('home')}}">
                        <img src="/uploads/{{$meta->logo}}" class="img-fluid" alt="footer_logo">
                    </a>
                    <p>2019 © copyright
                        <br> All rights reserved.</p>
                </div>
            </div>
            <div class="col-md-2">
                <div class="sitemap">
                    <h3>Navigation</h3>
                    <ul>
                        <li><a href="{{route('about.show')}}">About</a></li>
                        {{--<li><a href="admission-form.html">Admissions </a></li>--}}
                        {{--<li><a href="admission.html">Academics</a></li>--}}
                        {{--<li><a href="research.html">Research</a></li>--}}
                        <li><a href="{{route('contact')}}">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">


            </div>
            <div class="col-md-3">
                <div class="address">
                    <h3>Contact us</h3>
                    <p><span>Address: </span> {{$meta->address}}</p>
                    <p>Email : {{$meta->email}}
                        <br> Phone : {{$meta->phone}}</p>
                    <ul class="footer-social-icons">
                        <li><a href="#"><i class="fa fa-facebook fa-fb" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin fa-in" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter fa-tw" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>


<script data-cfasync="false" src="/user/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="/user/js/jquery.min.js"></script>
<script src="/user/js/tether.min.js"></script>
<script src="/user/js/bootstrap.min.js"></script>

<script src="/user/js/slick.min.js"></script>
<script src="/user/js/waypoints.min.js"></script>
<script src="/user/js/counterup.min.js"></script>
<script src="/user/js/instafeed.min.js"></script>
<script src="/user/js/owl.carousel.min.js"></script>
<script src="/user/js/validate.js"></script>
<script src="/user/js/tweetie.min.js"></script>

<script src="/user/js/subscribe.js"></script>

<script src="/user/js/script.js"></script>
</body>

<!-- Mirrored from demo.web3canvas.com/themeforest/unisco/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 14 Apr 2019 05:51:52 GMT -->
</html>
