@extends('layouts.dashboard')

@section('title', 'Pets')

@section('content')
<section class="content-header">
    <h1>
        Pet
        <small>Edit</small>
	</h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Dashboard</li>
        <li class="active">Doctor</li>
    </ol>
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
    <div class="alert alert-danger">
        {{ session()->get('message') }}
    </div>
    @endif
    <!-- Main content -->
    <section class="content">
        <!-- general form elements -->
        <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ url('dashboard/doctors/update/'. $doctor['id']) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="box-body ">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleInputEmail1">First Name</label>
                            <input id="first_name" type="text" name="first_name" class="form-control" value="{{ $doctor['first_name'] }}">
                            </div>
                            <div class="form-group">
                            <label for="exampleInputEmail1">Last Name</label>
                            <input type="text" id="last_name" name="last_name" class="form-control" value="{{ $doctor['last_name'] }}">
                            </div>
                            <div class="form-group">
                            <label>Gender</label>
                            <select class="form-control" id="gender" name="gender">
                                <option value="Male" {{$doctor['gender'] == 'Male'}} ?? 'selected' : ''>Male</option>
                                <option value="Female" {{$doctor['gender'] == 'Female'}} ?? 'selected' : ''>Female</option>
                            </select>
                            </div>
                            <div class="form-group">
                            <label>Specialization</label>
                            <input type="hidden" id="specialization_id" name="specialization_id" value="{{ $doctor['specialization_id'] }}">
                            <select class="form-control" name="specialization_id">
                                @foreach($specializations as $specialization)
                                <option value="{{$specialization['specialization']}}" {{$doctor['specialization_id'] == $specialization['id']}} ?? 'selected' : ''>{{$specialization['specialization']}}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">
                                    <img src="{{ asset('/images/'. $doctor['image'])}}" width="200">
                                </label>
                                <input type="file" name="image" value="{{ $doctor['image']}}">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button onclick="update_doctor();" type="submit" class="btn btn-primary pull-right">Submit</button>
                </div>
            </form>
        </div>
    </section>
    <!-- /.content -->
@endsection

@section('javascript')
	<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="https://www.gstatic.com/firebasejs/5.3.0/firebase.js"></script>
 
 <script>
   // Initialize Firebase
   var config = {
  apiKey: "AIzaSyBBfDsoY559sF5ls6uWDwSoV2UrsWW29ZM",
  authDomain: "ipaque-bfd9b.firebaseapp.com",
  databaseURL: "https://ipaque-bfd9b.firebaseio.com",
  projectId: "ipaque-bfd9b",
  storageBucket: "ipaque-bfd9b.appspot.com",
  messagingSenderId: "906681868064"
   };

   firebase.initializeApp(config);


var tblUsers = document.getElementById('tbl_users_list');
  var databaseRef = firebase.database().ref('doctors/');
  var rowIndex = 1;
  
  databaseRef.once('value', function(snapshot) {
    snapshot.forEach(function(childSnapshot) {
   var childKey = childSnapshot.key;
   var childData = childSnapshot.val();
   
   var row = tblUsers.insertRow(rowIndex);
   var cellId = row.insertCell(0);
   var cellName = row.insertCell(1);
   cellId.appendChild(document.createTextNode(childKey));
   cellName.appendChild(document.createTextNode(childData.first_name));
   
   rowIndex = rowIndex + 1;
    });
  });

function update_doctor(){
   var first_name = document.getElementById('first_name').value;
   var last_name = document.getElementById('last_name').value;
   var gender = document.getElementById('gender').value;
   var specialization_id = document.getElementById('specialization_id').value;
   var uid = firebase.database().ref().child('doctors').push().key;

   var data = {
    first_name: first_name,
    last_name: last_name,
    gender: gender,
    specialization_id: specialization_id
   }
   
   var updates = {};
   updates['/doctors/' + uid] = data;
   firebase.database().ref().update(updates);
   
   alert('The user is updated successfully!');
   
   reload_page();
  }
</script>
@stop