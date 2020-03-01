<?php
$prodnm = trim($_POST["productnaam2"]);
$prodtl = trim($_POST["producttaal"]);
$beschr = trim($_POST["beschrijvings"]);
$pps = trim($_POST["prijsPstuk"]);
$lkft = trim($_POST["linkfoto"]);
$controle = true;

if(empty($prodnm)){
	$controle = false;
}
if(empty($prodtl)){
	$controle = false;
}
else{
	if(strlen($prodtl) != 2){
		$controle = false;
	}
}
if(empty($beschr)){
	$controle = false;
}
if (empty($lkft)) {
	$controle = false;
}
if(empty($pps)){
	$controle = false;
}
else{
	if(!(preg_match("/^\d+$/",$pps))){
		$controle = false;

	}
}
if($controle){


	$mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
	if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }
	else{

		$productnaam = mysqli_real_escape_string($mysqli,$prodnm);
		$producttaal = mysqli_real_escape_string($mysqli,$prodtl);
		$prijsPstuk = mysqli_real_escape_string($mysqli,$pps);
		$beschrijving = mysqli_real_escape_string($mysqli,$beschr);
		$linkfoto = mysqli_real_escape_string($mysqli,$lkft);

		$sql = "UPDATE tblproducten SET productnaam = '$productnaam', producttaal = '$producttaal', beschrijving = '$beschrijving', prijsPstuk = '$prijsPstuk', linkfoto = '$linkfoto' WHERE productnaam = '$productnaam'";
		if($mysqli->query($sql)==true){
			$gelukt = true;
		}
	}
}
else{
	echo "bad";}

 ?>
