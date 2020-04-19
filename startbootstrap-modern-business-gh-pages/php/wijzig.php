<?php
//
$allesgoed = false;
$foutgpostid = false;
$mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }
else
{
	include("php/postcodeid.php");
	$username = mysqli_real_escape_string($mysqli,$_SESSION["gebruikernaam"]);
	$klantvnaam = mysqli_real_escape_string($mysqli,$_POST["voornaam"]);
	$klantanaam = mysqli_real_escape_string($mysqli,$_POST["achternaam"]);
	$klantstraat = mysqli_real_escape_string($mysqli,$_POST["Straat"]);
	$klantstraatnr = mysqli_real_escape_string($mysqli,$_POST["straatnr"]);
	if(isset($pcid)){
	$sql = "
	UPDATE tblklanten SET voornaam = '$klantvnaam', achternaam = '$klantanaam', postcodeid = '$pcid', Straat = '$klantstraat', straatnummer = '$klantstraatnr' WHERE gebruikersnaam = '$username'";
	if($mysqli->query($sql)==true){
		$allesgoed = true;
	}

	}
}
// behoort to de webpagina weizigen.php
?>
