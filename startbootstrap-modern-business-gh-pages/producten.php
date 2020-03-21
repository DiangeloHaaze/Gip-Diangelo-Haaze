<?php
$leeg = 0;
session_start();
if(isset($_POST["versturen"])){

$term = trim($_POST['zoekterm']);
    if($_POST['categorie'] == 'start' &&  $term == "" && $_POST['soort'] == 'start' && $_POST['rangorde'] == 'start'){
    $fout = true;
    }
    if(!isset($fout)){
    $zoeker = true;
    }
}
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
  <link href="css/gipstyle.css" rel="stylesheet">
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
		  <a class="nav-link" href="producten.php">Producten</a>
		</li>
		<li class="nav-item">
			  <a class="nav-link" href="test.php">test</a>
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
		  <a class="nav-link" href="Inloggen.php">Inloggen</a>
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
			<a class="dropdown-item" href="wijzigpaswoord.php">Aanpassen wachtwoord</a>
			  <?php
			// dit is alleen zichtbaar waneer de gebruiker een admin is.
			if($_SESSION["adminkey"] == true){?>
			<a class="dropdown-item" href="toonklanten.php">Gebruikers Bekijken</a>
			<a class="dropdown-item" href="addproducten.php"> Producten Toevoegen</a>
			<a class="dropdown-item" href="weizigproducten.php"> Producten Wijzigen</a>
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

      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		  <select name="rangorde">
		  <option value="start">--Kies een ranschikking--</option>
          <option value="AZ">--Geranschikt van A naar Z--</option>
          <option value="ZA">--Geranschikt van Z naar A--</option>
          <option value="HL">--Prijzen van hoog naar laag--</option>
		  <option value="LH">--Prijzen van laag naar hoog--</option>
        </select>
		<select name="soort">
		<option value="start">--Kies een Soort--</option>
          <?php
			  $mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
			  if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }

			  else
			  {

			      $sql = "SELECT * FROM tblcategorie";
			  	$sql_s = "SELECT * FROM tblsoorten";
			  			if($stmt_s = $mysqli->prepare($sql_s)){
			  		                if(!$stmt_s->execute()){
			  		                    echo 'Het uitvoeren van de query is mislukt: '.$stmt_s->error.' in query: '.$sql_s;
			  		                }
			  		                else{
			  		                    $stmt_s->bind_result($soortid, $soort);
			  		                    while($stmt_s->fetch()){
			  ?>
          <option value="<?php echo $soortid; ?>">--<?php echo $soort; ?>--</option>
          <?php }}} ?>
        </select>
        <select name="categorie">
        <option value="start">--Kies een Categorie--</option>
        <?php
			if($stmt = $mysqli->prepare($sql)){
						if(!$stmt->execute()){
							echo 'Het uitvoeren van de query is mislukt: '.$stmt->error.' in query: '.$sql;
						}
						else{
							$stmt->bind_result($categorieid, $categorie);
							while($stmt->fetch()){
			?>
        <option value="<?php echo $categorieid; ?>">--<?php echo $categorie; ?>--</option>
	<?php }}} ?>
        </select>
          &nbsp;
          <input type="text" name="zoekterm" id="zoekterm" value="<?php if(isset($_POST['zoekterm'])){echo $_POST['zoekterm']; } ?>">
        &nbsp;
        &nbsp;
        <button type="submit" name="versturen" class="btn btn-primary" id="sendMessageButton">Versturen</button>
        <?php if(isset($fout)){ ?> <p class="fout">je hebt niets ingevuld</p>  <?php } ?>
        <br><hr>
        </form>

      <?php

		  if(isset($zoeker)){
			  include('php/zoekkeuzes.php');
		  }
		  else{
			  $sql = "SELECT * FROM tblproducten";
		  }

	      if($stmt = $mysqli->prepare($sql)){
	                  if(!$stmt->execute()){
	                      echo 'Het uitvoeren van de query is mislukt: '.$stmt->error.' in query: '.$sql;
	                  }
	                  else{
	                      $stmt->bind_result($productid, $productnaam, $producttaal, $soortid, $beschrijving, $prijsPstuk, $linkfoto);
	                      while($stmt->fetch()){ $leeg++;
        ?>
	<form action="productitem.php?actie=" method="post">
    <div class="row">
      <div class="col-md-7">
        <a href="productitem.php?actie=doorgang&productid=<?php echo $productid;?>">
          <img class="fotos" src="<?php echo $linkfoto ?>" alt="http://placehold.it/700x300">
        </a>
      </div>
      <div class="col-md-5">
        <h3><?php echo $productnaam ." (" . $producttaal.")"; ?></h3>
        <p><?php include("php/longtext.php");
				 echo $beschrijving;
		?></p>
        <a class="btn btn-primary" href="productitem.php?actie=doorgang&productid=<?php echo $productid;?>">Zie product
          <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
      </div>
    </div>
 </form>
    <hr>
    <?php
						}
						if($leeg == 0){
?> <p class="fout">Er zijn geen producten die je wenst beschikbaar.</p> <?php
						}

						$stmt->close();
					}

				}
				else{
					echo "fout";
				}

	}
      ?>
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

</body>

</html>
