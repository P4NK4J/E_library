<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Signup</title>
    <link rel = "stylesheet" href = "Resources\CSS\Registration.css">
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
			
			      <div class="myform form ">
                        <div class="logo mb-3">
                           <div class="col-md-12 text-center">
                              <h1 >Signup</h1>
                           </div>
                        </div>
                        <form action="" name="registration" method="post">
                           <div class="form-group">
                              <label for="exampleInputEmail1">Name</label>
                              <input type="text" required  name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Email address</label>
                              <input type="email" required name="email"  class="form-control" id="email" aria-describedby="emailHelp" placeholder="">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Password</label>
                              <input type="password" required name="password"  class="form-control" id="password" aria-describedby="emailHelp" placeholder="">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Re-enter Password</label>
                              <input type="password" required name="re_password"  class="form-control" id="re_password" aria-describedby="emailHelp" placeholder="">
                           </div>
                           <div class="col-md-12 text-center mb-3">
                              <button type="submit"  name="signup" class=" btn btn-block mybtn btn-primary tx-tfm">Get started</button>
                           </div>
        
                            </div>
                        </form>
                     </div>
			</div> 
		</div>
      </div>   


<script src = "Resources\JS\authentication.js"></script>

</body>

</html>