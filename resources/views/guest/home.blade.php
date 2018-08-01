@extends('layouts.master')

@section('content')

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
 		<section class="section-padding">
    		<div class="container">
        		<div class="row col-lg-12" style="margin-top:70px;">
  					<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <center><img src="img/c1.jpg" alt="First Slide" style="width:50%;height:30%">
        <h3>Easy Breezy</h3>
		<h4><p class="subtitle">Don't wait.. Just chill!</p></h4></center>
      </div>

      <div class="item">
        <center><img src="img/c2.jpg" alt="Second Slide" style="width:60%;height:30%">
        <h3>Easy Breezy</h3>
		<h4><p class="subtitle">Save Time!</p></h4></center>
      </div>
    
      <div class="item">
        <center><img src="img/c3.jpg" alt="Third Slide" style="width:60%;height:30%">
        <h3>Easy Breezy</h3>
		<h4><p class="subtitle">okeehhh !!!!</p></h4></center>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>


        </div>
    </div>
</section>


<section class="section-padding">
      <div class="container">
        <div class="row">
          <div class="header-section text-center">
            <h2>Features</h2>
            <hr class="bottom-line">
          </div>
          <div class="feature-info">
            <div class="fea">
              <div class="col-md-4">
                <div class="heading pull-right">
                  <h4>IPAQUE</h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam diam sem, fermentum non dapibus quis, molestie quis massa. Cras et sollicitudin dolor. Phasellus varius lectus sed ligula ornare, quis cursus erat vulputate. Aliquam vulputate aliquam scelerisque. Donec sodales scelerisque pretium. Mauris leo ante, aliquam non ante id, sodales congue dolor. Nam placerat laoreet magna eget aliquet. Phasellus malesuada suscipit massa quis ornare. Etiam erat ligula, molestie in velit at, feugiat fermentum nisl. Sed tristique scelerisque sapien.</p>
                </div>
                <div class="fea-img pull-left">
                </div>
              </div>
            </div>
            <div class="fea">
              <div class="col-md-4">
                <div class="heading pull-right">
                  <h4>SERVICES</h4>
                  <p>
                  	<li>Queue</li>
                  	<li>Receive Text</li>
                  	<li>Search Clinic or Doctor</li>
                  	<li>Set Doctor's Appointment</li>
                  </p>
                </div>
                <div class="fea-img pull-left">
                </div>
              </div>
            </div>
        </div>
        </div>
      </div>
    </section>


@endsection
