<?php
// Pagina waarbij een gebruiker die al is ingelogd zich terug kan inloggen met zijn of haar gegevens. Hier Word er gecontroleerd of de gebruiker wel of niet bestaat in de databank en de gegevens dan doorvoert naar de gepaste sessie voorwaarden.
if(isset($_POST["versturen"]) && isset($_POST["gebruikersnaam"]) && $_POST["gebruikersnaam"] != ""  && $_POST["paswoord"] && isset($_POST["paswoord"])){
$mysqli= mysqli_connect("localhost","root","","athenagames");
if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error);}
else
{
  	$gebruikersnaam = mysqli_real_escape_string($mysqli, $_POST['gebruikersnaam']);
  	$password = mysqli_real_escape_string($mysqli, $_POST['paswoord']);

	$sql_p = "SELECT paswoord FROM tblklanten WHERE gebruikersnaam = '$gebruikersnaam'";

	$res_p = mysqli_query($mysqli, $sql_p);
	if ($res_p->num_rows == 1){
	while($row = $res_p->fetch_assoc()){
	$hash = $row["paswoord"];}

	if(password_verify($password, $hash)){

  	$sql = "SELECT soortklant, klantabonnement FROM tblklanten WHERE gebruikersnaam='$gebruikersnaam' AND paswoord = '$hash'";

	$res_g = mysqli_query($mysqli, $sql);

	if ($res_g->num_rows == 1) {
	while($row = $res_g->fetch_assoc()){
		$_SESSION["ingelogd"] = true;
		$_SESSION["gebruikernaam"] = $gebruikersnaam;
		$_SESSION["soortklant"] = $row["soortklant"];
		$_SESSION["klantabbonement"] = $row["klantabonnement"];
	}
}
}
else{
echo '<div class="alert alert-danger" role="alert">Het wachtwoord komt niet overeen. Vul het correct wachtwoord in. </div>';
}
}
	else {
echo '<div class="alert alert-danger" role="alert">De gebruikersnaam bestaat niet. Vul een geldige gebruikersnaam in. </div>';
	}


}
}
// Behoort tot de pagina Inloggen.php.
 ?>
