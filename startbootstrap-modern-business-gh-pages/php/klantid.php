<?php
$username = $_SESSION["gebruikernaam"];
$mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }
else
{
	$sql_f = "SELECT klantid FROM tblklanten WHERE gebruikersnaam = '$username'";
	$res_f = mysqli_query($mysqli, $sql_f);

	if ($res_f->num_rows == 1) {
	while($row = $res_f->fetch_assoc()){

	$id = $row["klantid"];}
}

}
 ?>
