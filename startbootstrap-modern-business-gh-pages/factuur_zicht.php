<?php
session_start();
if(!(isset($_GET["actie"])) && $_GET["actie"] != "doorgang"){
	header("location:index.php");
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
			//kijkt of de gebruiker een abbonnement heeft
			if(
			$_SESSION["klantabbonement"] != 1){ ?>
			<a class="dropdown-item" href="<?php echo $_SERVER['PHP_SELF']; ?>?opzeggen=goed">Opzeggen abbonnement</a>
			  <?php
		  }
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
    <h1 class="mt-4 mb-3">
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Home</a>
      </li>
      <li class="breadcrumb-item active">Games F1</li>
    </ol>
<form name="sentMessage" id="contactForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<table border="1px">
		<?php $mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
		if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }
		else
		{
			$factuurid = $_GET["factuurid"];
			$totaal = 0;

			$sql_b = "SELECT klantid FROM tblfacturen WHERE factuurid = '$factuurid'";
			$res_b = mysqli_query($mysqli, $sql_b);
			if ($res_b->num_rows == 1) {
			while($row = $res_b->fetch_assoc()){
				$klantid = $row["klantid"];
			}
			}

			$sql_a = "SELECT voornaam, achternaam, postcodeid, Straat, straatnummer, email, gebruikersnaam FROM tblklanten WHERE klantid = '$klantid'";
			$res_a = mysqli_query($mysqli, $sql_a);
			if ($res_a->num_rows == 1) {
			while($row = $res_a->fetch_assoc()){
			$vnaam = $row["voornaam"];
			$anaam = $row["achternaam"];
			$email = $row["email"];
			$straat = $row["Straat"];
			$straatnr = $row["straatnummer"];
			$postcodeid = $row["postcodeid"];
			$username = $row["gebruikersnaam"];
			include("php/Rpostcodeid2.php");
		}} ?>
		<tr>
			<td><b>Gebruikersnaam</b></td>
			<td><b>Factuurid</b></td>
			<td><b>Naam</b></td>
			<td><b>Achternaam</b></td>
		</tr>
		<tr>
			<td><?php echo $username; ?></td>
			<td><?php echo $factuurid; ?> </td>
			<td><?php echo $vnaam; ?></td>
			<td><?php echo $anaam; ?></td>
		</tr>
		<tr>
			<td><b>Productnummer</b></td>
			<td><b>Productnaam</b></td>
			<td><b>Prijs</b></td>
			<td><b>Aantal</b></td>
		</tr>
		<?php
	$sql_z = "SELECT p.productid, p.productnaam, fl.Prijsbijaankoop, fl.aantal, fl.korting From tblproducten p, tblfactuurlijnen fl WHERE fl.productid = p.productid AND fl.factuurid = '$factuurid'";
	if($stmt_z = $mysqli->prepare($sql_z)){
				if(!$stmt_z->execute()){
					echo 'Het uitvoeren van de query is mislukt: '.$stmt_z->error.' in query: '.$sql_z;
				}
				else{
					$stmt_z->bind_result($productid,$productnaam,$Prijsbijaankoop,$aantal,$korting);
					while($stmt_z->fetch()){
						$totaal = $totaal + $Prijsbijaankoop;
	 ?>
	 <tr>
	 	<td><?php echo $productid; ?></td>
		<td><?php echo $productnaam; ?></td>
		<td><?php echo $Prijsbijaankoop; ?></td>
		<td><?php echo $aantal; ?></td>
	 </tr>
	 <tr>
 		<td><b>Totaal Prijs</b></td>
 		<td><b>Totaal Aantal</b></td>
 	</tr>
 	<tr>

 		<td><?php
 		echo $totaal; ?></td>
 		<td><?php echo $korting; ?></td>
 	</tr>
	</table>
<?php }}}} ?>
</form>
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
