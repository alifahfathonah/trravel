<?php 
session_start();
$username=$_SESSION['username'];
if(!isset($_SESSION['username'])){
  header("Location: index.php");
}
include"connection.php";
 ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/t.png">

    <title>TRRAVEL</title>

     <link rel="stylesheet" href="assets/style.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="assets/glyphicon/css/font-awesome.min.css">
  
  

    <!-- Custom styles for this template -->
    <link href="assets/carousel.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="assets/DataTables/media/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="assets/DataTables/media/css/dataTables.bootstrap.css">
  </head>
  <body>

    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="menu.php">TRRAVEL</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
            <!-- <li class="nav-item active"> -->
              <a class="nav-link <?php if(!isset($_GET['hal'])) echo "active"; ?>" href="menu.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Master Data</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="menu.php?hal=armadatampil">Data Armada</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="menu.php?hal=fasilitastampil">Data Fasilitas</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="menu.php?hal=karyawantampil">Data Karyawan</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="menu.php?hal=membertampil">Data Member</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="menu.php?hal=penggunatampil">Data Pengguna</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="menu.php?hal=rutetampil">Data Rute</a>
            </div>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if(isset($_GET['hal']) && $_GET['hal'] == "jadwaltampil") echo "active"; ?>" href="menu.php?hal=jadwaltampil">Jadwal Operasi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if(isset($_GET['hal']) && $_GET['hal'] == "transaksitampil") echo "active"; ?>" href="menu.php?hal=transaksitampil">Transaksi</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link <?php if(isset($_GET['hal']) && $_GET['hal'] == "logout") echo "active"; ?>" href="logout.php">Log Out</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href=""><?php echo $username ?></a>
            </li> -->
          </ul>
          <ul class="navbar-nav my-2 my-lg-0">
            <li class="nav-item">
              <a class="nav-link disabled" href=""><?php echo $username ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if(isset($_GET['hal']) && $_GET['hal'] == "logout") echo "active"; ?>" href="logout.php">Log Out</a>
            </li>
            <!-- <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
          </ul>
        </div>
      </nav>
    </header>

    <main role="main">
      
      <?php if(!isset($_GET['hal'])){ ?>
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="first-slide" src="img/02.jpg" alt="First slide">
            <div class="container">
              <div class="carousel-caption text-left">
                <h1>Let's Go Travel</h1>
                <p>Travel!! Before You Run Out of Time</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn More</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="second-slide" src="img/03.jpg" alt="Second slide">
            <div class="container">
              <div class="carousel-caption">
                <h1>Let's Go Travel</h1>
                <p>Collect Moments, Not Things</p>
                <!-- <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p> -->
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="third-slide" src="img/04.jpg" alt="Third slide">
            <div class="container">
              <div class="carousel-caption text-right">
                <h1>Let's Go Travel</h1>
                <p>You Don't Need Magic to Disappear. All You Need is a Destination</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse Gallery</a></p>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>


      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->

      <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="row">
          <div class="col-lg-4">
            <img class="rounded-circle" src="img/kaleidoskop.jpg" alt="Generic placeholder image" width="250" height="250">
            <h2>A YEAR IN REVIEW</h2>
            <p>As dawn broke on this year, I was excited for a fresh start. Last year, I dealt with panic attacks and anxiety from taking on too many projects, a breakup that left me heartbroken, and a mini-identity crisis from settling down.</p>
            <p><a class="btn btn-primary" href="https://www.nomadicmatt.com/travel-blogs/year-review-break/" role="button">View details &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="img/solo.jpg" alt="Generic placeholder image" width="250" height="250">
            <h2>SOLO FEMALE TRAVELER</h2>
            <p>Helen lived a seminomadic life for a year and a half before returning home to work. She has traveled solo to the Galápagos Islands, Kenya, Tanzania, India, Turkey, Jordan, Israel, the West Bank, Malaysia, Thailand, Vietnam, Laos, Indonesia, and South Korea.</p>
            <p><a class="btn btn-primary" href="https://www.nomadicmatt.com/travel-blogs/non-millennial-solo-female-travelers/" role="button">View details &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="img/lake.jpg" alt="Generic placeholder image" width="250" height="250">
            <h2>SOLO FEMALE TRAVELER</h2>
            <p>Kristin Addis from Be My Travel Muse writes our regular column on solo female travel. It’s an important topic I can’t adequately cover, so I brought in an expert to share her advice for other women travelers to help cover the topics important and specific to them! She’s amazing and knowledgable.</p>
            <p><a class="btn btn-primary" href="https://www.nomadicmatt.com/travel-blogs/non-millennial-solo-female-travelers/" role="button">View details &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->


        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">Let's Go Travel <span class="text-muted">- YOLO</span></h2>
            <p class="lead">"The World is a book, and those who do not travel read only a page - Saint Augustine"</p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="Generic placeholder image" src="img/book.jpg">
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">Let's Go Travel <span class="text-muted">- YOLO</span></h2>
            <p class="lead">"Travel is the only thing you buy that makes you richer - Project Inspo"</p>
          </div>
          <div class="col-md-5 order-md-1">
            <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="Generic placeholder image" src="img/rich.jpg">
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">Let's Go Travel <span class="text-muted">- YOLO</span></h2>
            <p class="lead">"Travel far enough, you meet yourself - Cloud Atlas"</p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="Generic placeholder image" src="img/atlas.jpg">
          </div>
        </div>

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->

      </div><!-- /.container -->

      <?php } ?> 

      <?php 
      if(isset($_GET['hal'])){
        include $_GET['hal'].'.php';
      } 
      ?>

      <!-- FOOTER -->
      <footer class="container absolute-bottom">
        <p class="float-right"><a href="#"><i class="fa fa-arrow-up" aria-hidden="true"></i> Back to top</a></p>
        <p>&copy; 2018 Tahta Reza Rahmadhany. &middot; <!-- <a href="#">Privacy</a> &middot; <a href="#">Terms</a> -->
          <a href="https://www.facebook.com/tahtarezarahmadhany"><i class="fa fa-facebook" aria-hidden="true"></i></a>
          <a href="https://www.instagram.com/tahtareza/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        </p>
      </footer>
    </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

<script type="text/javascript" src="assets/DataTables/media/js/jquery.js"></script>
<script type="text/javascript" src="assets/DataTables/media/js/jquery.dataTables.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.data').DataTable();
  });
</script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="assets/jquery/jquery.min.js"><\/script>')</script>
    <script src="assets/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

<script src="assets/jquery/jquery.min.js"></script>    
<!-- <script type="text/javascript" src="assets/DataTables/media/js/jquery.min.js"></script> -->
<script type="text/javascript" src="assets/DataTables/media/js/jquery.dataTables.min.js"></script>

    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="assets/holder.min.js"></script>
  </body>
</html>
