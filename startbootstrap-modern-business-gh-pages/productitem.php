<?php
session_start();
include('php/itemdisplay.php');
include('php/related.php');
if(isset($_POST["voorkopen"])){
	$kopen = true;
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

  <title>athenagames</title>

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
  			  if(isset($_SESSION["adminkey"])){?>
  			  <a class="dropdown-item" href="toonklanten.php">Gebruikers bekijken</a>
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
    <h1 class="mt-4 mb-3">
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Home</a>
      </li>
      <li class="breadcrumb-item active"><?php echo $product;?></li>
    </ol>

    <!-- Portfolio Item Row -->
    <div class="row">

      <div class="col-md-8">
        <img class="img-fluid" src="<?php echo $foto; ?>" alt="http://placehold.it/750x500">
      </div>

      <div class="col-md-4">
        <h3 class="my-3"><?php echo $product;?></h3>
        <p><?php echo $beschrijving; ?></p>
        <h3 class="my-3">Details</h3>
        <ul>
          <li class="tags">Taal: <?php echo $taal; ?></li>
          <li class="tags">Prijs: €<?php echo $prijs; ?></li>
		  <li class="tagt"> Tags: </li>
		  <?php for ($i=0; $i < $tel ; $i++) { ?>
		  <li class="tags"> &nbsp; &nbsp; <?php echo $tags[$i] ?></li>
	  <?php } ?>
        </ul>
		<hr>
			<form action="#"  method="post">
			<?php if(!(isset($kopen))){?>
				<button type="submit" name="voorkopen" class="btn btn-primary" id="sendMessageButton">Kopen</button>
			<?php } ?>
			<?php if(isset($kopen)){?>
				<button type="submit" name="kopen" class="btn btn-primary" id="sendMessageButton"> Kopen </button>
				<select name="aantal">
					<option value="1">--1--</option>
					<option value="2">--2--</option>
					<option value="3">--3--</option>
					<option value="4">--4--</option>
					<option value="5">--5--</option>
				</select>


			<?php } ?>
		</form>

	</div>
	  <div>
    <!-- /.row -->
<!--  -->
    <h3 class="my-4">gerelateerde producten</h3>

    <div class="row">
	<?php
		//
		$tellt = 0;
		if(isset($tags)){
		$mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
		if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }
		else
		{
			for ($i=0; $i < $tel; $i++) {
				$querries[$i] = "SELECT p.linkfoto, p.productid From tblcategorieperproduct AS cap, tblproducten AS p, tblcategorie as c WHERE p.productid = cap.productid AND c.categorieid = cap.categorieid Group by p.linkfoto, p.productid, c.categorie HAVING c.categorie = '$tags[$i]' AND NOT p.productid = '$productid'";
			}
			foreach ($querries as $querrie) {

				if($stmt = $mysqli->prepare($querrie)){
					if (!$stmt->execute()) {
						$error = "Fout";
					}
					else{
						$stmt->bind_result($linkfoto, $productid);
						while($stmt->fetch()){
								$link[$tellt] = $linkfoto;
								$productiden[$tellt] = $productid;
								$link = array_unique($link);
								$productiden = array_unique($productiden);
								if ( sizeof($link) != $tellt) {
									$tellt++;
	 ?>
      <div class="col-md-3 col-sm-6 mb-4">
        <a href="productitem.php?actie=doorgang&productid= <?php echo $productid;?>">
          <img class="img-fluid" src="<?php echo $linkfoto; ?>" alt="">
        </a>
      </div>
  <?php}}}}}}}?>
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
