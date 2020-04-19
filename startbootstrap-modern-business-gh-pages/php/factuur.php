<?php
for ($y=0; $y < $_SESSION['count']; $y++) {
	$aantalproducten[$y] = $_SESSION["aantal"][$y];
	$productiden[$y] = $_SESSION["koopwaren"][$y];
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
}
}


for ($y=0; $y < $_SESSION['count']; $y++) {

	$sql_c = "SELECT prijsPstuk FROM tblproducten WHERE productid = '$productiden[$y]' ";
	$res_prijs = mysqli_query($mysqli, $sql_c);
	if ($res_prijs->num_rows == 1) {
	while($row = $res_prijs->fetch_assoc()){
	$prijsPstuk_kost = $row["prijsPstuk"];
}

}
$sql_d = "INSERT INTO tblfactuurlijnen (productid, factuurid, Prijsbijaankoop, aantal) VALUES ( '$productiden[$y]', '$factuurid', '$prijsPstuk_kost', '$aantalproducten[$y]') ";
mysqli_query($mysqli, $sql_d);
}}}
header("location:factuur_form.php");
}
 ?>
