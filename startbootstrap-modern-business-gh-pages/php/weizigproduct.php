<?php
$fouten = 0;
if(isset($_POST["productid"]) && $_POST["productid"] != "" && isset($_POST["keuze"]) &&      $_POST["keuze"] != "" && isset($_POST["zoekwaarde"]) && $_POST["keuze"] != "" && isset($_POST["versturen"])){




	$mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
	if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }

	else
	{
		$zoekwaarde = mysqli_real_escape_string($mysqli,$_POST["zoekwaarde"]);

		//include("switchsql.php");
}
}
else{
	if(!(isset($_POST["zoekwaarde"]))){
		$foutzoekwaarde = true;
	}
}

 ?>
