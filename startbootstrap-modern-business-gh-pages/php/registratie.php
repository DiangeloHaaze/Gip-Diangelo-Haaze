<?php
//Pagina dient om de gegevens in te dienen als alle andere stappen gelukt zijn. Hierin wordt bekeken of de gebruiker een al bestaande gebruikersnaam of email heeft ingevoerd sinds ik zowel unieke emails als unieke gebruikersnamen wil in mijn databank. Als een van de voorwaarden overeenkomt krijgt de gebruiker de toegepaste foutboodschap.
$mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }

else
{
//verandert de ingegeven waardes om naar stukken text en paswoord naar een hashcode;
$voornaam = mysqli_real_escape_string($mysqli,$_POST['voornaam']);
$achternaam = mysqli_real_escape_string($mysqli,$_POST['achternaam']);
$username = mysqli_real_escape_string($mysqli,$_POST['gebruikersnaam']);
$straat = mysqli_real_escape_string($mysqli,$_POST['Straat']);
$straatnr = mysqli_real_escape_string($mysqli,$_POST['straatnr']);
$email = mysqli_real_escape_string($mysqli,$_POST['email']);
$paswoord = mysqli_real_escape_string($mysqli,$_POST['paswoord']);
$paswoord = password_hash($paswoord, PASSWORD_BCRYPT);

//sql's die gebruikt worden om te kijken of de gebruiker/email al bestaat of niet sinds deze waarden uniek moeten zijn.
$sql_u = "SELECT * FROM tblklanten WHERE gebruikersnaam='$username'";
$sql_e = "SELECT * FROM tblklanten WHERE email='$email'";

//de resultaten van de sqls
$res_u = mysqli_query($mysqli, $sql_u);
$res_e = mysqli_query($mysqli, $sql_e);
//Hier word gekeken of er al een bestond of niet en geeft dan op de pagina de juiste
if (mysqli_num_rows($res_u) > 0 && mysqli_num_rows($res_e) > 0) {
	echo '<div class="alert alert-danger" role="alert">Zowel de email als de gebruikersnaam bestaan al.</div>';
}else if(mysqli_num_rows($res_u) > 0){
	echo '<div class="alert alert-danger" role="alert"> De gebruikersnaam bestaat al.</div>';
}else if(mysqli_num_rows($res_e) > 0){
   echo '<div class="alert alert-danger" role="alert"> De Email bestaat al.</div>';
}
else{
// de sql en resultaat voor het invoegen van een gebruiker nadat hij zich correct heeft geregistreerd

	 $sql = "
	 INSERT INTO tblklanten ( voornaam, achternaam, gebruikersnaam, Straat, straatnummer, postcodeid, email, paswoord) VALUES ( '$voornaam','$achternaam','$username', '$straat', '$straatnr', '$pcid','$email','$paswoord')";
	 mysqli_query($mysqli, $sql);
//de inlog gegevens die gebruikt worden voor de gebruiker.
	 		 $_SESSION["gebruikernaam"]	= $username;
			 $_SESSION["ingelogd"] = true;
			 $_SESSION["adminkey"] = false;
			 $_SESSION["klantabbonement"] = 1;
}}
//behoort to de pagina registratie.php
 ?>
