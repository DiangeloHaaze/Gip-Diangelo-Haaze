<?php
//

if(isset($_POST["versturen"]) && !(isset($peg)) ){


$mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }

$gebruikernaam = mysqli_real_escape_string($mysqli,$_SESSION['gebruikernaam']);
$waarde = mysqli_real_escape_string($mysqli,$_POST["waarde"]);

		switch($_POST["keus"]){
			case 'voornaam':
				$sql = "UPDATE tblklanten SET voornaam = '$waarde'WHERE gebruikersnaam = '$gebruikernaam'";
				break;
			case 'achternaam':
				$sql = "UPDATE tblklanten SET achternaam = '$waarde' WHERE gebruikersnaam = '$gebruikernaam'";
				break;
			case 'email':
				$sql = "
				UPDATE tblklanten SET email = '$waarde' WHERE gebruikersnaam = '$gebruikernaam'";
				break;
			case 'gebruikersnaam':
			$sql = "
			UPDATE tblklanten SET gebruikernsaam = '$waarde' WHERE gebruikersnaam = '$gebruikernaam'";
			break;
					}
if($stmt = $mysqli->prepare($sql))
 {
 if(!$stmt->execute()){ echo 'het uitvoeren van de query is mislukt:';}
 else { $goedkeuring = true; }
 $stmt->close();
 }
else{
echo 'Er zit een fout in de query';
}
}
// behoort to de webpagina weizigen.php
?>
