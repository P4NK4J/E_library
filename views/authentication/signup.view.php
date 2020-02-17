<!DOCTYPE html>
<html lang="en">
<?php

if (session_status() == PHP_SESSION_NONE) {
   session_start();
}

if (isset($_SESSION['loggedin']) == true) {
   if ($_SESSION['user_type'] == 'reader') {
      header("location:/reader");
   } else if ($_SESSION['user_type'] == 'admin') {
      header("location:/admin");
   }
} ?>

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Signup</title>
   <link rel="stylesheet" href="Resources/CSS/Registration.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
   <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
   <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

</head>


<body style="background-image:url(Resources/Images/background_color.jpg); background-size:cover; padding:0;padding-top: 33px;">
   <div class="container-fluid px-md-5">
      <div class="row mx-lg-3 mx-0 px-0">
         <div class="col text-center text-md-left mb-5 mt-2">
            <h2 class="display-4 font-weight-bold text-white " style="text-shadow:5px 5px 10px #000;font-family: 'Open Sans', sans-serif;">Welcome to E-Library</h2>
            <i>
               <h6 class="mt-4" style="color:#fff;font-weight:bolder;font-size:1.8em;font-family:Times New Roman;">&ldquo;Catalog of books to make your journey worth &rdquo;</h6>
            </i>
         </div>
         <div class="offset-lg-4 offset-sm-1 col-md-6 col-lg-4">
            <div id="first">
               <div class="myform form mt-4" style="background-color: rgb(20,20,20,0.5);">
                  <div class="logo mb-0 ">
                     <div class="col-md-12 text-center">
                        <h1 style="color: white;">Signup</h1>
                     </div>
                  </div>
                  <form action="signup" name="registration" method="post" class="text-white px-4">
                     <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <span style="color:red">*</span></label>
                        <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="">
                        <div style="color: red;" id="error_name"></div>
                        <script>
                           $("#name").blur(function() {
                              var name = $('#name').val();
                              if (name.length == 0) {
                                 $('#error_name').html('Name is required');
                              } else {
                                 $('#error_name').html("");
                                 return true;
                              }
                           });
                        </script>
                     </div>
                     <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <span style="color:red">*</span></label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="">
                     </div>
                     <div class="form-group">

                        <label for="exampleInputEmail1">Password</label>
                        <span style="color:red">*</span></label>
                        <input type="password" name="password" class="form-control" id="password" aria-describedby="emailHelp" placeholder="">

                     </div>
                     <div class="form-group">
                        <label for="exampleInputEmail1">Confirm Password</label>
                        <span style="color:red">*</span></label>
                        <input type="password" name="re_password" class="form-control" id="re_password" aria-describedby="emailHelp" placeholder="">


                     </div>
                     <div class="col-md-14 text-center mb-3 mt-4">
                        <button type="submit" name="signup" id="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Get started</button>

                        <div style="color: red; margin-top: 10px;" id="error_pass"></div>
                        <?php
                        if (isset($_SESSION["err"])) { ?>
                           <p style="color:red; margin-bottom:0px;">
                              <?php $err = $_SESSION["err"];
                              echo $err;
                              unset($_SESSION["err"]); ?>
                           </p>
                        <?php }
                        ?>

                        <script>
                           $(document).ready(function() {
                              $('#submit').click(function(event) {

                                 data = $('#password').val();
                                 var len = data.length;


                                 if ($('#password').val() != $('#re_password').val()) {
                                    $('#error_pass').html("Password and Confirm Password don't match");
                                    // Prevent form submission
                                    event.preventDefault();
                                 }

                              });
                           });
                        </script>
                     </div>
                     <div class="form-group mb-4">
                        <p class="text-center">Already have an account? <a href="/" style="color:rgb(66,199,255,1);">Login</a></p>
                     </div>

               </div>

               </form>
            </div>
         </div>
      </div>
   </div>


   <script src="Resources\JS\authentication.js"></script>

</body>

</html>