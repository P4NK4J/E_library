<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>
  $('#navbar .nav-item a').on('click', function() {
    $('#navbar .navbar-nav').find('a.active').removeClass('active');
    $(this).parent('a').addClass('active');
  });
</script>
<style>
  .mystyle {
    font-family: 'Open Sans', sans-serif;
    font-size: 1.2em;




  }

  .hoverstyle:hover{


    background-color: #162D40;
    color: #1da1f2 !important;
    border-radius: 10px;
  
  }
  

</style>



<nav class="navbar navbar-expand-lg navbar-dark text-center font-weight-bold" id="navbar" style="background-color:rgba(21,32,43,1);">
  <a class="nav-link ml-5  active  text-white mx-4 mystyle hoverstyle" href="collection">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>



  <div class="collapse navbar-collapse " id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">





      <li class="nav-item mx-5">
        <a class="nav-link mystyle hoverstyle text-white" href="readlist">Read by me</a>
      </li>

    </ul>

    <span class="nav-item mx-5">
      <button type="button" class="btn mystyle hoverstyle text-white font-weight-bold " data-toggle="modal" data-target="#exampleModal2">Logout</button>
      <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog"  role="document">
          <div class="modal-content" style="background-color:rgba(21,32,43,1);">
            <div class="modal-header text-white">
              <h5 class="modal-title" id="exampleModalLabel2">Logout</h5>

              <button type="button" style="color:white;" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="color:#1d96c4; font-size:15px;" >Once you exit, the session will be terminated. Are you sure ??</div>

            <div class="modal-footer">

              <button type="button" class="btn btn-primary" data-dismiss="modal">Keep me Logged In</button>
              <a href="logout" id="exit" class="btn btn-danger">Exit Anyway</a>
            </div>

          </div>
        </div>

    </span>


  </div>
</nav>