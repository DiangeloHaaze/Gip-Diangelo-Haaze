<?php
session_start();
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
		<tr>
			<td> <b>Factuurid</b> </td>
			<td> <b> Datum </b> </td>
			<td> <b> Volledige factuur </b> </td>
		</tr>

<?php $mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }
else
{
	include("php/klantid.php");
	$sql_a = "SELECT factuurid, datum From tblfacturen WHERE klantid = '$id'";
	if($stmt_a = $mysqli->prepare($sql_a)){
				if(!$stmt_a->execute()){
					echo 'Het uitvoeren van de query is mislukt: '.$stmt_a->error.' in query: '.$sql_a;
				}
				else{
					$stmt_a->bind_result($factuurid,$datum);
					while($stmt_a->fetch()){
	?>
	<tr>
		<td> <?php echo $factuurid; ?> </td>
		<td> <?php echo $datum; ?> </td>
		<td> <a href="factuur_zicht.php?actie=doorgang&factuurid=<?php echo $factuurid; ?>">Bekijk</a> </td>
	</tr>
	<?php
}}}}
?>
	</table>
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
