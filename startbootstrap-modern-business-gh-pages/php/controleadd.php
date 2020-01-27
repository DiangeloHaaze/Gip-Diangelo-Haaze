<?php
$foutief = true;
$aantalcat = 0;
if(!(isset($_POST['productnaam']) && $_POST["productnaam"] != "")){
	$foutief = false;
}
if(!(isset($_POST["producttaal"]) && $_POST["producttaal"] != "" strlen($_POST["producttaal"]) == 2)){
	$foutief = false;
}
if(!(isset($_POST["beschrijving"]) && $_POST["beschrijving"] != "")){
	$foutief = false;
}
if(!(isset($_POST["prijsPstuk"]) && $_POST["prijsPstuk"] != "" && is_numeric($_POST["prijsPstuk"]))){
	$foutief = false;
}
if(!(isset($_POST["linkfoto"]) && $_POST["linkfoto"] != "")){
	$foutief = false;
}
if(!($_POST["soort"] != "start")){
	$foutief = false;
}

if ($foutief == true) {
	include("voegproducttoe.php");
}
?>
