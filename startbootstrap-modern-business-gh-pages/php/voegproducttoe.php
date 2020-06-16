<?php

$mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }

else
{
	$productnaam = mysqli_real_escape_string($mysqli,$productnaam);
	$beschrijving = mysqli_real_escape_string($mysqli,$beschrijving);
	$prijsperstuk = mysqli_real_escape_string($mysqli,$prijsperstuk);
	$linkfoto = mysqli_real_escape_string($mysqli,$linkfoto);

			$sql_a = "
			INSERT INTO tblproducten(productnaam, taalid, soortid, beschrijving, prijsPstuk, linkfoto,AantalInStock) VALUES ('$productnaam', '$talen', '$soort', '$beschrijving', '$prijsperstuk', '$linkfoto',5)";
			mysqli_query($mysqli, $sql_a);
			$goed = true;
			echo '<div class="alert alert-Success" role="alert">Het product is toegevoegd</div>';
}
 ?>
