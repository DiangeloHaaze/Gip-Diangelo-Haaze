<?php
$prodnm = trim($_POST["productnaam2"]);
$beschr = trim($_POST["beschrijvings"]);
$pps = trim($_POST["prijsPstuk"]);
$lkft = trim($_POST["linkfoto"]);
$controle = true;

if(empty($prodnm)){
	$controle = false;
	echo '<div class="alert alert-danger" role="alert">Het veld voor de productnaam is niet ingevuld </div>';
}
if(empty($beschr)){
	$controle = false;
	echo '<div class="alert alert-danger" role="alert">Het veld voor de beschrijving is niet ingevuld </div>';
}
if (empty($lkft)) {
	$controle = false;
	echo '<div class="alert alert-danger" role="alert">Het veld voor de link naar de foto is niet ingevuld </div>';
}
if(empty($pps)){
	$controle = false;
	echo '<div class="alert alert-danger" role="alert">Het veld voor de Prijs per stuk is niet ingevuld </div>';
}
else{
	if(!(preg_match("/^\d+$/",$pps))){
		$controle = false;
		echo '<div class="alert alert-danger" role="alert">Het veld voor de prijs is niet een getal</div>';

	}
}
if($controle){


	$mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
	if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }
	else{

		$productnaam = mysqli_real_escape_string($mysqli,$prodnm);
		$taalz = $_POST["talen"];
		$prijsPstuk = mysqli_real_escape_string($mysqli,$pps);
		$beschrijving = mysqli_real_escape_string($mysqli,$beschr);
		$linkfoto = mysqli_real_escape_string($mysqli,$lkft);

		$sql = "UPDATE tblproducten SET productnaam = '$productnaam', taalid = '$taalz', beschrijving = '$beschrijving', prijsPstuk = '$prijsPstuk', linkfoto = '$linkfoto' WHERE productnaam = '$productnaam'";
		if($mysqli->query($sql)==true){
			$gelukt = true;
			echo '<div class="alert alert-success" role="alert">Je hebt het product correct geweizigd.</div>';
		}
	}
}

 ?>
