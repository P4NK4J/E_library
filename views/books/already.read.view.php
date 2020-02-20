<!DOCTYPE html>
<html lang="en" style="height:100%;">
<?php
if (session_status() == PHP_SESSION_NONE)
    session_start();

if ($_SESSION['user_type'] == 'admin')
    require "views/users/navbar.admin.view.php";

else if ($_SESSION['user_type'] == 'reader')
    require "views/users/navbar.reader.view.php";
$list = $app['database']->userList('reader'); ?>

<?php

$uid = $_SESSION['id'];
$stmt = $app['database_book']->fetchBooks($uid);

$stmt->execute();
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Read Books</title>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="Resources/CSS/searchbar.css">
    <link rel="stylesheet" href="Resources/CSS/floating button.css">
    <link rel="stylesheet" href="Resources/CSS/footer.css">

</head>

<script>
    $(document).ready(function() {

        $('#myFilter').keyup(function() {
            var search = $(this).val();
            $('table tbody tr').hide();
            var len = $('table tbody tr:not(.notfound) td:nth-child(2):contains("' + search + '")').length;
            if (len > 0) {
                $('table tbody tr:not(.notfound) td:contains("' + search + '")').each(function() {
                    $(this).closest('tr').show();
                });
            } else {
                $('.notfound').show();
            }
        });
    });
</script>

<body style="background-color: rgba(101,157,189,0.4);">
    <div id="content" class="p-4 p-md-5 pt-5 min-vh-100" style="padding-right:6rem; font-family: 'Open Sans', sans-serif;">
        <div class="searchbar mr-4" style="float: right; max-width:100%;">
            <input class="search_input" type="text" placeholder="Search..." id="myFilter">
            <a href="#" class="search_icon"><i class="fa fa-search"></i></a>
        </div>

        <h2 class="mb-5 font-weight-bolder " style="color: darkcyan;font-size:45px; margin-left:30px;"><?= "Reading list"  ?> </h2>


        <div class="table-responsive">
            <table class="table mx-auto" style="max-width:60%; background-color:rgba(101,157,189,0.2);" id="myTable">
                <thead class="thead" style="background-color:darkcyan !important;">
                    <tr style="color:white;">
                        <th scope="col" style="padding-left:50px;">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Author</th>



                    </tr>
                </thead>
                <tbody>

                    <?php


                    $i = 1;
                    foreach ($res as $key) :
                        $books = $app['database_book']->selectBook($key['book_id']);
                        $books->execute();
                        $readBook = $books->fetchAll(PDO::FETCH_ASSOC);


                    ?>
                        <?php


                        foreach ($readBook as $row) : ?>
                            <tr>
                                <th scope="row" style="padding-left:50px;"><?php echo $i++; ?></th>
                                <td><?php echo ($row['name']); ?></td>
                                <td><?php echo ($row['author']); ?></td>
                            </tr>
                    <?php endforeach;
                    endforeach;
                    ?>
                    <tr class='notfound'>
                        <td colspan='4'>No record found</td>
                        <style>
                            .notfound {
                                display: none;
                                text-align: center;
                                font-size: 20px;
                            }
                        </style>
                    </tr>

                </tbody>
            </table>
        </div>
        <?php
        if ($i == 1)
            echo "<h3 class='text-center mt-4 font-weight-bolder'>You haven't read any books</h3>"; ?>


    </div>
    <?php require "Resources/partials/footer.php" ?>

</body>




</html>