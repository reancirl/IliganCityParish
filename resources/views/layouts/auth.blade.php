<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>DioceseOfIligan | Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="stack/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="stack/css/stack-interface.css" rel="stylesheet" type="text/css" media="all" />
        <link href="stack/css/theme.css" rel="stylesheet" type="text/css" media="all" />
        <link href="stack/css/custom.css" rel="stylesheet" type="text/css" media="all" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:200,300,400,400i,500,600,700" rel="stylesheet">
        <style type="text/css">
            .outline-1 {
                color: black;
                -webkit-text-stroke:2.1px #ffffff;
                font-weight: bolder;
                font-size: 3em;
            }
        </style>
    </head>
    <body data-smooth-scroll-offset="77">
        <div class="nav-container"> </div>
        <div class="main-container">
            <section class="height-100 imagebg text-center" data-overlay="4">
                <div class="background-image-holder"><img alt="background" src="beforeLogin/img/first-bg.jpg"></div>
                <div class="container pos-vertical-center">
                    <div class="row">
                        <div class="col-md-7 col-lg-5">
                            <h2 class="outline-1"><STRONG>L O G I N</STRONG></h2>
                            <p class="lead"></p>
                            @yield('content')
                            <!-- <span class="type--fine-print block">Dont have an account yet? <a href="page-accounts-create-1.html">Create account</a></span> -->
                            <span class="type--fine-print block">Forgot your username or password? <a href="{{ route('password.request') }}">Recover account</a></span> 
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <script src="stack/js/jquery-3.1.1.min.js"></script>
        <script src="stack/js/parallax.js"></script>
        <script src="stack/js/smooth-scroll.min.js"></script>
        <script src="stack/js/scripts.js"></script>

    </body>

</html>