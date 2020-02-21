<?php
if (session_status() == PHP_SESSION_NONE)
    session_start();

if ($_SESSION['user_type'] != 'admin')
    header("location:/");

$column = array('id', 'name');
$categories = $app['categories']->categoryList('categories', $column);
$bid = $_GET['bid'];
$book = $app['database_book']->selectBook($_GET['bid']);

$book->execute();
$book = $book->fetch(PDO::FETCH_ASSOC);

$category = $app['database_book']->fetchCat($_GET['bid']);
$category->execute();
$ch = $category->fetchAll(PDO::FETCH_ASSOC);
$cats = [];
foreach ($ch as $key) {
    array_push($cats, $key['category_id']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Book</title>
    <link rel="stylesheet" href="Resources/CSS/Registration.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

</head>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<body style="padding-top:0px;padding-bottom: 120px ;background-color:rgba(101,157,189,0.4);">

    <?php require "views/users/navbar.admin.view.php"; ?>



    <div class="container mt-5 pt-5">
        <div class="row">

            <img class="mx-auto my-auto" id="blah" src="<?php echo "Resources/Images/" . $book["cover_image"]; ?>" alt="IMG" style="width:380px; height:480px;">


            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-5 mx-auto">
                <div id="first">



                    <div class="myform my-3 my-sm-5 my-md-5 my-lg-0 form text-white offset-sm-0 offset-md-0 offset-lg-1 offset-xl-1" style="background-color: rgba(21,32,43,1);">


                        <div class="logo mb-3">
                            <div class="col-md-12 text-center">
                                <h2>Edit Details</h2>
                            </div>
                        </div>
                        <form action="edit" method="post" class="ml-3 mr-3" enctype="multipart/form-data">
                            <div class="form-group">
                                <label style="color:#1d96e1;">Name</label>
                                <span style="color:red">*</span>
                                <input type="text" style="background-color:rgba(21,32,43,1);color:white;border-color:#1d96e1;" value="<?php echo $book["name"]; ?>" name="bookname" class="form-control" id="bookname" placeholder="">
                            </div>
                            <div class="form-group">
                                <label style="color:#1d96e1;">Author</label>
                                <span style="color:red">*</span>
                                <input type="text" style="background-color:rgba(21,32,43,1);color:white;border-color:#1d96e1;" value="<?php echo $book["author"]; ?>" name="author" id="author" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label style="color:#1d96e1;">Edition</label>
                                <span style="color:red">*</span>
                                <input type="text" style="background-color:rgba(21,32,43,1);color:white;border-color:#1d96e1;" value="<?php echo $book["edition"]; ?>" name="edition" id="edition" class="form-control" placeholder="">
                            </div>
                            <div class="form-group"><span style="color:#1d96e1;">Book Categories:</span><span style="color:red">*</span>
                                <div class="input-group" style="margin-top: 15px;">
                                    <div class="row">

                                        <?php $i = 1; ?>
                                        <?php foreach ($categories as $key) :




                                            $check = null;
                                            $cid = $key['id'];
                                            if (in_array($cid, $cats)) {
                                                $check = 'checked';
                                            }

                                        ?>
                                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-6 col-xl-4">
                                                <label for="<?php $key['id'] ?>">
                                                    <input type="checkbox" <?php echo $check; ?> class="mr-1" value=<?php echo $key['id']; ?> name=<?php echo $i; ?>>
                                                    <?php echo ($key['name']);
                                                    $i++; ?>
                                                </label>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="color:#1d96e1;">Book Cover Image </label>
                                <span style="color:red">*</span>
                                <input type="file" style="background-color:rgba(21,32,43,1);color:white;border-color:#1d96e1;padding-bottom:35px;" value="<?php echo $book["cover_image"]; ?>" onchange="readURL(this);" name="cover_image" id="cover_image" class="form-control" placeholder="" style="padding-bottom: 35px;">
                            </div>

                            <?php $bid = $_GET['bid']; ?>
                            <input type="hidden" name="bid" value="<?php echo $bid; ?>">

                            <div class="col-md-12 text-center " style="padding-top:15px;">
                                <button type="submit" name="edit" class=" btn btn-block mybtn btn-primary tx-tfm">Done</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>