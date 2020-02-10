<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SESSION['user_type'] != 'admin')

    header("location:/");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title> Modify Books</title>
</head>

<body>
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

    <div id="content" class="p-4 p-md-5 pt-5">


        <div class="searchbar" style="float: right; width: 350px;">


            <input class="search_input" type="text" onkeyup="myFunction()" placeholder="Search..." id="myFilter">
            <a href="#" class="search_icon"><i class="fa fa-search"></i></a>
        </div>

        <h1 class="mb-4" style="color: darkcyan;">Our Collection</h1>

        <div class="card-deck" id="mybooks" style="margin-left: 40px; margin-right: 40px; margin-bottom: 200px;">
            <?php $books = $app['database_book']->bookList();
            $cat_tag = $app['database_book']->listBookss();
            $i = -1;
            foreach ($books as $row) :
                $i++;
            ?>
                <div class="card-column" style="padding-left: 10px; padding-right: 10px; padding-top: 30px;">
                    <br>
                    <div class="card h-100" style="width: 15rem; box-shadow: 0 0 4px;">
                        <img class="card-img-top" src="Resources/Images/<?= $row['cover_image'] ?>" alt="" style="max-height: 19rem; ">
                        <div class="card-body flex-fill " style="background-color: #f1f5f5; ">
                            <h6 class="card-title">

                                <?php echo ($row['name']);
                                ?>
                                </h5>

                                <p class="card-text">
                                    <?php echo "Added On: {$row['date_added']}"; ?>
                                </p>
                                <p class="card-text">

                                    <?php
                                    foreach ($cat_tag[$i] as $key) :
                                        $cat_name = $key['category_id'];
                                        $stmt = $app['database_book']->catName($cat_name);  ?>
                                        <span class="badge" style="cursor: pointer; background-color: gainsboro;">
                                            <?php
                                            echo $stmt['name'];
                                            ?>
                                        </span>
                                    <?php endforeach;
                                    ?>
                                </p>

                                <a href="editview?bid=<?php echo $row['id'] ?>" class="card-link" style="color: green;">Edit</a>

                                <a href="#" data-toggle="modal" data-target="#bookdeletemodal<?= $i ?>" class="card-link" style="color:red;">Delete</a>
                                <div class="modal fade" id="bookdeletemodal<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel2" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="ModalLabel2" style="color: darkcyan;">Remove from collection</h5>

                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body" style="color:black;">Please confirm the deletion of this book</div>

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
    </div>

</body>

</html>