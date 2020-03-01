<?php
if(isset($_POST["versturen"])){
	$fout = true;
	$oudpaswoord = trim($_POST["oudpaswoord"]);
	$nieuwpaswoord = trim($_POST["nieuwpaswoord"]);
	$bnieuwpaswoord = trim($_POST["bnieuwpaswoord"]);

	if(empty($oudpaswoord)){
		$fout = false;
		echo "stringd";
	}
	if(empty($nieuwpaswoord)){
		$fout = false;
		echo "stringo";
	}
	else{
			if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $nieuwpaswoord)) {
			    $gekeurt = false;
				echo "stringd";
			}
		}

	if(empty($bnieuwpaswoord)){
		echo "string";
		$fout = false;
	}
	else{
		if($nieuwpaswoord != $bnieuwpaswoord){
			$fout = false;
			echo "strings";
		}
	}

	$mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
	      if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }
	           else {
				   $oudpaswoord_s = mysqli_real_escape_string($mysqli,$_POST["oudpaswoord"]);
				   $username_s = mysqli_real_escape_string($mysqli,$_SESSION["gebruikernaam"]);
				   $nieuwpaswoord_s = mysqli_real_escape_string($mysqli,$_POST["nieuwpaswoord"]);
				   $nieuwpaswoord_s = password_hash($nieuwpaswoord_s, PASSWORD_BCRYPT);



			       $sql_p = "SELECT paswoord FROM tblklanten WHERE gebruikersnaam = '$username_s'";

				   $sql_i = "UPDATE tblklanten SET paswoord = '$nieuwpaswoord_s' WHERE gebruikersnaam = '$username_s'";

			   	   $res_p = mysqli_query($mysqli, $sql_p);
			   	   if ($res_p->num_rows == 1) {
			   	   while($row = $res_p->fetch_assoc()){
			   	   $hash = $row["paswoord"];}}

				   if(password_verify($oudpaswoord_s, $hash)){
					   if($stmt = $mysqli->prepare($sql_i))
				  {
				  if(!$stmt->execute()){ echo 'het uitvoeren van de query is mislukt:';}
				  else {
					  echo 'Het updaten is gelukt';
					  $geslaagd = true;
				  }
				  $stmt->close();

				  }
			   }
			   else
			   {
				   $fout = false;
			   }
}}
 ?>
