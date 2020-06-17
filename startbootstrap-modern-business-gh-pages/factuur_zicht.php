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
    <h1 class="mt-4 mb-3">
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Home</a>
      </li>
      <li class="breadcrumb-item active">Factuur</li>
    </ol>
<form name="sentMessage" id="contactForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<table border="1px">
		<tr>
			<td><b>Factuurid</b></td>
		</tr>
		<tr>
			<?php echo '<td>'.$_GET["factuurid"].'</td>' ?>
		</tr>
		<tr>
			<td><b>Gebruikersnaam</b></td>
			<td><b>Voornaam</b></td>
			<td><b>Achternaam</b></td>
			<td><b>Email</b></td>
		</tr>
		<?php
	   $totaal = 0;
	   $mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
	   if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }
	   else
	   {
		   $factuurid = $_GET["factuurid"];
		   $sql_a = "SELECT * FROM tblfacturen f, tblklanten k WHERE k.klantid = f.klantid AND f.factuurid = '$factuurid'";

		   $res_a = mysqli_query($mysqli, $sql_a);

		   if ($res_a->num_rows == 1) {
		   while($row = $res_a->fetch_assoc()){
			   $klantid = $row["klantid"];
			   $soortklant = $row["soortklant"];
			   echo "<tr><td>".$row["gebruikersnaam"]."</td>";
			   echo "<td>".$row["voornaam"]."</td>";
			   echo "<td>".$row["achternaam"]."</td>";
			   echo "<td>".$row["email"]."</td>";
			   echo "</tr>";
		   }
	   }


		 ?>
		<tr>
			<td><b>Gemeente</b></td>
			<td><b>Postcode</b></td>
			<td><b>Straat</b></td>
			<td><b>Straatnummer</b></td>
		</tr>
		<?php
		$sql_b = "SELECT * FROM tblgemeente p, tblklanten k WHERE k.postcodeid = p.postcodeid AND k.klantid = '$klantid'";

		$res_b = mysqli_query($mysqli, $sql_b);

		if ($res_b->num_rows == 1) {
		while($row = $res_b->fetch_assoc()){

			echo "<tr><td>".$row["gemeente"]."</td>";
			echo "<td>".$row["postcode"]."</td>";
			echo "<td>".$row["Straat"]."</td>";
			echo "<td>".$row["straatnummer"]."</td>";
			echo "</tr>";
		}
	}

		 ?>
		<tr>
			<td><b>Productnummer</b></td>
			<td><b>Productnaam</b></td>
			<td><b>Prijs Per Stuk</b></td>
			<td><b>Aantal</b></td>
			<td><b>Subtotaal</b></td>
			<?php

     $sql_c = "SELECT p.*, fl.* FROM tblfacturen f, tblfactuurlijnen fl, tblproducten p WHERE f.factuurid = fl.factuurid AND fl.productid = p.productid AND f.factuurid = '$factuurid'";

			$res_c = mysqli_query($mysqli, $sql_c);

			while($row = $res_c->fetch_assoc()){

				echo "<tr><td>".$row["productid"]."</td>";
				echo "<td>".$row["productnaam"]."</td>";
				$subtotaal = $row["Prijsbijaankoop"] / $row["aantal"];
				echo "<td>".$subtotaal."</td>";
				echo "<td>".$row["aantal"]."</td>";
				echo "<td>".$row["Prijsbijaankoop"]."</td>";
				$totaal = $totaal + $row["Prijsbijaankoop"];
				echo "</tr>";
			}



}
			 ?>
		</tr>
		<tr>
			<td> <b>Subtotaal(alles)</b> </td>
			<td> <b>Korting</b> </td>
			<td> <b>Totaal</b> </td>
		</tr>
		<tr>
			<?php
			echo "<tr><td>".$totaal."</td>";
			switch ($soortklant) {
				case 2:
				echo "<td>5%</td>";
				$totaal = $totaal - ($totaal*0.05);
				echo "<td>".$totaal."</td>";
					break;
				case 3:
				echo "<td>10%</td>";
				$totaal = $totaal - ($totaal*0.1);
				echo "<td>".$totaal."</td>";
					break;
				case 4:
				echo "<td>20%</td>";
				$totaal = $totaal - ($totaal*0.2);
				echo "<td>".$totaal."</td>";
					break;
				default:
				echo "<td>0%</td>";
				echo "<td>".$totaal."</td>";
					break;
			}
			echo "</tr>";
			 ?>
		</tr>
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
