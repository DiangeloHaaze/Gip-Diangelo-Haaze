<?php
$mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }

else
{
	$nieuwS = mysqli_real_escape_string($mysqli,$nieuwS);
	
	$productid = mysqli_real_escape_string($mysqli,$productid);

	$sql_j = "UPDATE tblproducten SET AantalInStock = '$nieuwS' where productid = '$productid'";
	if($mysqli->query($sql_j)==true){
		echo '<div class="alert alert-success" role="alert">Het aantal stock is geupdate.</div>';
	}
}




 ?>
