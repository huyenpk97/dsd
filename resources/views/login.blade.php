 
 <?php 

  // if(isset($_GET['submit'])){


  //  $user_email = $_GET['email'];
  // $user_email=filter_var($user_email, FILTER_SANITIZE_EMAIL);
  //  $password = $_GET['password'];
// 
  //  if(!empty($user_email) && !empty($password) ){

    // $url = 'https://api-ptpmpt-18.herokuapp.com/api/auth/login';
    // $data = array("username"=>$user_email,
      // "password"=>$password,
    //  );

      // use key 'http' even if you send the request to https://...
    // $options = array(
    //   'http' => array(
    //     'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
    //     'method'  => 'POST',
    //     'content' => http_build_query($data)
    //   )
    // );
    // $context  = stream_context_create($options);
    // var_dump($context);
    // $result = file_get_contents($url, false, $context);
   // $result = json_decode($result);
  
//     if (strpos($result, "error")) { $msg = "INvalid password or username"; }
//     else{
//         $msg = "Đúng";
//          // return view('list_project');
//          $link = route('list_project');

//         dd(header('Location: ' . route('list_project')));
//         // Route::get('list_project');
//     }
//   }
//   else{
//     $msg = "Fields cannot be empty";
//   }
// }

?> 
<!-- <?php  ?> -->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DSD 03| Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <script>
    // var token = localStorage.getItem('token');

    // if(token !== null){
    //     window.location.href = '/thongke_KPI';
    // }
  </script>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">

      <a href="login_pro.php"><b>Recurrent Task Service  Data Service</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">
      </p>
      <p class="login-box-msg"></p>
      <form ction="{{ route('login.login')}}" method="POST" id="form-login">
      @csrf
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Email" name="username" id="username">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" name="password" id="password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">

            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <input type="submit" class="btn btn-primary btn-block btn-flat" name="submit" value="Sign In">
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery 3 -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <script>
      // $('document').ready(function() {
      //   $('#form-login').on('submit', function(e) {
      //     e.preventDefault();
      //     var username = $('#username').val();
      //     var password = $('#password').val();
      //     $.ajax({
      //       url: 'https://api-ptpmpt-18.herokuapp.com/api/auth/login',
      //       type: 'POST',
      //       data: {
      //         username: username,
      //         password: password,
      //       },
      //       success: function(response) {
      //         if (!response.error) {
      //           localStorage.setItem('token', response.token);
      //           localStorage.setItem('user', JSON.stringify(response.user));
      //           window.location.href = '/thongke_KPI';
      //         }
      //       }
      //     })
      //   })
      // })
    </script>

</body>

</html>