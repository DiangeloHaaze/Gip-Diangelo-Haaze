<?php
$mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }

else
{
	$productnaam = mysqli_real_escape_string($mysqli,$productnaam);
	$producttaal = mysqli_real_escape_string($mysqli,$producttaal);
	$beschrijving = mysqli_real_escape_string($mysqli,$beschrijving);
	$prijsperstuk = mysqli_real_escape_string($mysqli,$prijsperstuk);
	$linkfoto = mysqli_real_escape_string($mysqli,$linkfoto);
	$soort = mysqli_real_escape_string($mysqli,$soort);

			$sql_a = "
			INSERT INTO tblproducten(productnaam, producttaal, soortid, beschrijving, prijsPstuk, linkfoto) VALUES ('$productnaam', '$producttaal', '$soort', '$beschrijving', '$prijsperstuk', '$linkfoto')";
			mysqli_query($mysqli, $sql_a);
}
 ?>
