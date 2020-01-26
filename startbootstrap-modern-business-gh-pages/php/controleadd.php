<?php
$foutief = true;
if(!(isset($_POST['productnaam']) && $_POST["productnaam"] != "")){
	$foutief = false;
}
if(!(isset($_POST["producttaal"]) && $_POST["producttaal"] != "")){
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



if ($foutief == false) {
	echo "hallo";
}
?>
