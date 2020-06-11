<?php
session_start();
include('php/opzeggenabbo.php');
if(!isset($_SESSION["adminkey"])){
    header('location:index.php');
}
else{

	if(isset($_POST['versturen2'])){
		include("php/weizigproduct.php");
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
     <h1 class="mt-4 mb-3">Registreren
       <small>Gegevens</small>
     </h1>

     <ol class="breadcrumb">
       <li class="breadcrumb-item">
         <a href="index.php">Home</a>
       </li>
       <li class="breadcrumb-item active">Weizigen</li>
     </ol>



     <div class="row">
       <div class="col-lg-9 mb-4">
         <h3>Wat wilt u weizigen?</h3>

 		<form name="sentMessage" id="contactForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
           <div class="control-group form-group">
             <div class="controls">
 				<?php
				if(!(isset($_POST["versturen"]) && $_POST["productnaam"])){
 				 ?>
				 <div class="control-group form-group">
	               <div class="controls">
	                 <label>Naam van Het Product:</label>
	                 <input type="text" class="form-control" name="productnaam" id="productnaam" value="<?php if(isset($_POST["productnaam"])){echo $_POST["productnaam"];} ?>">
	               </div>
	             </div>
				 <hr>
	             <button type="submit" name="versturen" class="btn btn-primary" id="sendMessageButton">Versturen</button><br><br>
 	  <?php }else{
		  $mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
		  if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }

		  else
		  {
			  $productnaam = mysqli_real_escape_string($mysqli,$_POST["productnaam"]);
			  $sql_a = "SELECT productnaam, producttaal, beschrijving, prijsPstuk, linkfoto FROM tblproducten WHERE productnaam LIKE '$productnaam'";

			  if($stmt = $mysqli->prepare($sql_a)){
						  if(!$stmt->execute()){
							  echo 'Het uitvoeren van de query is mislukt: '.$stmt->error.' in query: '.$sql;
						  }
						  else{
							  $stmt->bind_result($productnaam, $producttaal, $beschrijving,$prijsPstuk, $linkfoto);
							  while($stmt->fetch()){
	  ?>
	  		<span>Productnaam:</span><br>
			<input type="text" class="form-control" name="productnaam2" value="<?php if (isset($_POST["productnaam2"])){echo $_POST["productnaam2"];}else {echo $productnaam;}?>">
			<span>ProductTaal:</span><br>
			<input type="text" class="form-control" name="producttaal" value="<?php if (isset($_POST["producttaal"])){echo $_POST["producttaal"];}else {echo $producttaal;}?>">
			<span>Beschrijving:</span><br>
			<textarea name="beschrijvings" rows="8" cols="80"><?php if (isset($_POST["beschrijvings"])){echo $_POST["beschrijvings"];}else {echo $beschrijving;}?></textarea><br>
			<span>Prijs Per Stuk:</span><br>
			<input type="text" class="form-control" name="prijsPstuk" value="<?php if (isset($_POST["prijsPstuk"])){echo $_POST["prijsPstuk"];}else {echo $prijsPstuk;}?>">
			<span>Link naar foto:</span><br>
			<input type="text" class="form-control" name="linkfoto" value="<?php if (isset($_POST["linkfoto"])){echo $_POST["linkfoto"];}else {echo $linkfoto;}?>">
			<hr>
			<button type="submit" name="versturen2" class="btn btn-primary" id="sendMessageButton">Versturen</button><br><br>
  <?php }}}}} ?>
          </form>
       </div>

     </div>
 	</div>
     <!-- /.row -->

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

   <!-- Contact form JavaScript -->
   <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
   <script src="js/jqBootstrapValidation.js"></script>

   <!-- Javascript voor paswoord -->
   <script src="js/paswoordvalidatie.js"></script>
   <script src="js/foutcontrole.js"></script>
 </body>

 </html>
