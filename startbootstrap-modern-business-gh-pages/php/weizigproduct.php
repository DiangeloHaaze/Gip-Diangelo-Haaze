<?php
$mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }
else{
		$productid = mysqli_real_escape_string($mysqli,$_SESSION["productid"]);
		$productnaam = mysqli_real_escape_string($mysqli,$_POST["productnaam"]);
		$producttaal = mysqli_real_escape_string($mysqli,$_POST["producttaal"]);
		$prijsPstuk	= mysqli_real_escape_string($mysqli,$_POST["prijsPstuk"]);
		$beschrijving = mysqli_real_escape_string($mysqli,$_POST["beschrijving"]);
		$linkfoto = mysqli_real_escape_string($mysqli,$_POST["linkfoto"]);

	$sql = "
	UPDATE tblproducten SET productnaam = '$productnaam', producttaal = '$producttaal', beschrijving = '$beschrijving', prijsPstuk = '$prijsPstuk', linkfoto = '$linkfoto' WHERE productid = '$productid'";
	if($mysqli->query($sql)==true){
		$gelukt = true;
	}


}
 ?>
