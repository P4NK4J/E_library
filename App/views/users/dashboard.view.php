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

<!-- Page Content  -->
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
                    <img class="card-img-top" src="Resources/Images/<?= $row['cover_image'] ?>" alt="" style="max-height: 18rem;">
                    <div class="card-body flex-fill " style="background-color: #f1f5f5;">
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

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>