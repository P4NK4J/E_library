<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SESSION['user_type'] != 'reader')

    header("location:/");?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title> collection</title>
</head>

<body>

    <?php require "views/users/navbar.reader.view.php"; ?>

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
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <div id="content" class="p-4 p-md-5 pt-5">
        <div class="searchbar" style="float: right; width: 350px;">
            <input class="search_input" type="text" onkeyup="myFunction()" placeholder="Search..." id="myFilter">
            <a href="#" class="search_icon"><i class="fa fa-search"></i></a>
        </div>
        <h1 class="mb-4" style="color: darkcyan;">Our Collection</h1>
        <div class="card-deck" id="mybooks" style="margin-left: 40px; margin-right: 40px; margin-bottom: 200px;">
            <?php $books = $app['database_book']->bookList();
            $cat_tag = $app['database_book']->listBookss();
            $uid = $_SESSION['id'];
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
            <?php endforeach;
            die(); ?>
        </div>
    </div>
</body>

</html>