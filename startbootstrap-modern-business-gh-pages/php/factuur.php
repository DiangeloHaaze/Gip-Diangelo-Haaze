<?php
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
	$datum = date("d/m/Y");
	$sql_a = "INSERT INTO tblfacturen (klantid, datum) VALUES ('$klantid','$datum')";
	mysqli_query($mysqli, $sql_a);

	$sql_c = "SELECT factuurid FROM tbltblfacturen WHERE klantid = '$klantid' && datum = '$datum'";

//max
}}}
 ?>
