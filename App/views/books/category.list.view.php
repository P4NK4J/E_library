<?php
if (session_status() == PHP_SESSION_NONE)
    session_start();

if ($_SESSION['user_type'] == 'admin')
    require "views/users/navbar.admin.view.php";

else if ($_SESSION['user_type'] == 'reader')
    require "views/users/navbar.reader.view.php";

$list = $app['categories']->categoryList();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>categoryList</title>

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
    function myFunction() {

        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myFilter");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
</script>


<body style="background-color: rgba(101,157,189,0.4);">
    <div id="content" class="p-4 p-md-5 pt-4" style="min-height:90%; padding-right:6rem; font-family: 'Open Sans', sans-serif; ">

        <div class="searchbar mr-4" style="float: right; max-width:100%;">
            <input class="search_input" type="text" onkeyup="myFunction()" placeholder="Search..." id="myFilter">
            <a href="#" class="search_icon"><i class="fa fa-search"></i></a>
        </div>

        <div class="row">

            <h2 class="mb-5 font-weight-bolder " style="color: darkcyan;font-size:45px; margin-left:30px;"><?= "Category List"  ?></h2>
            <button class="kc_fab_main_btn ml-5 mr-4 mb-5 " data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i></button>

        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content text-white" style="background-color:rgba(21,32,43,1);font-family: 'Open Sans', sans-serif;">
                    <div class="modal-header font-weight-bolder">
                        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>

                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="addcat" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label style="color:1d96e1;">Enter Name Here</label>
                                <span style="color:red">*</span>
                                <input type="text" style="background-color:rgba(21,32,43,1); border-color:#1d96e1;color:white;" required name="catname" class="form-control" placeholder="">
                            </div>
                    </div>
                    <div class="modal-footer">

                        <button type="submit" class="btn btn-primary">submit</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table" id="myTable" style="margin-left:30px; max-width:95.5%;background-color:rgba(101,157,189,0.4);" id="myTable">
                <thead class="thead" style="background-color:darkcyan !important;">
                    <tr style="color:white;">
                        <th scope="col" style="padding-left:50px;">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Date Added</th>
                        <th scope="col">Modify</th>


                    </tr>
                </thead>
                <tbody class="table" style="font-size: 16px;">
                    <?php
                    $i = 1;

                    foreach ($list as $row) : ?>
                        <tr>

                            <th scope="row" style="padding-left:50px;"><?php echo $i++; ?></th>
                            <td id="myCat"><?php echo ($row['name']); ?></td>
                            <td><?php echo ($row['date_added']); ?></td>
                            <td> <a href="#" data-toggle="modal" data-target="#catdeletemodal<?= $i ?>" class="card-link" style="color:red;">Delete</button>
                                    <div class="modal fade" id="catdeletemodal<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel2" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content" style="background-color:rgba(21,32,43,1);">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="ModalLabel2" style="color:white;font-weight:bold;">Remove category</h5>

                                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="color:#1d96e1;">Please confirm the deletion of this category</div>

                                                <div class="modal-footer">

                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Back</button>
                                                    <a href="/deletecategory?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                                                </div>

                                            </div>
                                        </div>


                        </tr>
                    <?php
                    endforeach; ?>

                </tbody>
            </table>
        </div>


    </div>

    <?php require "Resources/partials/footer.php" ?>
</body>

</html>