<?php
session_start();
include('php/opzeggenabbo.php');
include('php/itemdisplay.php');
if(isset($_POST["voorkopen"])){
	$kopen = true;
}
if(isset($_POST["kopen"])){
	$compleet = true;
}
if (isset($_POST['aantal'])){
	include('php/inhoudwinkelwagentje.php');
}
 ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>

   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">

   <title>Athena's Game</title>

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
   		  <a class="nav-link" href="producten.php">Producten</a>
   		</li>
   		  <li class="nav-item">
   		  <a class="nav-link" href="Subscribtie.php">Subscriptie</a>
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
 			<a class="dropdown-item" href="eigenfacturen.php">Eigen facturen bekijken</a>
 			<?php
 			//kijkt of de gebruiker een abbonnement heeft
 			if(
 			$_SESSION["klantabbonement"] != 1){ ?>
 			<a class="dropdown-item" href="<?php echo $_SERVER['PHP_SELF']; ?>?opzeggen=goed">Opzeggen abonnement</a>
   			  <?php
 		  }
   			// dit is alleen zichtbaar waneer de gebruiker een admin is.
   			if($_SESSION["adminkey"] == true){?>
   			<a class="dropdown-item" href="toonklanten.php">Gebruikers Bekijken</a>
 			<a class="dropdown-item" href="addproducten.php"> Producten Toevoegen</a>
 			<a class="dropdown-item" href="weizigproducten.php"> Producten Wijzigen</a>
 			<a class="dropdown-item" href="Voegstocktoe.php">Stock toevoegen</a>
 			<a class="dropdown-item" href="bekijk_alle_factuurs.php">Facturen bekijken</a>
   			  <?php } ?>
   		  </div>
   		</li>
   		  <?php
   		  }
   		//hierna word het winkelwagentje getoont. Als er niets is ingevuld dan toont hij niet het aantel producten maar als dit wel zo is geeft hij weer hoeveel er van 1 product aanwezig is in de winkelwagentje.
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
    <h1 class="mt-4 mb-3">
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Home</a>
      </li>
	  <?php
	  if(isset($_GET["actie"]) && $_GET["actie"] == 'doorgang' && isset($_GET["productid"])){

	  	$mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
	  	if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }
	  	else
	  	{

	  		$id = mysqli_real_escape_string($mysqli, $_GET["productid"]);
			$tel = 0;

	  		$sql = "SELECT * FROM tblproducten WHERE productid = '$id'";
	  		$sql_t = "SELECT c.categorie FROM tblcategorieperproduct AS cap, tblcategorie AS c  WHERE cap.categorieid = c.categorieid AND cap.productid = '$id'";

	  	    if($stmt = $mysqli->prepare($sql)){
	  	                if(!$stmt->execute()){
	  	                    echo 'Het uitvoeren van de query is mislukt: '.$stmt->error.' in query: '.$sql;
	  	                }
	  	                else{
	  	                    $stmt->bind_result($productid, $productnaam, $producttaal, $soortid, $beschrijving, $prijsPstuk, $linkfoto,$aantalInStock);
	  	                    while($stmt->fetch()){}
	   ?>
      <li class="breadcrumb-item active"><?php echo $productnaam;?></li>
	  <form action="#"  method="post">
    </ol>
    <div class="row">
      <div class="col-md-8">
        <img class="img-fluid" src="<?php echo $linkfoto; ?>" alt="http://placehold.it/750x500">
      </div>

      <div class="col-md-4">
        <h3 class="my-3"><?php echo $productnaam;?></h3>
        <p><?php include("php/longtext.php"); echo $beschrijving; ?></p>
		<?php if(!(isset($_POST["meertext"]))){ ?>
		<button type="submit" name="meertext" class="btn btn-primary" id="sendMessageButton"> Meer Tekst </button>
	<?php }else{ ?>
		<button type="submit" name="mindertext" class="btn btn-primary" id="sendMessageButton"> Minder Tekst </button>
	<?php } ?>
        <h3 class="my-3">Details</h3>
        <ul>
          <li class="tags">Taal: <?php echo $producttaal; ?></li>
          <li class="tags">Prijs: €<?php echo $prijsPstuk; ?></li>
		  <li class="tagt"> Tags: </li>
		  <?php
	  }
  }

if($stmt_t = $mysqli->prepare($sql_t)){
			if(!$stmt_t->execute()){
				echo 'Het uitvoeren van de query is mislukt: '.$stmt_t->error.' in query: '.$sql_t;
			}
			else{
				$stmt_t->bind_result($categorie);
				while($stmt_t->fetch()){
					$tags[$tel] = $categorie;
					$tel++;
		   ?>
		  <li class="tags"> &nbsp; &nbsp; <?php echo $categorie ?></li>
		  <?php }}} ?>
        </ul>
		<hr>
		<?php if(!(isset($kopen))){
					if($aantalInStock != 0){
					?>
					<button type="submit" name="kopen" class="btn btn-primary" id="sendMessageButton"> Kopen </button><br>
					<span>Aantal Producten:</span>
					<select name="aantal">
						<?php for ($i=1; $i <= $aantalInStock; $i++) {?>
					<option value="<?php echo $i; ?>">--<?php echo $i; ?>--</option>

						<?php }?>
			</select>
				<?php
			}else {
				?>
				<a class="rodelink" href="producten.php"> Dit product is momenteel niet ter beschikking</a>
				<?php
			}

			}
			  	   ?>

			<?php  if(isset($compleet)){ ?>
				<p class='goed'> Wat wilt u vervolgens doen: <br>
			<a href="producten.php" class="aankoopboodschap">doorshoppen</a> of naar uw
			<a href="winkelwagen.php" class="aankoopboodschap"> winkelwagen </a>
		<?php }}} ?>
		</form>

	</div>
	  <div>
    <!-- /.row -->
<!--  -->
 <?php
include('php/related.php');
if(isset($productiden)){
?>
    <h3 class="my-4">Gerelateerde producten</h3>

    <div class="row">
		<?php

		for ($i=0; $i < 4; $i++) {

			?>
		 <div class="col-md-3 col-sm-6 mb-4">
			 <a href="productitem.php?actie=doorgang&productid= <?php echo $productiden["$i"];?>">
  	 		<img class="img-fluid" src="<?php echo $link[$i]; ?>" alt="">
			</a>
		 </div>
	 <?php }} ?>
    </div>
    <!-- /.row -->
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
  <script src="js\scriptdiangelo.js"></script>

</body>

</html>
