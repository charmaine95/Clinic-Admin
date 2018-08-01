@extends('layouts.master')
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>iPaQue | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">
 
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

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
@section('content')
<div class="row col-lg-12" style="margin-top:70px;">
<body class="hold-transition register-page">
<div class="register-box">

  <div class="register-box-body">
    <p class="login-box-msg"><center><h4>Register and Get Started!</h4></center></p><br>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form id="addUser" action="{{ url('/register') }}" method="post">
        {{ csrf_field() }}
      <div class="form-group has-feedback">
        <input type="text" class="form-control" id="clinic_name" name="clinic_name" placeholder="Clinic Name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="number" class="form-control" name="contact_no" id="contact_no" placeholder="Contact No.">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="username" id="username" placeholder="Username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password_confirmation" placeholder="Retype password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <textarea type="text" class="form-control" name="address" id="address" placeholder="Address"></textarea>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      
      <div class="row">
        <div class="col-xs-8">
        <a href="{{ url('/login') }}" class="text-center">I already have an account!</a>
         <!--  <div class="checkbox icheck">
            <label>
              <input type="checkbox"> I agree to the <a href="#">terms</a>
            </label>
          </div> -->
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" id="submitUser" onclick="save_user();">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>

//FireBase
<script>
var tblUsers = document.getElementById('tbl_users_list');
  var databaseRef = firebase.database().ref('clinics/');
  var rowIndex = 1;
  
  databaseRef.once('value', function(snapshot) {
    snapshot.forEach(function(childSnapshot) {
   var childKey = childSnapshot.key;
   var childData = childSnapshot.val();
   
   var row = tblUsers.insertRow(rowIndex);
   var cellId = row.insertCell(0);
   var cellName = row.insertCell(1);
   cellId.appendChild(document.createTextNode(childKey));
   cellName.appendChild(document.createTextNode(childData.clinic_name));
   
   rowIndex = rowIndex + 1;
    });
  });
   
  function save_user(){
   var clinic_name = document.getElementById('clinic_name').value;
   var contact_no = document.getElementById('contact_no').value;
   var username = document.getElementById('username').value;
   var email = document.getElementById('email').value;
   var password = document.getElementById('password').value;
   var address = document.getElementById('address').value;
   var uid = firebase.database().ref().child('clinics').push().key;
   
   var data = {
    clinic_name: clinic_name,
    contact_no: contact_no,
    username: username,
    email: email,
    password: password,
    address: address
   }
   
   var updates = {};
   updates['/clinics/' + uid] = data;
   firebase.database().ref().update(updates);
   
   alert('The user is created successfully!');
   reload_page();
  }
   


</script>

</body>
@endsection
