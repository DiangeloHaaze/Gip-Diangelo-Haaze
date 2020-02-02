<?php
//
$allesgoed = false;
$foutgpostid = false;
$mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }
else
{
	$mysqli->autocommit(false);
	include("php/postcodeid.php");
	$username = mysqli_real_escape_string($mysqli,$_SESSION["gebruikernaam"]);
	if(isset($pcid)){
	$sql = "
	UPDATE tblklanten SET voornaam = ?, achternaam = ?, postcodeid = ? WHERE gebruikersnaam = '$username'";
	if ($stmt = $mysqli->prepare($sql)) {
		$stmt->bind_param('ssi', $klantvnaam, $klantanaam, $klantpostid);
		$klantvnaam = $_POST["voornaam"];
		$klantanaam = $_POST["achternaam"];
		$klantpostid = $pcid;
	}
		$allesgoed = true;
		$mysqli->commit();
	}
}
// behoort to de webpagina weizigen.php
?>
