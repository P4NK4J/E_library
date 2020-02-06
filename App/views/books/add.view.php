<?php

$column = array('id','name');
$categories = $app['categories']->categoryList('categories', $column);

?>
<!DOCTYPE html>
<html lang="en">

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
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

</head>

<body style='padding-top: 0px; padding-bottom: 120px'>

    <?php require "views/users/navbar.admin.view.php"; ?>
    <div class="container" style="padding-top: 20px;">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <div id="first">
                    <div class="myform form ">
                        <div class="logo mb-3">
                            <div class="col-md-12 text-center">
                                <h2>Enter Details</h2>
                            </div>
                        </div>
                        <form action="" method="post"  enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Name</label>
                                <span style="color:red">*</span>
                                <input type="text" required name="bookname" class="form-control" id="bookname" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Author</label>
                                <span style="color:red">*</span>
                                <input type="text" required name="author" id="author" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Edition</label>
                                <span style="color:red">*</span>
                                <input type="text" required name="edition" id="edition" class="form-control" placeholder="">
                            </div>
                            <div class="form-group" >Book Categories:<span style="color:red">*</span>
                                <div class="input-group" style="margin-top: 15px;">
                                
                                <?php $i = 1;?>
                                     <?php foreach ($categories as $key) :
                                
                                      ?>
                                        <label for="<?php $key['id'] ?>" class="mr-3">
                                            <input type="checkbox" class="mr-1" value=<?php echo $key['id']?> name=<?php echo $i?>>
                                             <?php echo ($key['name']); 
                                             $i++; ?>
                                        </label>
                                    <?php endforeach;?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Book Cover Image </label>
                                <span style="color:red">*</span>
                                <input type="file" required value="Upload Image" name="cover_image" id="cover_image" class="form-control" placeholder="" style="padding-bottom: 35px;">
                            </div>

                            <div class="col-md-12 text-center ">
                                <button type="submit" name="add" class=" btn btn-block mybtn btn-primary tx-tfm">Done</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>




</body>

</html>