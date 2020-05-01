<!DOCTYPE html>
<html>
  <head>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bubbly - Boootstrap 4 Admin template by Bootstrapious.com</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="http://localhost:8000/css/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Google fonts - Popppins for copy-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,800">
    <!-- orion icons-->
    <link rel="stylesheet" href="http://localhost:8000/css/orionicons.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="http://localhost:8000/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="http://localhost:8000/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="http://localhost:8000/img/favicon.png">

    <link href="http://localhost:8000/css/toastr.min.css" rel="stylesheet">

   <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css" rel="stylesheet">

    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <style type="text/css">
    
    .error
    {
      border:1px solid #f00;
    }

  </style>
  <body>
    <div class="page-holder d-flex align-items-center">
      <div class="container">
        <div class="row align-items-center py-5">
          <div class="col-5 col-lg-7 mx-auto mb-5 mb-lg-0">
            <div class="pr-lg-5"><img src="img/illustration.svg" alt="" class="img-fluid"></div>
          </div>

          @if($message = Session::get('error'))
          <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>{{ $message }}</strong>
          </div>
          @endif

          <div class="col-lg-5 px-lg-4">
            <h1 class="text-base text-primary text-uppercase mb-4">Bubbly Dashboard</h1>
            <h2 class="mb-4">Welcome back!</h2>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>

            @if(count($errors)>0)
            <div class="alter alert-danger">
              <ul>
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
              </ul>
            </div>
              @endif

              <div class="container">
                <!-- The Modal -->
                <div class="modal fade" id="myModal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    
                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">New User</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>


                      <!-- Modal body -->
                      <div class="modal-body">
                        <form action="/user_reg" class="newlog" id="reg" method="post">
                           {{  csrf_field() }}

                          <div class="form-group">
                            <label for="Name">Name:</label>
                            
                            <input type="text" class="form-control" name="name" id="name">
                          </div>
                          <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="email" class="form-control" name="email" id="email">
                          </div>
                          <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" name="password" id="pwd">
                          </div>

                          <div class="form-group">
                            <label for="pwd">Con Password:</label>
                            <input type="password" class="form-control" name="cpass" id="cpwd">
                          </div>
                          
                          <input type="submit" name="submit" class="btn btn-success" value="submit">
                        </form>
                      </div>
                      
                      
                    </div>
                  </div>
                </div>
                
              </div>


<!-- Forgot password -->

<div class="container">
                <!-- The Modal -->
                <div class="modal fade" id="myModalF">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    
                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Forgot Password</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>


                      <!-- Modal body -->
                      <div class="modal-body">
                        <form action="forgot" class="forgt" id="fort" method="post">
                           {{  csrf_field() }}

                          <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="email" class="form-control" name="email" id="email">
                          </div>
                           
                          <input type="submit" name="submit" class="btn btn-success" value="submit">
                        </form>
                      </div>
                      
                      
                    </div>
                  </div>
                </div>
                
              </div>






 

            <form id="loginForm" action="login"  method="post" class="mt-4">
              {{csrf_field()}}
              <div class="form-group mb-4">
                <input type="text" name="username" placeholder="Username or Email address" class="form-control border-0 shadow form-control-lg"  value="@if(!empty(Cookie::get('username'))) {{ Cookie::get('username')}} @endif">
              </div>
              <div class="form-group mb-4">
                <input type="password" name="passowrd" placeholder="Password" class="form-control border-0 shadow form-control-lg text-violet" value="@if(!empty(Cookie::get('passowrd'))) {{ Cookie::get('passowrd')}} @endif">
              </div>
              <div class="form-group mb-4">
                <div class="custom-control custom-checkbox">
                  <input id="customCheck1" type="checkbox"  class="custom-control-input" name="remember_me" @if(!empty(Cookie::get("username")))  {{"checked='checked'"}}  @endif>
                  <label for="customCheck1" class="custom-control-label">Remember Me</label>

                   <a href="{{action('crudcontrl@user_reg')}}" class="form-label float-right text-secondary" data-toggle="modal" data-target="#myModal">Create login</a>
                </div>  
                 <a href="{{action('crudcontrl@forgot')}}" class="form-label float-right text-secondary" data-toggle="modal" data-target="#myModalF">Forgot Password</a>
              </div>
              <button type="submit" class="btn btn-primary shadow px-5">Log in</button>
            </form>
          </div>
        </div>
        <p class="mt-5 mb-0 text-gray-400 text-center">Design by <a href="https://bootstrapious.com/admin-templates" class="external text-gray-400">Bootstrapious</a> & Your company</p>
        <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)                 -->
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="http://localhost:8000/css/vendor/jquery/jquery.min.js"></script>
    <script src="http://localhost:8000/css/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="http://localhost:8000/css/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="http://localhost:8000/css/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="http://localhost:8000/css/vendor/chart.js/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <script src="http://localhost:8000/js/front.js"></script>

    <script type="text/javascript" src="http://localhost:8000/js/toastr.min.js"></script>
    <script src="http://demo.expertphp.in/js/jquery.validate.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
      <script type="text/javascript">
      
     @if(Session::has('messages'))
    var type="{{Session::get('alert-type','info')}}"

  
    switch(type){
      case 'info':
             toastr.info("{{ Session::get('messages') }}");
             break;
          case 'success':
              toastr.success("{{ Session::get('messages') }}");
              break;
          case 'warning':
              toastr.warning("{{ Session::get('messages') }}");
              break;
          case 'error':
            toastr.error("{{ Session::get('messages') }}");
            break;
    }
  @endif


$(document).ready(function ()
{

  $('#reg').submit(function (e)
  {
    e.preventDefault();

    var name = $('#name').val();
    var email = $('#email').val();
    var pwd = $('#pwd').val();
    var cpwd = $('#cpwd').val();

    

   
    $.ajax({

        type:"post",
        url:"/user_reg",
        data: $('form.newlog').serialize(),
        success: function(msg){
         // alert(msg);
        if(msg == "success")
        {
        swal("Registered!","Done!","success");
        $('#myModal').modal('hide');
        window.location.href='/';

        }
        else
        {
          swal("Not Done!","Failed!","danger");
        }

          //window.location.href='tariff';

        },

        error: function(){

         // alert("failure");

        }

    });


  });

  $('.newlog').validate({

     rules: {
            email: {
                required: true,
                email: true
            },
            name: {
                required: true,
               
            },
            password: { 
                 required: true,
                    minlength: 6,
                    maxlength: 10,

               } , 
               cpass:
               {
                  required: true,
                  equalTo:'#pwd',
                  minlength: 6,
                  maxlength: 10,

               }

        },

        messages:{
         password: { 
                 required:"the password is required"

               }
     }

  })

});

    </script>


  </body>
</html>