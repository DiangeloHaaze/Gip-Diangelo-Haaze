<?php
session_start();
if(!isset($_SESSION["count"])){
	$_SESSION["count"] = 0;
}
include('php/Checkadmin.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Modern Business - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">
  <link href="css/Stylediangelo.css" rel="stylesheet">
<style>
.notification {
  background-color: #555;
  color: white;
  text-decoration: none;
  padding: 7px 13px;
  position: relative;
  display: inline-block;
  border-radius: 2px;
}


.notification .badge {
  position: absolute;
  top: 20px;
  right: -10px;
  padding: 5px 10px;
  border-radius: 50%;
  background-color: red;
  color: white;
}
</style>
</head>

<body>


  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">Athena's Game</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="test.php">Test</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="producten.php">Producten</a>
          </li>
            <li class="nav-item">
            <a class="nav-link" href="Subscribtie.php">Subscribtie</a>
          </li>
             <?php if(!isset($_SESSION["ingelogd"])){ ?>
          <li class="nav-item">
            <a class="nav-link" href="registreer.php">Registreer</a>
          </li>
            <li class="nav-item">
            <a class="nav-link" href="Inloggen.php">inloggen</a>
          </li>
            <?php } else{ ?>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo $_SESSION["gebruikernaam"]; ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
              <a class="dropdown-item" href="Weizigen.php">Aanpassen</a>
              <a class="dropdown-item" href="php/uitloggen.php">Uitloggen</a>
                <?php if($_SESSION["adminkey"] == true){?>
              <a class="dropdown-item" href="toonklanten.php">Gebruikers bekijken</a>
                <?php } ?>
            </div>
          </li>
            <?php
            }
            ?>
		  <li class="nav-item">
              <a class="notification" href="winkelwagen.php"><span class="glyphicon">&#x1f6d2;</span><span class="badge"><?php if($_SESSION["count"] != 0){echo $_SESSION["count"];} ?></span></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


 <header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active" style="background-image: url('http://getwallpapers.com/wallpaper/full/1/0/d/1060100-cool-video-games-wallpapers-1920x1080.jpg')">
          <div class="carousel-caption d-none d-md-block">
            <h3>Games</h3>
            <p>Verkrijg de nieuwste games</p>
          </div>
        </div>
        <!-- Slide Two - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('https://wallpapercave.com/wp/wp2004803.jpg')">
          <div class="carousel-caption d-none d-md-block">
            <h3>Console</h3>
            <p>Elke console van hier tot in japan</p>
          </div>
        </div>
        <!-- Slide Three - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('http://getwallpapers.com/wallpaper/full/f/6/8/1060216-new-video-games-wallpapers-2560x1440-720p.jpg')">
          <div class="carousel-caption d-none d-md-block">
            <h3>Accessoires</h3>
            <p>Van gadgets tot posters</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </header>

  <!-- Page Content -->
  <div class="container">

    <h1 class="my-4">Welcome bij Athena's Game</h1>

    <!-- Marketing Icons Section -->
    <div class="row">
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <h4 class="card-header">Contact</h4>
          <div class="card-body">
            <p class="card-text">Als je een probleem hebt of een vraag die niet beantwoord werd door een FAQ dan can je ons gerust contacteren.</p>
          </div>
          <div class="card-footer">
            <a href="contact.html" class="btn btn-primary">Ga naar Contacten</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <h4 class="card-header">Over ons</h4>
          <div class="card-body">
            <p class="card-text">Als je meer wilt weten over wie zoal achter Athena's Game is kunt u hieronder klikken om er meer info van te weten</p>
          </div>
          <div class="card-footer">
            <a href="about.html" class="btn btn-primary">Meer Info</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <h4 class="card-header">Subscripties</h4>
          <div class="card-body">
            <p class="card-text">Voor goedkopere games en de kans om  te preordenen kan je een subscribtie kiezen uit een keuze van drie met verschillende aspecten voor verschillende prijzen</p>
          </div>
          <div class="card-footer">
            <a href="Subscribtie.html" class="btn btn-primary">Ga naar subscribtie</a>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->

    <!-- Portfolio Section -->
    <h2>Trending</h2>

    <div class="row">
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="portfolio-item.html"><img class="card-img-top" src="Pictures/InazumaEleven3LightningBolt.png" alt="http://placehold.it/700x400"></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="portfolio-item.html">Inazuma Eleven 3 lightning bolt (3DS-ENG)</a>
            </h4>
            <p class="card-text">Deze game is gebaseerd op het verhaal van Fideo Ardena. Fideo wordt voornamelijk gebruikt tijdens de eerste scènes van het spel, in gesprek met Rushe en zijn teamgenoten. Met deze versie van het spel kun je alleen spelen tegen Tenkuu no Shito, in plaats van dat team dat bekend staat als Makai Gundan Z. Beide versies van Spark en Bomber zijn bijna hetzelfde, wat anders is, is het openingsscherm. Op de cover van Spark ontbreken Someoka Ryuugo en Sakuma Jirou tijdens de Aziatische kwalificaties naar het Inazuma Japan-team.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="portfolio-item.html"><img class="card-img-top" src="Pictures/InazumaEleven.png" alt="http://placehold.it/700x400"></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="portfolio-item.html">Inazuma Eleven (DS-ENG)</a>
            </h4>
            <p class="card-text">Deze game is gebaseerd op het verhaal van Fideo Ardena. Fideo wordt voornamelijk gebruikt tijdens de eerste scènes van het spel, in gesprek met Rushe en zijn teamgenoten. Met deze versie van het spel kun je alleen spelen tegen Tenkuu no Shito, in plaats van dat team dat bekend staat als Makai Gundan Z. Beide versies van Spark en Bomber zijn bijna hetzelfde, wat anders is, is het openingsscherm. Op de cover van Spark ontbreken Someoka Ryuugo en Sakuma Jirou tijdens de Aziatische kwalificaties naar het Inazuma Japan-team.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="portfolio-item.html"><img class="card-img-top" src="Pictures/Inazuma_Eleven_2-_Kyoui_no_Shinryakusha_Fire_Cover.jpg" alt="http://placehold.it/700x400"></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="portfolio-item.html">Inazuma Eleven 2 Firestorm (DS-JAP)</a>
            </h4>
            <p class="card-text">Deze game is gebaseerd op het verhaal van Fideo Ardena. Fideo wordt voornamelijk gebruikt tijdens de eerste scènes van het spel, in gesprek met Rushe en zijn teamgenoten. Met deze versie van het spel kun je alleen spelen tegen Tenkuu no Shito, in plaats van dat team dat bekend staat als Makai Gundan Z. Beide versies van Spark en Bomber zijn bijna hetzelfde, wat anders is, is het openingsscherm. Op de cover van Spark ontbreken Someoka Ryuugo en Sakuma Jirou tijdens de Aziatische kwalificaties naar het Inazuma Japan-team.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="portfolio-item.html"><img class="card-img-top" src="Pictures/inazumaElevenGo_3_Galaxy_SUPERNOVA.jpg" alt="http://placehold.it/700x400"></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="portfolio-item.html">Inazuma Eleven GO Galaxy Supernova (3DS-JAP)</a>
            </h4>
            <p class="card-text">Deze game is gebaseerd op het verhaal van Fideo Ardena. Fideo wordt voornamelijk gebruikt tijdens de eerste scènes van het spel, in gesprek met Rushe en zijn teamgenoten. Met deze versie van het spel kun je alleen spelen tegen Tenkuu no Shito, in plaats van dat team dat bekend staat als Makai Gundan Z. Beide versies van Spark en Bomber zijn bijna hetzelfde, wat anders is, is het openingsscherm. Op de cover van Spark ontbreken Someoka Ryuugo en Sakuma Jirou tijdens de Aziatische kwalificaties naar het Inazuma Japan-team.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="portfolio-item.html"><img class="card-img-top" src="Pictures/inazumaElevenGo_3_Galaxy_BIGBANG.jpg" alt="http://placehold.it/700x400"></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="portfolio-item.html">Inazuma Eleven GO Galaxy Big Bang (3DS-JAP)</a>
            </h4>
            <p class="card-text">Deze game is gebaseerd op het verhaal van Fideo Ardena. Fideo wordt voornamelijk gebruikt tijdens de eerste scènes van het spel, in gesprek met Rushe en zijn teamgenoten. Met deze versie van het spel kun je alleen spelen tegen Tenkuu no Shito, in plaats van dat team dat bekend staat als Makai Gundan Z. Beide versies van Spark en Bomber zijn bijna hetzelfde, wat anders is, is het openingsscherm. Op de cover van Spark ontbreken Someoka Ryuugo en Sakuma Jirou tijdens de Aziatische kwalificaties naar het Inazuma Japan-team.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="portfolio-item.html"><img class="card-img-top" src="Pictures/PS_3DS_InazumaElevenGOChronoStonesWildfire_HOL.jpg" alt="http://placehold.it/700x400"></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="portfolio-item.html">Inazuma Eleven GO Chrono Stone Wildfire (3DS-ENG)</a>
            </h4>
            <p class="card-text">Deze game is gebaseerd op het verhaal van Fideo Ardena. Fideo wordt voornamelijk gebruikt tijdens de eerste scènes van het spel, in gesprek met Rushe en zijn teamgenoten. Met deze versie van het spel kun je alleen spelen tegen Tenkuu no Shito, in plaats van dat team dat bekend staat als Makai Gundan Z. Beide versies van Spark en Bomber zijn bijna hetzelfde, wat anders is, is het openingsscherm. Op de cover van Spark ontbreken Someoka Ryuugo en Sakuma Jirou tijdens de Aziatische kwalificaties naar het Inazuma Japan-team.</p>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->

    <!-- Features Section -->
    <div class="row">
      <div class="col-lg-6">
        <h2>Wat wilt Athena's Game bereiken</h2>
        <p>Wij willen het volgende bereiken:</p>
        <ul>
          <li>
            <strong>Het gelukkig maken van verschillende soorten gamers</strong>
          </li>
          <li>Een ruim aanbod om zo veel mogelijk mensen aan te spreken</li>
          <li>Iedereen een kans te geven om games te kunnen spelen</li>
        </ul>
        <p>Dit is dus waar wij naartoe streven en wij hopen dus om zo veel mogelijk gamers en hopen dat dit jullie aanmoedigt om mee te helpen voor gamers.</p>
      </div>
      <div class="col-lg-6">
        <img class="img-fluid rounded" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fsecurityintelligence.com%2Fwp-content%2Fuploads%2F2018%2F04%2Ftechnologygamingentertai_558328-630x330.jpg&f=1&nofb=1" alt="http://placehold.it/700x450">
      </div>
    </div>
    <!-- /.row -->

    <hr>

    <!-- Call to Action Section -->
    <div class="row mb-4">
      <div class="col-md-8">
        <p>Als je terug naar boven wilt klik op terug</p>
      </div>
      <div class="col-md-4">
        <a class="btn btn-lg btn-secondary btn-block" href="#">terug</a>
      </div>
    </div>

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Athena's Game 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
