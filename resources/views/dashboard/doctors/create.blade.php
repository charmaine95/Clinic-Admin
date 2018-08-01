@extends('layouts.dashboard')

@section('title', 'Doctors')

@section('content')
<section class="content-header">
    <h1>
        Pet
        <small>Registration</small>
	</h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Dashboard</li>
        <li class="active">Doctors</li>
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
            <div class="box-header with-border">
                <h3 class="box-title">Pet Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form  action="{{ url('dashboard/doctors/create') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="box-body ">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleInputEmail1">First Name</label>
                            <input type="text" id="first_name" name="first_name" class="form-control" required>
                            </div>
                            <div class="form-group">
                            <label for="exampleInputEmail1">Last Name</label>
                            <input type="text" id="last_name" name="last_name" class="form-control" required>
                            </div>
                            <div class="form-group">
                            <label>Gender</label>
                            <select class="form-control" id="gender" name="gender" required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Specialization</label>
                            <select class="form-control" name="specialization_id" id="specialization_id" required>
                                @foreach($specializations as $specialization)
                                <option value="{{$specialization->specialization}}">{{$specialization->specialization}}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="form-group">
                            <label for="exampleInputFile">Doctor Image</label>
                            <input type="file" name="image" required>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right" onclick="save_doctor();">Submit</button>
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
 </script>

//FireBase
<script>
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
   
  function save_doctor(){
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
   
//    alert('The user is created successfully!');
   reload_page();
  }
   


</script>


@stop