<?php
$foutgpostid = false;
$mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }
else
{
	include("php/postcodeid.php");
	$klantvnaam = mysqli_real_escape_string($mysqli,$_POST["voornaam"]);
	$klantanaam = mysqli_real_escape_string($mysqli,$_POST["achternaam"]);
	$klantstraat = mysqli_real_escape_string($mysqli,$_POST["Straat"]);
	$klantstraatnr = mysqli_real_escape_string($mysqli,$_POST["straatnr"]);
	if(isset($pcid)){
	$sql = "
	UPDATE tblklanten SET voornaam = '$klantvnaam', achternaam = '$klantanaam', postcodeid = '$pcid', Straat = '$klantstraat', straatnummer = '$klantstraatnr' WHERE gebruikersnaam = '$username'";
	if($mysqli->query($sql)==true){
		echo '<div class="alert alert-success" role="alert">Alles is correct geupdate.</div>';
	}

	}
	else{
		echo '<div class="alert alert-danger" role="alert">De combinatie van postcode en gemeente zijn niet correct. </div>';
	}
}
// behoort to de webpagina weizigen.php
?>
