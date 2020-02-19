<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SESSION['user_type'] != 'admin')

    header("location:/login");

$column = array('id', 'name');
$categories = $app['categories']->categoryList('categories', $column);


?>
<link rel="stylesheet" href="Resources/CSS/footer.css">
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title> Modify Books</title>
</head>

<body style="background-color: rgba(101,157,189,0.4);">
    <?php require "views/users/navbar.admin.view.php"; ?>

    <script>
        function myFunction() {
            var input, filter, cards, cardContainer, h5, title, i;
            input = document.getElementById("myFilter");
            filter = input.value.toUpperCase();
            cardContainer = document.getElementById("mybooks");
            cards = cardContainer.getElementsByClassName("card");
            for (i = 0; i < cards.length; i++) {
                title = cards[i].querySelector(".card-body h6.card-title");
                if (title.innerText.toUpperCase().indexOf(filter) > -1) {
                    cards[i].style.display = "";
                } else {
                    cards[i].style.display = "none";
                }
            }
        }
    </script>
    <link rel="stylesheet" href="Resources/CSS/searchbar.css">
    <link rel="stylesheet" href="Resources/CSS/floating button.css">

    <div id="content" class="p-4 p-md-5 pt-5 ">


        <div class="searchbar mt-4 mr-4" style="float: right; max-width: 100%;">



            <input class="search_input " type="text" onkeyup="myFunction()" placeholder="Search..." id="myFilter">
            <a href="#" class="search_icon"><i class="fa fa-search"></i></a>
        </div>

        <div class="row mt-4 ">

            <h2 class=" font-weight-bolder " style="color: darkcyan;font-size:45px; margin-left:30px;"><?= "Our Collection"  ?></h2>
            <button class="kc_fab_main_btn ml-5 mr-4 " data-toggle="modal" data-target="#bookmodal"><i class="fa fa-plus"></i></button>

        </div>
        <div class="modal fade" id="bookmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: rgba(21,32,43,1);">
                        <h3 class="modal-title text-white" id="exampleModalLabel">Add a Book</h3>

                        <button type="button" style="color:white;" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="background-color: rgba(21,32,43,1);">
                        <div class="myform form text-white" style="background-color: rgba(21,32,43,1);">
                            <div class="logo mb-3">

                            </div>
                        </div>
                        <form action="addbook" method="post" class="ml-3 mr-3" enctype="multipart/form-data">
                            <div class="form-group ">
                                <label style="color:#1d96e1;">Name</label>
                                <span style="color:red">*</span>
                                <input type="text" required name="bookname" class="form-control" id="bookname" style="background-color:#192734;color:white;border-color:#1d96e1" placeholder="">
                            </div>
                            <div class="form-group">
                                <label style="color:#1d96e1;">Author</label>
                                <span style="color:red">*</span>
                                <input type="text" required name="author" id="author" class="form-control" style="background-color:#192734;color:white;border-color:#1d96e1" placeholder="">
                            </div>
                            <div class="form-group">
                                <label style="color:#1d96e1;">Edition</label>
                                <span style="color:red">*</span>
                                <input type="text" name="edition" id="edition" class="form-control" style="background-color:#192734;color:white;border-color:#1d96e1" placeholder="">
                            </div>
                            <div class="form-group text-white"><span style="color:#1d96e1;">Book Categories:</span><span style="color:red">*</span>
                                <div class="input-group" style="margin-top: 15px;">
                                    <div class="row">
                                        <?php $i = 1; ?>
                                        <?php foreach ($categories as $key) :

                                        ?>

                                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-6 col-xl-4">
                                                <label for="<?php $key['id'] ?>">
                                                    <input type="checkbox" style="background-color:#192734;color:white;border-color:#1d96e1" class="mr-1" value=<?php echo $key['id'] ?> name=<?php echo $i ?>>
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
                                <input type="file" required value="Upload Image" style="background-color:#192734;color:white;border-color:#1d96e1;padding-bottom: 35px;" name="cover_image" id="cover_image" class="form-control" placeholder="">
                            </div>

                            <div class="col-md-12 text-center" style="padding-top:15px;">
                                <button type="submit" name="add" class="btn btn-block mybtn font-weight-bold btn-primary tx-tfm">Done</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="min-height:100%;">
        <div class="card-deck  " id="mybooks" style="margin-bottom: 50px; margin-left: 60px;margin-right:0px;">
            <?php $books = $app['database_book']->bookList();

            $cat_tag = $app['database_book']->listBookss();
            $i = -1;
            foreach ($books as $row) :
                $i++;
            ?>
                <div class="card-column card-group" style="padding-left: 10px; padding-top: 60px;">
                    <br>
                    <div class="card" style="width: 15rem; margin-right:50px;">
                        <img class="card-img-top" src="Resources/Images/<?= $row['cover_image'] ?>" alt="" style="max-height: 20rem; ">
                        <div class="card-body flex-fill " style="background-color: rgba(101,157,189,0.2); ">
                            <h6 class="card-title font-weight-bold">

                                <?php echo ($row['name']);
                                ?>
                                </h5>

                                <p class="card-text" style="font-size:13px;">
                                    <?php echo "Added On: {$row['date_added']}"; ?>
                                </p>
                                <p class="card-text">

                                    <?php
                                    foreach ($cat_tag[$i] as $key) :
                                        $cat_name = $key['category_id'];
                                        $stmt = $app['database_book']->catName($cat_name);  ?>
                                        <span class="badge" style="cursor:auto; background-color:rgba(21,32,430,0.1) ;">
                                            <?php
                                            echo $stmt['name'];
                                            ?>
                                        </span>
                                    <?php endforeach;
                                    ?>
                                </p>

                                <a href="editview?bid=<?php echo $row['id'] ?>" class="card-link font-weight-bold" style="color: green;">Edit</a>

                                <a href="#" data-toggle="modal" data-target="#bookdeletemodal<?= $i ?>" class="card-link font-weight-bold" style="color:red; float:right;">Delete</a>
                                <div class="modal fade" id="bookdeletemodal<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel2" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content" style="background-color:rgba(21,32,43,1);">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="ModalLabel2" style="color:white;">Remove from collection</h5>

                                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body" style="color:#1d96e1;">Please confirm the deletion of this book</div>

                                            <div class="modal-footer">

                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Back</button>
                                                <a href="deletebook?book_id=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
    

    <?php require "Resources/partials/footer.php" ?>
</body>
</html>