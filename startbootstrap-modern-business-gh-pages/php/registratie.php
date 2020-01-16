<?php
if(isset($_POST["versturen"]) && isset($_POST["voornaam"]) && $_POST["voornaam"] != "" && isset($_POST["achternaam"]) && $_POST["achternaam"] != "" && isset($_POST["gebruikersnaam"]) && $_POST["gebruikersnaam"] != "" &&  isset($_POST["postcode"]) && $_POST["postcode"] != "" &&  isset($_POST["gemeente"]) && $_POST["gemeente"] != "" && isset($pcid)){



$mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
  if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }
	   else {

$username = $_POST['gebruikersnaam'];
$email = $_POST['email'];
$password = $_POST['paswoord'];

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
}else{


	 $sql = "
	 INSERT INTO tblklanten ( voornaam, achternaam, gebruikersnaam, postcodeid, email, paswoord) VALUES ( ?,?,?,?,?,?)";
	if($stmt = $mysqli->prepare($sql))
	{
	$stmt->bind_param('sssiss',$voornaam,$achternaam,$gebruikersnaam2,$postcodeid,$email2,$paswoord2);
	 $voornaam= $_POST["voornaam"];
	 $achternaam = $_POST["achternaam"];
	 $gebruikersnaam2= $_POST["gebruikersnaam"];
		$_SESSION["gebruikernaam"] = $_POST["gebruikersnaam"];
	 $postcodeid = $pcid;
	 $email2 = $_POST["email"];
	 $paswoord2 = $_POST["paswoord"];
		$_SESSION["paswoord"] = $_POST["paswoord"];
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
}

 ?>
