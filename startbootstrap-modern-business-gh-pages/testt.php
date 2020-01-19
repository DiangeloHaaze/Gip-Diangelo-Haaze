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

  <title>Athena's Game</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <!-- opmaak gemaakt door diangelo -->
  <link href="css/diangelostyle.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">
	<style>
	.registratie{
		float: none;
		right: 300px;
	}
	</style>


</head>

<body>

  <!-- navigatie -->
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
             <?php if(!isset($_SESSION["ingelogd"])){ ?>
          <li class="nav-item">
            <a class="nav-link" href="registreer.php">Registreer</a>
          </li>
            <li class="nav-item">
            <a class="nav-link" href="Inloggen.php">inloggen</a>
          </li>
            <?php } else{ ?>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo $_SESSION["gebruikernaam"]; ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
              <a class="dropdown-item" href="Weizigen.php">Aanpassen</a>
              <a class="dropdown-item" href="php/uitloggen.php">Uitloggen</a>
                <?php if($_SESSION["adminkey"] == true){?>
              <a class="dropdown-item" href="toonklanten.php">Gebruikers bekijken</a>
                <?php } ?>
            </div>
          </li>
            <?php
            }
            ?>
		  <li class="nav-item">
              <a class="notification" href="winkelwagen.php"><span class="glyphicon">&#x1f6d2;</span><span class="badge"><?php if($_SESSION["count"] != 0){echo $_SESSION["count"];} ?></span></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<?php
    //gaan naar start na het inloggen
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
      <!-- Map Column -->



	  inlogpagina:
  	</p>
  	</div>
  	<form name="inlogpagina" id="myForm" method="post" action="toetsformuliercontrolemetphpopzelfdepagina.php">
  	<table cellspacing="4" class="registratie">
  	<tr>
  	<td><label for="naam">Naam:</label></td>
  	<td><input type="text" name="naam" id="naam"></td>
  	<td><label id="naamVerplicht" class="fout"></label></td>
  	</tr>
  	<tr>
  	<tr>
  	<td><label for="paswoord">paswoord:</label></td>
  	<td><input type="password" name="paswoord" id="paswoord"  ></td>
  	<td><label id="paswoordControle" class="fout"></label><label id="paswoordVerplicht" class="fout"></label></td>
  	</tr>
  	<tr>
  	<td><label for="paswoordConfirm">bevestiging paswoord:</label></td>
  	<td><input type="password" name="paswoordConfirm" id="paswoordConfirm"  ></td>
  	<td><label id="paswoordConfirmControle" class="fout"></label><label id="paswoordConfirmVerplicht" class="fout"></label></td>
  	</tr>
  	<tr>
  	<td></td>
  	<td>
  	<input type="button" value="inloggen" onclick="wijzig()" />
  	</td>
  	</tr>
  	</table>
  	</form>
  	</body>
  	</html>

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
