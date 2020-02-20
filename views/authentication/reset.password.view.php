<!DOCTYPE html>
<html lang="en">
   <?php
    session_start();
//    if (isset($_GET['time'])) {
//        $time = $_GET['time'];
//        $curr_time = time();
//        $res = $curr_time - $time;
//        var_dump($res);
//        if ($res > 81600) {
//             header('location:/timeout');
//        }
   
       $hash = $_GET['hash'];
       $email = $_GET['id'];
      
   
       $_SESSION["hash"] = $hash;
       $_SESSION["id"] = $email;
//     else {
//        $hash = $_SESSION["hash"];
//        $email = $_SESSION["id"];
//    }?>

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Reset password</title>
   <link rel="stylesheet" href="Resources/CSS/Registration.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
   <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
   <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

</head>

<body class="my-0 py-0" style="background-image:url(Resources/Images/background_color.jpg); background-size:cover; ">
   <div class="container-fluid my-0 py-5 min-vh-100" style="background-color:rgb(20,20,20,0.6);">
      <div class="container-fluid px-md-5 mt-3 mb-3">
         <div class="row mx-lg-4  mx-auto px-auto">
            <div class="col-sm-12 col-md-4 col-lg-4 mt-5 pt-5 offset-lg-2 col-xl-4 offset-xl-2 text-lg-center text-md-center text-xl-center mb-5 mt-2">
               <h2 class="display-4 font-weight-bold text-white " style="font-family: 'Open Sans', sans-serif;">Resey password here</h2>
               
            </div>
            <div class="offset-lg-0  offset-xl-0 offset-sm-1 col-md-6 col-lg-4 col-xl-4">
               <div id="first">
                  <div class="myform form mt-4" style="background-color: rgb(20,20,20,0.8);">

               <form action="reset" name="registration" method="post" class="text-white px-4" >
                  
                
                     <label for="exampleInputEmail1 ">Password</label>
                     <span style="color:red">*</span></label>
                     <input type="password" name="password" class="form-control" id="password" aria-describedby="emailHelp" placeholder="">

                  
                  <div class="form-group mt-4">
                     <label for="exampleInputEmail1">Confirm Password</label>
                     <span style="color:red">*</span></label>
                     <input type="password" name="re_password" class="form-control" id="re_password" aria-describedby="emailHelp" placeholder="">


                  </div>
                  <div class="col-md-14 text-center mb-3 mt-5">
                     <button type="submit" name="resetpass" id="submit"  class=" btn btn-block mybtn btn-primary tx-tfm">Done</button>

                     <div style="color: red; margin-top: 10px;" id="error_pass"></div>

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
                  

            </div>
            </form>
            </div>
         </div>
      </div>
   </div>
   </div>


   <script src="Resources\JS\authentication.js"></script>

</body>

</html>