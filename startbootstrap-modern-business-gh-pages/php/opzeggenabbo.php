<?php
if( isset($_GET["opzeggen"]) && $_GET["opzeggen"] == "goed"){
$mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }
else
{
$username = $_SESSION["gebruikernaam"];
$sql = "UPDATE tblklanten SET klantabonnement = '1' WHERE gebruikersnaam = '$username'";
if($mysqli->query($sql)==true){
	$_SESSION["klantabbonement"] = 1;
}
}
}
 ?>
