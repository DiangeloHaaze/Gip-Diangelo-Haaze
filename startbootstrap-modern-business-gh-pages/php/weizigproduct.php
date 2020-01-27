<?php
$fouten = 0;
$goed = true;
if(isset($_POST["versturen"])){

if (!(isset($_POST["productid"]) && $_POST["productid"] != "")) {
	$goed = false;
	echo "hey1";
}
if (!(isset($_POST["keuze"]) && $_POST["keuze"] != "")){
	$goed = false;
	echo "hey2";
}
if (!(isset($_POST["zoekwaarde"]) && $_POST["zoekwaarde"] != "")) {
	$goed = false;
	echo "hey3";
}
if($_POST["zoekwaarde"] == "productnaam" && strlen($_POST["zoekwaarde"]) != 2){
	$goed = false;
	echo "hey4";
}
if ($_POST["zoekwaarde"] == "prijsPstuk" && !(is_numeric($_POST["prijsPstuk"]))) {
	$goed = false;
	echo "hey5";
}
if($goed == true){

	$mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
	if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }
	else
	{
		$zoekwaarde = mysqli_real_escape_string($mysqli,$_POST["zoekwaarde"]);
		$productid = mysqli_real_escape_string($mysqli,$_POST["productid"]);

		include("switchsql.php");
		echo $sql;
		if($stmt = $mysqli->prepare($sql))
		 {
			 echo "string";
		 if(!$stmt->execute()){ echo 'het uitvoeren van de query is mislukt:';}
		 else { $goedkeuring = true; }
}
else {
	echo "stringbad";
}
}
}
else{
		$foutzoekwaarde = true;
	}
}

 ?>
