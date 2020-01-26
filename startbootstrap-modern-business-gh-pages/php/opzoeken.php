<?php
//
$juist = "";
If(isset($_POST["versturen"]) && isset($_POST["zoekwaarde"]) && $_POST["zoekwaarde"] != ""){
$mysqli= new MySQLi ("localhost","root","","athenagames");
if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }

else
{

 $zoekwaarde = mysqli_real_escape_string($mysqli, $_POST["zoekwaarde"]);

switch($_POST['keus']){
    case "voornaam":
        $sql = "SELECT voornaam, gebruikersnaam, achternaam, postcodeid, email FROM tblklanten WHERE  voornaam LIKE '%$zoekwaarde%'";
        break;
    case "gebruikersnaam":
        $sql = "SELECT voornaam, gebruikersnaam, achternaam, postcodeid, email FROM tblklanten WHERE gebruikersnaam LIKE '%$zoekwaarde%'";
        break;
    case "achternaam":
        $sql = "SELECT voornaam, gebruikersnaam, achternaam, postcodeid, email FROM tblklanten WHERE achternaam LIKE '%$zoekwaarde%'";
        break;
    case "email":
        $sql = "SELECT voornaam, gebruikersnaam, achternaam, postcodeid, email FROM tblklanten WHERE email LIKE '%$zoekwaarde%'";
        break;
}


$result = $mysqli->query($sql);

if ($result->num_rows > 0) {

    $toon = true;
    $teller = 0;
        //pakt de waardes uit de rij
    while($row = $result->fetch_assoc()){

            $voornaam[$teller] = $row["voornaam"];
            $achternaam[$teller] = $row["achternaam"];
            $gebruikersnaam[$teller] = $row["gebruikersnaam"];
            $postcodeids[$teller] = $row["postcodeid"];
            $email[$teller] = $row["email"];
            $teller++;
    }
} else {
    echo "Gebruiker bestaat niet";
}
}
}
//gebruikt op web pagina toonklanten.php
?>
