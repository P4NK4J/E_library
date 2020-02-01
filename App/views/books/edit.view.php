<?php

session_start();

if ($_SESSION['user_type'] != 'admin') {
    header("location:/");
}?>

<!DOCTYPE html <html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Book</title>
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
                                <h1>Enter Details</h1>
                            </div>
                        </div>
                        <form action="" method="post" name="login">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" required name="bookname" class="form-control" id="bookname" placeholder="Please Enter Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Author</label>
                                <input type="text" required name="author" id="author" class="form-control" placeholder="Please Enter Author">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Edition</label>
                                <input type="text" name="edition" id="edition" class="form-control" placeholder="Please Enter Edition">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Upload Book Image</label>
                                <input type="file" required="" name="cover_image" id="cover_image" class="form-control" placeholder="" style="padding-bottom: 35px;">
                            </div>

                            <div class="col-md-12 text-center ">
                                <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm" name="add">Done</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>




</body>

</html>