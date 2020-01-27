<?php
$mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }

else
{
			$sql_a = "
			INSERT INTO tblproducten(productnaam, producttaal, soortid, beschrijving, prijsPstuk, linkfoto) (?, ?, ?, ?, ?, ?)";

			if($stmt_a = $mysqli->prepare($sql_a))
			{
				$stmt_a = bind_param("ssisis", $productnaam, $producttaal, $soortid, $beschrijving, $prijsPstuk, $linkfoto);
				$productnaam = mysqli_real_escape_string($mysqli,$_POST["productnaam"]);
				$producttaal = mysqli_real_escape_string($mysqli,$_POST["producttaal"]);
				$soortid = mysqli_real_escape_string($mysqli,$_POST["soort"]);
				$beschrijving = mysqli_real_escape_string($mysqli,$_POST["beschrijving"]);
				$prijsPstuk = mysqli_real_escape_string($mysqli,$_POST["prijsPstuk"]);
				$linkfoto = mysqli_real_escape_string($mysqli,$_POST["linkfoto"]);
				$goedkeuring_a = true;
			}


}
 ?>
