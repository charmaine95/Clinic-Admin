
    @extends('layouts.master')

    @section('content')

    <section class="section-padding">
    <div class="container">
        <div class="row col-lg-12" style="margin-top:70px;">
       
                <center>
                        <h2>Frequently Asked Questions</h2>
                        <hr class="bottom-line">
                </center>
        </div>
    </div>
    </section>

    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Is account registration required?</a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
                    <a href="{{ url('/register')}}">Account registration</a> at <strong>Cebu City Pound</strong> is only required if you will be adopting, impounding or get services from Cebu Pound.<br> 
                    This ensures a valid communication channel for those parties involved in any transactions. 
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">How to adopt a pet?</a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
                    1) Choose the cat or the dog, kitten or puppy, that would complement you and your home.<br><br>

                    2) Click the adopt button and there will be a prompt message telling you that you have to take an exam to evaluate and assessed you as a potential owner for your chosen pet. Cebu City Pound reserves the right to deny any adoption application once you are not qualified. Although all animals are given an exam prior to becoming available for adoption, Cebu City Pound cannot guarantee that these animals have not been exposed to an illness prior to coming to the Pound.<br><br>

                    3) If it seems you are a good fit for each other based on the answers you provided, the administrator will confirm that your request have been accepted and that is the time that you will go Cebu City Pound to get your chosen pet.<br>
                    <strong>NOTE: Cebu City Pound requires adopters to be at least 18 years of age</strong><br><br>

                    4) Pay adoption fee worth <strong>P150.00</strong> at Cebu City Pound Office.<br>
                    Adoption fee covers:<br>
                    * Rabies vaccine for an adopted pet<br>
                    * Spay and Neuter<br>
                    * Deworming<br>
                    * Cebu City Dog Collar
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">What is impounding?</a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
                    In the impounding category there are two types: <strong>Sheltered and Stray</strong><br>
                    <li>Sheltered animals when impounded the term to used is surrendered animal.<br>
                    Once an owner surrendered there pet to the Cebu Pound, the pet will be up for adoption, and if the owner would want to get back its pet they can no longer adopt the pet to retain its custody because once surrendered that just mean that you cant take care of your pet properly.</li><br>
                    <li>Stray animals these refers to animals who are wandering 10 meters away from their home or those animals with no home that are reported by the community. Stray animals will be under the care of the Cebu City Pound. </li>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Can I still get my pet back once reported as a stray?</a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
                    Yes, but you have to pay a fine of <strong>P550.00</strong>.<br>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Do I need to pay when surrendering a pet?</a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
                    Yes, you have to pay  a surrender fee worth <strong>P150.00</strong> and the owner must also bring along a contribution towards the feeding of their surrendered animal in the form of <strong>10kg of dog food</strong> for each dog surrendered and/or <strong>5kg of cat food</strong> for each cat surrendered.<br> 
                    If the owner is unable to catch or handle their dog, they should contact the Cebu City Pound (contact information provided below) who will arrange for the dog to be collected.<br>

                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">What are those services that you offer to a pet?</a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
                    1) <strong>Deworming</strong> - Mondays to Saturdays between 8AM-5PM.<br><br>
                    2) <strong>Mange Treatment</strong> - Mondays to Saturdays between 8AM-5PM.<br><br>
                    3) <strong>Basic Medical Consultation</strong> - this service is for pets registered with Cebu City Pound. This service is offered on Tuesdays, Thursdays and Fridays between 8AM-5PMwithout an appointment, or by appointment only on Mondays, Wednesdays, and Saturdays.<br><br>
                    4) <strong>Rabies Vaccinations</strong> - for cats and dogs over the age of 3months, Mondays to Saturdaysfrom 8AM-5PM. Rabies Vaccination are <strong>valid for one year</strong>.<br><br>
                    5) <strong>Spaying and Neutering for Cats and Dogs</strong><br>
                    <li><strong>Cats</strong> - Mondays and Wednesdays only from 8AM-2PM. Please note that cats must be over the age of 4 months, weigh more than 1kg and must already be dewormed and determined to be physically healthy prior to surgery.</li><br>
                    <li><strong>Dogs</strong> - Mondays and Fridays only from 8AM-2PM. Please note that dogs must be over the age of 3 months, weigh more than 1kg and must already be dewormed and determined to be physically healthy prior to surgery.</li><br>
                </div>
            </div>
        </div>
    </div> 

    @endsection
