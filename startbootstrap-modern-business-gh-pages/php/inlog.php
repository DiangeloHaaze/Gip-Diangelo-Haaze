<?php
if(isset($_POST["versturen"]) && isset($_POST["gebruikersnaam"]) && $_POST["gebruikersnaam"] != ""  && $_POST["paswoord"] && isset($_POST["paswoord"])){

$mysqli= new MySQLi ("localhost","root","","athenagames");
if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }

else
{
  	$gebruikersnaam = $_POST['gebruikersnaam'];
  	$password = $_POST['paswoord'];

  	$sql = "SELECT * FROM tblklanten WHERE gebruikersnaam='$gebruikersnaam' AND paswoord = '$password'";

  	$res = mysqli_query($mysqli, $sql);
        if(mysqli_num_rows($res) == 1){
                $_SESSION["ingelogd"] = true;
                $_SESSION["gebruikernaam"] = $gebruikersnaam;
                $_SESSION["paswoord"] = $paswoord;
    }
       else
       {
           $fout = true;
       }
}
}
 ?>
