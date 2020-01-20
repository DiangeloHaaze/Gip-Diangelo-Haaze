<?php

$mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
  if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }
	   else {

$sql = "SELECT (SELECT Count(*) from tblklanten k1 WHERE k1.gebruikersnaam = ?) as gebruikersnaamaantal, (SELECT Count(*) from tblklanten k2 where k2.email = ?) as emailaantal";
if($stmt = $mysqli->prepare($sql)){
	$stmt->bind_param('ss', $username, $email);

}
}

 ?>
