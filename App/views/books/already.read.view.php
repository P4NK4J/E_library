<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SESSION['user_type'] != 'reader') {
    header('location:/');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read By Me</title>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <script src="app/public/Resources/js/jquery.min.js"></script>
    <script src="app/public/Resources/js/popper.js"></script>
    <script src="app/public/Resources/js/bootstrap.min.js"></script>
    <script src="app/public/Resources/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>

</head>

<body>

<?php

require "views/users/navbar.reader.view.php"; ?>


<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4"><?= 'List of Books Read ' ?></h2>
    <?php
    $uid = $_SESSION['id'];
    $stmt = $app['database_book']->fetchBooks($uid);
    
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    ?>

    <div class="table-responsive">
        <table class="table" id="myTable">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
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
                            <th scope="row"><?php echo $i++; ?></th>
                            <td><?php echo ($row['name']); ?></td>
                            <td><?php echo ($row['author']); ?></td>
                        </tr>
                <?php endforeach;
                endforeach;
                ?>
            </tbody>
        </table>
    </div>

</div>


</div>
<script>
    $(document).ready(function() {
        $('#myTable').dataTable();
    });
</script>
</body>

</html>