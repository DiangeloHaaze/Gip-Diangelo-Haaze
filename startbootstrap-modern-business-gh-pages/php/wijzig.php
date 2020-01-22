<?php
//
$gebruikernaam = $_SESSION['gebruikernaam'];

if(isset($_POST["versturen"])){


$mysqli= new MySQLi ("localhost","root","","athenagames");
if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }


    $voornaam = $_POST["voornaam"];
    $achternaam = $_POST["achternaam"];
    $email = $_POST["email"];
    $postcodeid = $_POST["postcodeid"];

    $sql = "
 UPDATE tblklanten
 SET voornaam = '$voornaam',
     achternaam = '$achternaam',
     email = '$email',
     postcodeid = '$postcodeid'
 WHERE gebruikersnaam = '$gebruikernaam';
 ";
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

?>
