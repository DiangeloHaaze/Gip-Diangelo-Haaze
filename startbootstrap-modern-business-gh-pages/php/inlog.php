<?php
// Pagina waarbij een gebruiker die al is ingelogd zich terug kan inloggen met zijn of haar gegevens. Hier Word er gecontroleerd of de gebruiker wel of niet bestaat in de databank en de gegevens dan doorvoert naar de gepaste sessie voorwaarden.
if(isset($_POST["versturen"]) && isset($_POST["gebruikersnaam"]) && $_POST["gebruikersnaam"] != ""  && $_POST["paswoord"] && isset($_POST["paswoord"])){

$mysqli= new MySQLi ("localhost","root","","athenagames");
if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }

else
{
  	$gebruikersnaam = mysqli_real_escape_string($mysqli, $_POST['gebruikersnaam']);
  	$password = mysqli_real_escape_string($mysqli, $_POST['paswoord']);

  	$sql = "SELECT soortklant FROM tblklanten WHERE gebruikersnaam='$gebruikersnaam' AND paswoord = '$password'";
	if($stmt = $mysqli->prepare($sql)){
				if(!$stmt->execute()){
					echo 'Het uitvoeren van de query is mislukt: '.$stmt->error.' in query: '.$sql;
				}
				else{
					$stmt->bind_result($soortklant);
					while($stmt->fetch()){
                $_SESSION["ingelogd"] = true;
                $_SESSION["gebruikernaam"] = $gebruikersnaam;
                $_SESSION["paswoord"] = $paswoord;
				$_SESSION["soortklant"] = $soortklant;
			}
		}

}
}
}
// Behoort tot de pagina Inloggen.php.
 ?>
