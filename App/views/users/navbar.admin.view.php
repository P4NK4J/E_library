
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  

  <nav class="navbar navbar-expand-lg navbar-dark font-weight-bold" style="background-color: rgba(0,0,0,0.35);">
    <a class="navbar-brand" style='font-size:1.7em;' href="admin">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

<style>
  ul>li>a,nav>a{
    font-family: 'Times New Roman', Times, serif;
    font-size: 1.3em;
    
    transition: 0.3s;
    text-shadow: 1px 1px 2px #000;
  }
  ul>li>a:hover{
    transition: 0.3s;
    margin-top:-8px;
  }
  
</style>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto ">
        <li class="nav-item mx-3 ">
          <a class="nav-link text-white" href="add">Add Book </a>
        </li>



        <li class="nav-item mx-3">
          <a class="nav-link text-white" href="booklist">Manage Books</a>
        </li>

        <li class="nav-item mx-3">
          <a class="nav-link text-white" href="category_list">Categories</a>
        </li>

        <li class="nav-item mx-3">
          <a class="nav-link text-white" href="userlist">Readers</a>
        </li>

      </ul>
      <span class="nav-item mx-5">
        <span style="padding: 2px; font-weight:bold; font-size: 22px;color:#fff; text-shadow:1px 1px 4px #f00;">Logout</span>
        <button type="button" class="btn" style="padding: 2px; padding-bottom: 10px; color:#fff; text-shadow:2px 2px 4px #f00;" data-toggle="modal" data-target="#exampleModal2"><i class="fa fa-sign-out" style="font-size: 40px;" aria-hidden="true"></i></button>
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

