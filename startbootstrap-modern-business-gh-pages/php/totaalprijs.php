<?php
$mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }
else
{
	$sql_d = "SELECT klantabonnement FROM tblklanten WHERE gebruikersnaam = '$username'";

	$res_d = mysqli_query($mysqli, $sql_d);

	if ($res_d->num_rows == 1) {
	while($row = $res_d->fetch_assoc()){
		$klantabonnement_a = $row["klantabonnement"];
		switch ($klantabonnement_a) {
			case '2':
				$totaal = $totaal - ($totaal*0.05);
				$korting = "5%";
				break;
			case '3':
				$totaal = $totaal - ($totaal*0.1);
				$korting = "10%";
				break;
			case '4':
				$totaal = $totaal - ($totaal*0.2);
				$korting = "20%";
				break;

			default:
				$totaal = $totaal - ($totaal*0);
				$korting = "0%";
				break;
		}
}

}}
$totaal = ($totaal * $_SESSION["aantal"][$z]);
$_SESSION["Totaal"] = $totaal;
$_SESSION["Korting"] = $korting;

 ?>
