<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SESSION['user_type'] != 'reader')

    header("location:/");

$column = array('id', 'name');
$categories = $app['categories']->categoryList('categories', $column); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Resources/CSS/footer.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


    <title>collection</title>
</head>

<body style="background-color: rgba(101,157,189,0.4);">
    <?php require "views/users/navbar.reader.view.php"; ?>

    <script>
        function myFunction() {
            var input, filter, cards, cardContainer, h5, title, i;

            input = document.getElementById("myFilter");
            filter = input.value.toUpperCase();
            cardContainer = document.getElementById("mybooks");
            cards = cardContainer.getElementsByClassName("card");
            var j = 0;
            for (i = 0; i < cards.length; i++) {
                title = cards[i].querySelector(".card-body h6.card-title");
                if (title.innerText.toUpperCase().indexOf(filter) > -1) {
                    cards[i].style.display = "";
                    j++;

                } else {
                    cards[i].style.display = "none";

                }
            }
            if (j == 0)
                $('.notfound').show();
            else
                $('.notfound').hide();

        }
    </script>
    <link rel="stylesheet" href="Resources/CSS/searchbar.css">
    <link rel="stylesheet" href="Resources/CSS/floating button.css">
    <div class=" min-vh-100">
        <div id="content" class="p-4 p-md-5 pt-5">


            <div class="searchbar mt-4 mr-4" style="float: right; max-width: 100%;">



                <input class="search_input " type="text" onkeyup="myFunction()" placeholder="Search..." id="myFilter">
                <a href="#" class="search_icon"><i class="fa fa-search"></i></a>
            </div>

            <div class="row mt-4 ">

                <h2 class=" font-weight-bolder " style="color: darkcyan;font-size:45px; margin-left:30px;"><?= "Our Collection"  ?></h2>

            </div>

        </div>

        <div style="min-height:100%;">
            <div class="card-deck" id="mybooks" style="margin-bottom: 50px; margin-left: 60px;margin-right:0px;">
                <?php $books = $app['database_book']->bookList();
                $cat_tag = $app['database_book']->listBookss();

                $uid = $_SESSION['id'];

                $i = -1;
                foreach ($books as $row) :
                    $i++;
                ?>
                    <div class="card-column card-group" style="padding-left: 8px; padding-top: 60px;">
                        <br>
                        <div class="card" style="width: 15rem; margin-right:55px;">
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
                                    <?php $booksRead = $app['database_book']->fetchBooks($uid);
                                    $booksRead->execute();
                                    $ch = $booksRead->fetchAll(PDO::FETCH_ASSOC);
                                    $check = null;
                                    $bid = $row['id'];
                                    foreach ($ch as $key) :
                                        if (in_array($bid, $key)) {
                                            $check = 'checked';
                                        }
                                    endforeach;
                                    $link = "/readbyuser?bid=" . $bid;
                                    $lnk = "/unreadbyuser?bid=" . $bid;
                                    
                                    ?>

                                    <div class="form-check">
                                        <?php if (!$check) : ?>
                                            <input onclick='window.location.href = "<?= $link ?>"' class="form-check-input" <?php echo $check; ?> type="checkbox" id="<?php echo $row['id']; ?>">
                                            <label for="<?php echo $row['id']; ?>" class="white-text form-check-label">Mark As Read</label>
                                        <?php else : ?>
                                            <input onclick='window.location.href = "<?= $lnk ?>"' class="form-check-input" <?php echo $check; ?> type="checkbox" id="<?php echo $row['id']; ?>">
                                            <label for="<?php echo $row['id']; ?>" class="white-text form-check-label">Mark As Read</label>

                                        <?php endif; ?>
                                    </div>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <span class='notfound offset-3' style="display:none; font-size:30px; text-align:center;">
                    No record found
                </span>


            </div>
        </div>

    </div>
    <?php require "Resources/partials/footer.php" ?>
</body>


</html>