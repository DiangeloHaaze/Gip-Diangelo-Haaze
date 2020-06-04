<?php
$erdoor = true;
for ($z=0; $z < $_SESSION['count']; $z++) {
	$aantalproducten[$z] = $_SESSION["aantal"][$z];
	$productiden[$z] = $_SESSION["koopwaren"][$z];
}

if(isset($_POST["versturen"])){
$mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');

if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }
else
{
	$username = mysqli_real_escape_string($mysqli,$_SESSION["gebruikernaam"]);
	$sql_b = "SELECT klantid FROM tblklanten where gebruikersnaam = '$username'";
	$res = mysqli_query($mysqli, $sql_b);

	if ($res->num_rows == 1) {
	while($row = $res->fetch_assoc()){

	$klantid = $row["klantid"];}
	$datum = date("Y-m-d");
	$sql_a = "INSERT INTO tblfacturen (klantid, datum) VALUES ('$klantid','$datum')";
	mysqli_query($mysqli, $sql_a);

	$sql_c = "SELECT MAX(factuurid) FROM tblfacturen WHERE klantid = '$klantid' && datum = '$datum'";
	$res = mysqli_query($mysqli, $sql_c);
	if ($res->num_rows == 1) {
	while($row = $res->fetch_assoc()){
	$factuurid = $row["MAX(factuurid)"];
	$_SESSION["factuurid"] = $factuurid;
}
}

$totaal = 0;
for ($z=0; $z < $_SESSION['count']; $z++) {

	$sql_c = "SELECT prijsPstuk FROM tblproducten WHERE productid = '$productiden[$z]'";
	$res_prijs = mysqli_query($mysqli, $sql_c);
	if ($res_prijs->num_rows == 1) {
	while($row = $res_prijs->fetch_assoc()){
	$prijsPstuk_kost = $row["prijsPstuk"];
	$totaal = $prijsPstuk_kost;
}
include("php/totaalprijs.php");
}
$sql_d = "INSERT INTO tblfactuurlijnen (productid, factuurid, Prijsbijaankoop, aantal) VALUES ( '$productiden[$z]', '$factuurid', '$totaal', '$aantalproducten[$z]')";
mysqli_query($mysqli, $sql_d);
include("php/Verminderstock.php");
}}}
if($erdoor){
	header("location:factuur_form.php");
}
}
 ?>
