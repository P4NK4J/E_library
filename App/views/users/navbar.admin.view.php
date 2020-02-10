
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>



  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #dde0e2!important;">
    <a class="navbar-brand" href="admin">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item mx-3">
          <a class="nav-link" href="addbook">Add Book </a>
        </li>



        <li class="nav-item mx-3">
          <a class="nav-link" href="booklist">Manage Books</a>
        </li>

        <li class="nav-item mx-3">
          <a class="nav-link" href="category_list">Categories</a>
        </li>

        <li class="nav-item mx-3">
          <a class="nav-link" href="userlist">Readers</a>
        </li>

      </ul>
      <span class="nav-item mx-5">
        <button type="button" class="btn" style="padding: 2px; background-color:#dde0e2" data-toggle="modal" data-target="#exampleModal2"><i class="fa fa-sign-out" style="font-size: 40px;" aria-hidden="true"></i></button>
        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2" style="color: darkcyan;">Logout</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">Once you exit, the session will be terminated. Are you sure ??</div>
            
            <div class="modal-footer">

              <button type="button" class="btn btn-primary" data-dismiss="modal">Keep me Logged In</button>
              <a href="logout" id="exit" class="btn btn-danger">Exit Anyway</a>
            </div>

          </div>
        </div>

      </span>
      
    </div>
  </nav>

