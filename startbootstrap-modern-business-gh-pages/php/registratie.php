<?php

$mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
  if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }
	   else {

$sql = "SELECT (SELECT Count(*) from tblklanten k1 WHERE k1.gebruikersnaam = ?) as gebruikersnaamaantal, (SELECT Count(*) from tblklanten k2 where k2.email = ?) as emailaantal";
echo 'hello';
if($stmt = $mysqli->prepare($sql)){
	echo "hallo";
	$stmt->bind_param('ss', $username, $email);
	$username = $_POST["gebruikersnaam"];
	$email = $_POST["email"];

	if ($username < 1 && $email < 1){
		echo 'heye';
		$sqli = "INSERT INTO tblklanten (voornaam, achternaam, gebruikersnaam, postcodeid, email, paswoord) VALUES ( ?,?,?,?,?,?)";
			if($stmti = $mysqli->prepare($sqli)){
				echo 'hey';
			$stmti->bind_param('ssssss',$voornaam, $achternaam, $gebruikersnaam, $postcodeid, $email, $paswoord);
				$voornaam = $_POST["voornaam"];
				$achternaam = $_POST["achternaam"];
				$gebruikersnaam = $_POST["gebruikersnaam"];
					$_SESSION['gebruikernaam'] = $gebruikersnaam;
				$postcodeid = $pcid;
				$email =  $_POST["email"];
				$passwoord = $_POST["paswoord"];
			}
			else {
				echo 'fout';
			}
		}
	}
}

 ?>
