<?php  ?>
<!DOCTYPE html <html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Login</title>
   <link rel="stylesheet" href="Resources/CSS/Registration.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<body>
   <div class="container">
      <div class="row">
         <div class="col-md-5 mx-auto">
            <div id="first">
               <div class="myform form ">
                  <div class="logo mb-3">
                     <div class="col-md-12 text-center">
                        <h1>Login</h1>
                     </div>
                  </div>
                  <form action="" method="post" name="login">
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
                     <div class="col-md-12 text-center ">
                        <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm" name="login">Explore..!!</button>
                     </div>
                     <div class="col-md-12 ">
                        <div class="login-or">
                           <hr class="hr-or">
                           <span class="span-or">or</span>
                        </div>
                     </div>
                     <div class="col-md-12 mb-3">
                        <p class="text-center">
                           <a href="<?= $loginUrl ?>" class="google btn mybtn">
                              <i class="fa fa-google-plus">
                              </i> Login using Google
                           </a>
                        </p>
                     </div>
                     <div class="form-group">
                        <p class="text-center">Don't have account? <a href="signup">Sign up here</a></p>
                     </div>
                  </form>
               </div>
            </div>

         </div>
      </div>


      <script src="Resources\JS\authentication.js"></script>

</body>

</html>