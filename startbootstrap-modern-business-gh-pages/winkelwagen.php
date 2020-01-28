<?php
session_start();
if(isset($_POST["allesverwijderen"]) && $_POST["allesverwijderen"] == 'allesverwijderen'){
	include("php/allesverwijderen.php");
}
if(isset($_GET['actiep']) && $_GET['actiep'] == 'wis' && isset($_GET['productid'])){
	$id = $_GET['productid'];
	include('php/verwijder.php');
}



$totaal = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Athena Game's</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">
  <link href="css/diangelostyle.css" rel="stylesheet">

</head>

<body>

	<!-- De navigatie balk bovenaan de pagina op elke pagina. -->
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
  		  <a class="nav-link" href="testt.php">Testt</a>
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
  		   <?php
  		 //kijkt of de gebruiker is ingelogd en indien ja komt dit tevoorschijn.
  		 if(!isset($_SESSION["ingelogd"])){
  			 ?>
  		<li class="nav-item">
  		  <a class="nav-link" href="registreer.php">Registreer</a>
  		</li>
  		  <li class="nav-item">
  		  <a class="nav-link" href="Inloggen.php">inloggen</a>
  		</li>
  		  <?php }
  		// en als je niet ingelogd ben krijg je dit te zien.
  		else{ ?>
  		  <li class="nav-item dropdown">
  		  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  			<?php echo $_SESSION["gebruikernaam"]; ?>
  		  </a>
  		  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
  			<a class="dropdown-item" href="Weizigen.php">Aanpassen</a>
  			<a class="dropdown-item" href="php/uitloggen.php">Uitloggen</a>
  			  <?php
  			// dit is alleen zichtbaar waneer de gebruiker een admin is.
  			if($_SESSION["adminkey"] == true){?>
  			<a class="dropdown-item" href="toonklanten.php">Gebruikers Bekijken</a>
			<a class="dropdown-item" href="addproducten.php"> Producten Toevoegen</a>
			<a class="dropdown-item" href="weizigproducten.php"> Producten Weizigen</a>
  			  <?php } ?>
  		  </div>
  		</li>
  		  <?php
  		  }
  		//hierna word het winkelwagentje getoont. Als er niets is ingevuld dan toont hij niet het aantel prodcuten maar als dit wel zo is geeft hij weer hoeveel er van 1 product aanwezig is in de winkelwagentje.
  		  ?>
  	  <li class="nav-item">
  			<a class="notification" href="winkelwagen.php"><span class="glyphicon">&#x1f6d2;</span><span class="badge"><?php if($_SESSION["count"] != 0){echo $_SESSION["count"];} ?></span></a>
  		</li>
  	  </ul>
  	</div>
    </div>
    </nav>


  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Games
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Home</a>
      </li>
      <li class="breadcrumb-item active">Games F1</li>
    </ol>

      <?php
	  if($_SESSION["count"] != 0){
		  $tel = 0;
		  $mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
		  if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }
		  else
		  {
		  	for ($y=0; $y < $_SESSION['count']; $y++) {
		  		$aantalproducten[$y] = $_SESSION["aantal"][$y];
		  		$productiden[$y] = $_SESSION["koopwaren"][$y];
		  	}


		  	for ($i=0; $i < $_SESSION['count']; $i++) {
		  		$querries[$i] = "SELECT * FROM tblproducten WHERE productid = '$productiden[$i]'";
		  	}

		  foreach ($querries as $querrie) {
		  	if($stmt = $mysqli->prepare($querrie)){
		                  if(!$stmt->execute()){
		                      echo 'Het uitvoeren van de query is mislukt: '.$stmt->error.' in query: '.$querrie;
		                  }
		                  else{
		                      $stmt->bind_result($productid, $productnaam, $producttaal, $soortid, $beschrijving, $prijsPstuk, $linkfoto);
		                      while($stmt->fetch()){

        ?>
	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="row">
      <div class="col-md-7">
        <a href="productitem.php?actie=doorgang&productid=<?php echo $productid;?>">
          <img class="fotos" src="<?php echo $linkfoto;  ?>" alt="http://placehold.it/700x300">
        </a>
      </div>
      <div class="col-md-5">
        <h3><a class="zwartelink" href="productitem.php?actie=doorgang&productid=<?php echo $productid;?>"> <?php echo $productnaam . " (" . $producttaal.")"; ?></h3><a>
        <p><?php echo $beschrijving ?></p>
        </a>
		<h4 > Aantallen: <?php echo $aantalproducten[$tel];?> </h4>
		<h4> Prijs Per Stuk: €<?php echo $prijsPstuk; ?></h4>
		<h4>Totaal prijs product: €<?php $totaalpp = $aantalproducten[$tel] * $prijsPstuk; echo $totaalpp; $totaal = $totaal + $totaalpp; ?></h4>
		<h4><a class="zwartelink" href="<?php echo $_SERVER['PHP_SELF']; ?>?actiep=wis&productid=<?php echo $productid; ?>">
			<i>Verwijderen?</i>
		</a>
	</h4>
      </div>
    </div>
 </form>
    <hr>
    <?php
	$tel++;
}
$stmt->close();
}
}
}
}  ?>
	  <h1>Totaalbedrag is: €<?php echo $totaal; ?></h1>
	  <?php if(isset($_SESSION["ingelogd"])){ ?>
		  <form id="form2" name="form2" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
			  <button type="submit" name="kopen" class="btn btn-primary" id="sendMessageButton"> Bevestigen
			  </button>
	   </form>

  <?php } else{ ?>
	  <a class="rodelink" href="Inloggen.php"> Je moet eerst ingelogt zijn om te kunnen kopen.</a>
  <?php }} else { ?>

	  <p class='leeg'> Je hebt nog niets gekocht</p>
	  <a href="index.php" class='zwartelink'> Will je terugkeren? </a>

  <?php } ?>
    <hr>


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
  <script src="js/scriptdiangelo.js"></script>
</body>

</html>
