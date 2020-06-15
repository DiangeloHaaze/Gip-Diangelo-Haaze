<?php
if(isset($_POST["bevestigen"])){
	switch ($_SESSION["actie"]) {
		case '2':
		$sql_b = "UPDATE tblklanten SET klantabonnement = '2' WHERE gebruikersnaam = '$username'";
		$_SESSION["klantabbonement"] = 2;
			break;
		case '3':
		$sql_b = "UPDATE tblklanten SET klantabonnement = '3' WHERE gebruikersnaam = '$username'";
		$_SESSION["klantabbonement"] = 3;
			break;
		case '4':
		$sql_b = "UPDATE tblklanten SET klantabonnement = '4' WHERE gebruikersnaam = '$username'";
		$_SESSION["klantabbonement"] = 4;
			break;
	}
	if($mysqli->query($sql_b)==true){
		header("location:index.php");
	}
}

 ?>
