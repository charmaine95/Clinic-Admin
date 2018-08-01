@extends('layouts.dashboard')

@section('title', 'Doctors')

@section('content')
<section class="content-header">
	<h1>
		Doctor
		<small>List</small>
	</h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Dashboard</li>
        <li class="active">Doctors</li>
    </ol>
	</section>
	<br>
    <!-- Main content -->
    <section class="content">
		<div class="box box-primary">
            <div class="box-header">
				<table id="example" class="display" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Image</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Gender</th>
							<th>Specialization</th>
						</tr>
					</thead>
					<tbody>
						@foreach($doctors as $doctor)
								<tr>
									<td>
										<img src="{{ asset('/images/' . $doctor['image'])}}" width="50" height="auto">
									</td>
									<td><a  href="{{ url('/dashboard/doctors/'. $doctor['id']) }}">{{ $doctor['first_name'] }}</a></td>
									<td>{{ $doctor['last_name'] }}</td>
									<td>{{ $doctor['gender'] }}</td>
									<td>{{ $doctor['specialization_id'] }}</td>
								</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<div class="box-footer">
            <a href="{{ url('dashboard/doctors/create') }}" type="submit" class="btn btn-primary pull-right">Register New Doctor</a>
        </div>
    </section>

    <!-- /.content -->
@endsection

@section('javascript')
	<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		});
	</script>
@stop