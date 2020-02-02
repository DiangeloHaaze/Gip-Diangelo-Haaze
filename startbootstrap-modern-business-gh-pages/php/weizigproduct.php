<?php
$fouten = 0;
$goed = true;
if(isset($_POST["versturen"])){

if (!(isset($_POST["productid"]) && $_POST["productid"] != "")) {
	$goed = false;
}
if (!(isset($_POST["keuze"]) && $_POST["keuze"] != "")){
	$goed = false;
}
if (!(isset($_POST["zoekwaarde"]) && $_POST["zoekwaarde"] != "")) {
	$goed = false;
}
if($_POST["zoekwaarde"] == "productnaam" && strlen($_POST["zoekwaarde"]) != 2){
	$goed = false;
}
if ($_POST["zoekwaarde"] == "prijsPstuk" && !(is_numeric($_POST["prijsPstuk"]))) {
	$goed = false;
}
if($goed == true){

	$mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
	if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }
	else
	{
		$zoekwaarde = mysqli_real_escape_string($mysqli,$_POST["zoekwaarde"]);
		$productid = mysqli_real_escape_string($mysqli,$_POST["productid"]);

		include("switchsql.php");
		if($stmt = $mysqli->prepare($sql))
		 {
		 if(!$stmt->execute()){ echo 'het uitvoeren van de query is mislukt:';}
		 else { $goedkeuring = true; }
}
}
}
else{
		$foutzoekwaarde = true;
	}
}

 ?>
