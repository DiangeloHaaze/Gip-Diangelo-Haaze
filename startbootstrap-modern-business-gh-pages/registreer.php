<?php
//de pagina die ervoor zorgt dat een klant zich kan registreren en deze nieuwe klant dan ook opslaat in de databank.
session_start();
$foutreg = 0;

if(isset($_POST["versturen"])){
include('php/foutcontrole.php');
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

<?php
    //bij succesvol inloggen komt de gebruiker terug naar de beginpagina.
    if(isset($_SESSION["ingelogd"])){header("location:index.php");}
    ?>
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
      <li class="breadcrumb-item active">Registratie</li>
    </ol>



    <div class="row">
      <div class="col-lg-9 mb-4">
        <h3></h3>
        <form name="sentMessage" id="contactForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          <div class="control-group form-group">
            <div class="controls">
              <label>Voornaam:</label>
              <input type="text" class="form-control" name="voornaam" id="voornaam" value="<?php if(isset($_POST["voornaam"])){echo $_POST["voornaam"];} ?>">
			  <?php if(isset($foutvoornaam)){ ?>
				  <p class="fout">Er is een fout bij voornaam</p>
			  <?php } ?>
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Achternaam:</label>
              <input type="text" class="form-control" name="achternaam" id="achternaam" value="<?php if(isset($_POST["achternaam"])){echo $_POST["achternaam"];} ?>">
			  <?php if(isset($foutachternaam)){ ?>
				  <p class="fout">Er is een fout bij achternaam</p>
			  <?php } ?>
            </div>
          </div>
		  <div class="control-group form-group">
		  <div class="controls">
			<label>Postcode:</label>
			<input type="text" class="form-control" name="postcode" title="Moet bestaan uit 4 cijfers" value="<?php if(isset($_POST['postcode'])){echo $_POST['postcode'];} ?>" id="postcode" >
			<?php if(isset($foutingpostcode)){ ?>
				<p class="fout">Er is een fout bij postcode</p>
			<?php } ?>
		  </div>
		</div>
            <div class="control-group form-group">
            <div class="controls">
              <label>Gemeente:</label>
              <input type="text" class="form-control" name="gemeente" id="gemeente" value="<?php if(isset($_POST["gemeente"])){echo $_POST["gemeente"];} ?>">
			  <?php if(isset($foutgemeente)){ ?>
				  <p class="fout">Er is een fout bij gemeente</p>
			  <?php } ?>
            </div>
          </div>

            <div class="control-group form-group">
            <div class="controls">
              <label>Gebruikersnaam:</label>
              <input type="text" class="form-control" name="gebruikersnaam" value="<?php if(isset($_POST['gebruikersnaam'])){echo $_POST['gebruikersnaam'];} ?>" id="gebruikersnaam" >
			  <?php if(isset($foutgebruiker)){ ?>
				  <p class="fout">Er is een fout bij gebruikersnaam</p>
			  <?php } ?>
            </div>
          </div>
            <div class="control-group form-group">
            <div class="controls">
              <label>Email:</label>
              <input type="email" class="form-control" name="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>" id="email">
			  <?php if(isset($foutemail)){ ?>
				  <p class="fout">Er is een fout bij e-mail</p>
			  <?php } ?>
            </div>
          </div>
            <div class="control-group form-group">
            <div class="controls">
              <label>Paswoord:</label>
               <input type="password" class="form-control" name="paswoord" id="paswoord" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Moet minstens 1 hoofdletter, 1 kleine letter, 1 cijfer en moet minstens 8 letters groot zijn">
			   <?php if(isset($foutpaswoord)){ ?>
 				  <p class="fout">Er is een fout bij Paswoord</p>
 			  <?php } ?>
            </div>
            </div>
            <div id="message">
              <h3>Het wachtwoord moet minstens :</h3>
              <p id="letter" class="fout">Een <b>Kleine</b> letter</p>
              <p id="capital" class="fout">Een <b>Hoofdletter</b></p>
              <p id="number" class="fout">Een <b>nummer</b></p>
              <p id="length" class="fout">Minimum <b>8 karakters</b></p>
            </div>
			<div class="control-group form-group">
            <div class="controls">
              <label>Bevestiging Paswoord:</label>
               <input type="password" class="form-control" name="confirmpaswoord" id="confirmpaswoord">
			   <?php if(isset($foutconfirmpasswoord)){ ?>
 				  <p class="fout">Er is een fout bij Bevestiging Paswoord</p>
 			  <?php } ?>
            </div>
            </div>
            <?php
			//toont weer welke foutboodschap er moet komen als men een al bestaande gebruikersnaam of email invoerden. Ook is er een boodschap als allebij al bestaan.
                 switch($foutreg){
                     case 1: ?>
                          <p class="fout"> Je hebt een email en gebruikersnaam ingegeven die al bestaan </p>
                         <?php break;
                     case 2: ?>
                         <p class="fout"> Je hebt een gebruikersnaam ingegeven die al bestaat</p>
                         <?php break;
                     case 3: ?>
                         <p class="fout"> Je hebt een email ingegeven die al bestaat</p>
                        <?php  break;
                 }
                 ?>
			<?php

			 ?>
          <div id="success"></div>
          <button type="submit" name="versturen" class="btn btn-primary" id="sendMessageButton">Versturen</button>
         </form>
      </div>

    </div>
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

  <!-- Contact form JavaScript -->
  <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
  <script src="js/jqBootstrapValidation.js"></script>

  <!-- Javascript voor paswoord -->
  <script src="js/paswoordvalidatie.js"></script>
  <script src="js/foutcontrole.js"></script>
</body>

</html>
