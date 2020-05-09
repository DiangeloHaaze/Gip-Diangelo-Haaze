<?php
session_start();
if(!(isset($_GET["actie"]))){
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
    <h1 class="mt-4 mb-3">
      <small>Prijs subscriptie</small>
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.html">Start</a>
      </li>
      <li class="breadcrumb-item active">Facturatie Subscribtie</li>
    </ol>

    <!-- Content Row -->
	<?php if(isset($_SESSION["ingelogd"])){ ?>
	<div class="factuuritem">

		<span class="factuurtext"> Keuze abbonement:</span><br>
		<?php switch($_GET["actie"]){
			case 'doorgang1':
				?>
				<span class="factuurtext"> Basis abbonement: €5.99</span><br>
				<?php
				break;
			case 'doorgang2':
				?>
				<span class="factuurtext"> Plus abbonement: €10.99</span><br>
				<?php
				break;
			case 'doorgang3':
				?>
				<span class="factuurtext"> Ultra abbonement: €20.99</span><br>
				<?php
				break;
		} ?>
	</div>
	<?php
	$mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
	if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }
		else
			{
			$username = mysqli_real_escape_string($mysqli,$_SESSION["gebruikernaam"]);
			$sql = "SELECT voornaam, achternaam, postcodeid, email FROM tblklanten where gebruikersnaam = '$username'";
			if($stmt = $mysqli->prepare($sql)){
					if(!$stmt->execute()){
						echo 'Het uitvoeren van de query is mislukt: '.$stmt->error.' in query: '.$sql;
					}
					else{
						$stmt->bind_result($voornaam, $achternaam, $postcodeid,$email);
						while($stmt->fetch()){
							include("php/Rpostcodeid2.php");
	?>
	<div class="factuuritem">
		<h2>Uw Contactgegevens:</h2><br>
		<span class="factuurtext">Voornaam: <?php echo $voornaam; ?></span><br>
		<span class="factuurtext">Achternaam: <?php echo $achternaam; ?></span><br>
		<span class="factuurtext">Gemeente: <?php echo $gemeente; ?></span><br>
		<span class="factuurtext">Postcode: <?php echo $postcode; ?></span><br>
		<span class="factuurtext">Email adres: <?php echo $email; ?></span>
		<br>
		<a href="weizigen.php" class="factuurlink">Aanpassen</a>
	</div>
<?php }}} }?>
<br>
<button type="submit" name="bevestigen" class="btn btn-primary" id="sendMessageButton">Bevestigen</button><br><br>
<?php }else {
	?>
	<a class="rodelink" href="Inloggen.php"> Je moet eerst ingelogt zijn om dit te kunnen kopen.</a><br><br>
	<?php
} ?>
    <!-- /.row -->

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
