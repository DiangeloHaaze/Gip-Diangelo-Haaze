<?php
$mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }
	else
		{
			$username = mysqli_real_escape_string($mysqli,$_SESSION["gebruikernaam"]);
			$sql_c = "SELECT klantabonnement FROM tblklanten WHERE gebruikersnaam = '$username'";
			if($stmt_c = $mysqli->prepare($sql_c)){
					if(!$stmt_c->execute()){
						echo 'Het uitvoeren van de query is mislukt: '.$stmt_c->error.' in query: '.$sql_c;
					}
					else{
						$stmt_c->bind_result($klantabonnement);
						while($stmt_c->fetch()){
							if($klantabonnement == $_SESSION["actie"]){
								$_SESSION["subscritie_fout"] = false;
								header("location:Subscribtie.php");
							}

						}
		}}}
 ?>
