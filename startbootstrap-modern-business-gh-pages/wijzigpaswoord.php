<?php
session_start();
include('php/opzeggenabbo.php');
if(!(isset($_SESSION["gebruikernaam"]))){
	header('location:index.php');
}
else{
	include("php/nieuwpaswoord.php");
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
   <link href="css/GIPstyle.css" rel="stylesheet">
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
 			<a class="dropdown-item" href="<?php echo $_SERVER['PHP_SELF']; ?>?opzeggen=goed">Opzeggen Subscriptie</a>
   			  <?php
 		  }
   			// dit is alleen zichtbaar waneer de gebruiker een admin is.
   			if($_SESSION["adminkey"] == true){?>
   			<a class="dropdown-item" href="toonklanten.php">Gebruikers Bekijken</a>
 			<a class="dropdown-item" href="addproducten.php"> Producten Toevoegen</a>
 			<a class="dropdown-item" href="weizigproducten.php"> Producten Wijzigen</a>
 			<a class="dropdown-item" href="Voegstocktoe.php">Stock toevoegen</a>
 			<a class="dropdown-item" href="bekijk_alle_factuurs.php">Facturen bekijken</a>
 			<a class="dropdown-item" href="voegcategorie_toe.php">Categorieen</a>
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
    <h1 class="mt-4 mb-3">Weizigen
      <small>Paswoord</small>
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Home</a>
      </li>
      <li class="breadcrumb-item active">Weizigen</li>
    </ol>
	<div class="row">
	  <div class="col-lg-9 mb-4">
		<h3>Wijzigen Paswoord</h3><br>
		<form name="sentMessage" id="contactForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

		  <div class="control-group form-group">
		  <div class="controls">
			<label>Huidig Paswoord:</label>
			<input type="password" class="form-control" name="oudpaswoord" id="oudpaswoord" >
		  </div>
		</div>
			<div class="control-group form-group">
			<div class="controls">
			  <label>nieuw paswoord:</label>
			  <input type="password" class="form-control" name="nieuwpaswoord" id="paswoord">
			</div>
		  </div>
		  <div id="message">
			<h3>Het paswoord moet minstens :</h3>
			<p id="letter" class="fout">Een <b>Kleine</b> letter</p>
			<p id="capital" class="fout">Een <b>Hoofdletter</b></p>
			<p id="number" class="fout">Een <b>nummer</b></p>
			<p id="length" class="fout">Minimum <b>8 karakters</b></p>
		  </div>

			<div class="control-group form-group">
			<div class="controls">
			  <label>Bevestig nieuw paswoord:</label>
			  <input type="password" class="form-control" name="bnieuwpaswoord" id="bnieuwpaswoord">
			  </div>
			  </div>
			  <button type="submit" name="versturen" class="btn btn-primary" id="sendMessageButton">Versturen</button><br>
		  </form>
</div>
</div>
</div>



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

  <!-- Contact form JavaScript -->
  <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
  <script src="js/jqBootstrapValidation.js"></script>

  <!-- Javascript voor paswoord -->
  <script src="js/paswoordvalidatie.js"></script>
  <script src="js/foutcontrole.js"></script>
</body>

</html>
