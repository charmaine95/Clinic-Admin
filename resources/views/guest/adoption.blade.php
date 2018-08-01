@extends('layouts.master')

@section('content')
    <section class="section-padding">
    <div class="container">
        <div class="row col-lg-12" style="margin-top:40px;">
          
        	<div class="container">
        		<div class="row">
            @foreach($impoundings as $impounding)
            @if($impounding['is_accepted'] == 1 && !$impounding['adopt']['is_accepted'] == 1)
          			<div class="col-md-4 col-sm-6 padleft-right">
            			<figure class="imghvr-fold-up">
              				<img src="{{ asset('images/'. $impounding->pet->image )}}" class="img-responsive" width="100%" height="70%">
                				<figcaption>
                  				<center><h3>{{ $impounding->pet->name }}</h3></center>
                  				<p class="subtitle">
                  					Age: {{ $impounding->pet->age }}<br>
                  					Breed: {{ $impounding->pet->breed->name }}<br>
                  					Species: {{ $impounding->pet->type->name }}<br>
                  					Color: {{ $impounding->pet->color }}<br>
                  				</p>
              					</figcaption>
            			</figure>
            			<center><a href="{{ url('/login')}}" id="submit" class="form contact-form-button light-form-button oswald light">ADOPT</a></center>
          			</div>
                @endif
                @endforeach
          		</div>
          	</div>
            
        </div>
    </div>
    </section>
@endsection

@section('javascript')
	<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
	<script>
		$(document).ready(function() {
			$('#submit').click(function () {
				
			})
		});
	</script>
@stop