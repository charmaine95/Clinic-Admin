@extends('layouts.dashboard')

@section('title', 'Pets')

@section('content')
<section class="content-header">
    <h1>
        Profile
        <small>Update</small>
	</h1>
    @if(Auth::user()->is_admin)
    <ol class="breadcrumb">
        <li>Dashboard</li>
        <li class="active">Pets</li>
    </ol>
    @else
    <ol class="breadcrumb">
        <li><a href="{{ url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Dashboard</li>
        <li class="active">Profile</li>
    </ol>
    @endif
    </section>	
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
    <!-- Main content -->
    <section class="content">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Profile Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form  action="{{ url('dashboard/profile/update/'. $user->id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="box-body ">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleInputEmail1">First Name</label>
                            <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}">
                            </div>
                            <div class="form-group">
                            <label for="exampleInputPassword1">Last Name</label>
                            <input type="text" name="last_name"class="form-control" value="{{ $user->last_name }}">
                            </div>
                            <div class="form-group">
                            <label for="exampleInputPassword1">Username</label>
                            <input type="text" name="username"class="form-control" value="{{ $user->username }}">
                            </div>
                            <div class="form-group">
                            <label for="exampleInputPassword1">Address</label>


                            <textarea name="address" id="" cols="10" rows="10" class="form-control" value="{{ $user->address }}">{{ $user->address }}</textarea>
                            </div>
                            <div class="form-group">
                            <label for="exampleInputPassword1">Contact No.</label>
                            <input type="number" name="contact_no"class="form-control" value="{{ $user->contact_no }}">
                            </div>
                            <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="email" name="email"class="form-control" value="{{ $user->email }}">
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                </div>
            </form>
        </div>
    </section>
    <!-- /.content -->
@endsection

@section('javascript')
	<!-- <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		});
	</script> -->
@stop