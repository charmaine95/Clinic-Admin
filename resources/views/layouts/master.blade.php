<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iPaQue|WELCOME</title>
    <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
    
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/imagehover.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
    <!--Navigation bar-->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
        <a class="nav navbar-nav navbar-left" href="/"><img src="img/logo2.png" width="120px" height="100px"></a>
        </div>

        

        @if(Auth::user(0))
        <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="{{ url('/about')}}">About Us</a></li>
          <li><a href="{{ url('/contact')}}">Contact Us</a></li>
          <li><a href="{{ url('/FAQs')}}">FAQs</a></li>
          <li><a href="{{ url('/dashboard')}}">Hello {{ Auth::user()->first_name}}</a></li>
        </ul>
        </div>
        @else
        <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="{{ url('/about')}}">About Us</a></li>
          <li><a href="{{ url('/login')}}">Sign in</a></li>
          <li class="btn-trial"><a href="{{ url('/register')}}">Register</a></li>
        </ul>
        </div>
        @endif
      </div>
    </nav>
  </body>

    @yield('content')

    <!--Footer-->
    <footer id="footer" class="footer">
      <div class="container text-center">
    
      <ul class="social-links">
        <li><a href="#link"><i class="fa fa-twitter fa-fw"></i></a></li>
        <li><a href="www.facebook.com"><i class="fa fa-facebook fa-fw"></i></a></li>
        <li><a href="#link"><i class="fa fa-google-plus fa-fw"></i></a></li>
        <li><a href="#link"><i class="fa fa-dribbble fa-fw"></i></a></li>
        <li><a href="#link"><i class="fa fa-linkedin fa-fw"></i></a></li>
      </ul>
        ©2018 iPaQue. All rights reserved
     
    </footer>
    <!--/ Footer-->
    
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="contactform/contactform.js"></script>
    
   </div>
</html>