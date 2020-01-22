<?php
//Pagina dient om de gegevens in te dienen als alle andere stappen gelukt zijn. Hierin wordt bekeken of de gebruiker een al bestaande gebruikersnaam of email heeft ingevoerd sinds ik zowel unieke emails als unieke gebruikersnamen wil in mijn databank. Als een van de voorwaarden overeenkomt krijgt de gebruiker de toegepaste foutboodschap.
$username = mysqli_real_escape_string($mysqli,$_POST['gebruikersnaam']);
$email = mysqli_real_escape_string($mysqli,$_POST['email']);


$sql_u = "SELECT * FROM tblklanten WHERE gebruikersnaam='$username'";
$sql_e = "SELECT * FROM tblklanten WHERE email='$email'";

$res_u = mysqli_query($mysqli, $sql_u);
$res_e = mysqli_query($mysqli, $sql_e);

if (mysqli_num_rows($res_u) > 0 && mysqli_num_rows($res_e) > 0) {
	$foutreg = 1;
}else if(mysqli_num_rows($res_u) > 0){
	$foutreg = 2;
}else if(mysqli_num_rows($res_e) > 0){
   $foutreg = 3;
}
else{

	 $sql = "
	 INSERT INTO tblklanten ( voornaam, achternaam, gebruikersnaam, postcodeid, email, paswoord) VALUES ( ?,?,?,?,?,?)";
	if($stmt = $mysqli->prepare($sql))
	{
	$stmt->bind_param('sssiss',$voornaam,$achternaam,$gebruikersnaam2,$postcodeid,$email2,$paswoord2);
	 $voornaam = mysqli_real_escape_string($mysqli,$_POST["voornaam"]);
	 $achternaam = mysqli_real_escape_string($mysqli,$_POST["achternaam"]);
	 $gebruikersnaam = mysqli_real_escape_string($mysqli,$_POST["gebruikersnaam"]);
		$_SESSION["gebruikernaam"] = mysqli_real_escape_string($mysqli,$_POST["gebruikersnaam"]);
	 $postcodeid = $pcid;
	 $email = mysqli_real_escape_string($mysqli,$_POST["email"]);
	 $paswoord = mysqli_real_escape_string($mysqli,$_POST["paswoord"]);
		$_SESSION["paswoord"] = mysqli_real_escape_string($mysqli,$_POST["paswoord"]);
		 if(!$stmt->execute()){
		echo 'het uitvoeren van de query is mislukt:';
		 }
		 else
			 {
			 $_SESSION["ingelogd"] = true;
			 ; }
			$stmt->close();
			}
	 else{ echo 'Er zit een fout in de query'; }
			}


}

 ?>
