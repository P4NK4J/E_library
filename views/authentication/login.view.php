<!DOCTYPE html <html lang="en">
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
}

$loginUrl = Login::gAuth(); ?>

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Login</title>
   <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

   <link rel="stylesheet" href="Resources/CSS/Registration.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
   <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
   <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
   <script src="Resources\JS\authentication.js"></script>

</head>

<body style="background-image:url(Resources/Images/background_color.jpg); background-size:cover; padding:0;padding-top: 40px;">
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
                        <h1 style="color: white;">Login</h1>
                     </div>
                  </div>
                  <form action="login" method="post" class="text-white px-4" name="login">
                     <div class="form-group">

                        <label for="exampleInputEmail1">Email address</label>
                        <span style="color:red">*</span></label>

                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="">

                     </div>
                     <div class="form-group">
                        <label for="passord">Password</label>
                        <span style="color:red">*</span></label>
                        <input type="password" name="password" id="password" class="form-control" aria-describedby="emailHelp" placeholder="">
                     </div>

                     <div class="form-group">
                        <p class="text-center"><a href="#" data-toggle="modal" data-target="#forgetmodal" style="color:white;">Forgot password ?</a></p>

                     </div>


                     <div class="col-md-14 text-center mt-4">
                        <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm" name="login">Explore..!!</button>
                     </div>
                     <div class="row mx-1 my-3">
                        <hr class="d-inline col" style="border-top: 1px solid white;">
                        <span class='col-2 text-center'>or</span>
                        <hr class="d-inline col  " style="border-top: 1px solid white;">
                     </div>
                     <div class="col-md-12 mb-3 ">
                        <p class="text-center ">
                           <style>
                              #hovaeracle:hover {
                                 background-color: rgba(255, 255, 255, 0.8);
                                 transition: 0.3s;
                              }
                           </style>
                           <div class="col-md-14 text-center mt-3">
                              <a href="<?= $loginUrl ?>" id='hovaeracle' class="Google btn btn-block mybtn btn-outline-light">
                                 <i class="fa fa-google-plus">
                                 </i>&nbsp;Gmail Login
                              </a>
                           </div>
                        </p>
                     </div>
                     <div class="form-group">
                        <p class="text-center">Don't have account? <a href="signup-form" style="color:rgb(66,199,255,1);padding-top:10px;">Sign up here</a></p>
                     </div>
                     <?php


                     if (isset($_SESSION["err"])) { ?>

                        <p style="color:red; text-align:center; margin-bottom:0px;">
                           <?php $err = $_SESSION["err"];
                           echo $err;
                           unset($_SESSION["err"]); ?>
                        </p>
                     <?php }
                     ?>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="modal fade" id="forgetmodal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel2" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content" style="background-color:rgba(21,32,43,1);">
            <div class="modal-header">
               <h5 class="modal-title" id="ModalLabel2" style="color:white;font-weight:bold;">Get reset password link</h5>

               <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <form action="forgot" method="post">
               <div class="modal-body">

                  <div class="form-group">
                     <label style="color:1d96e1;">Enter Email address</label>
                     <span style="color:red">*</span>
                     <input type="text" name="email" style="background-color:rgba(21,32,43,1); border-color:#1d96e1;color:white;" required name="catname" class="form-control" placeholder="">
                  </div>
               </div>
               <div class="modal-footer">

                  <button type="submit" class="btn btn-primary" name="reset">Submit</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</body>

</html>