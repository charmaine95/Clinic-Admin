<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                You can reset your password by clicking the link below:
                <a href="{{ url('/reset?reset_token='. $token)}}">{{ url('/reset?reset_token='. $token)}}</a>
            </div>
        </div>
    </div>
</div>

