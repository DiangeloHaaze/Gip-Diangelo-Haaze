<?php
$foutief = true;
$aantalcat = 0;
$productnaam = trim($_POST["productnaam"]);
$producttaal = trim($_POST["producttaal"]);
$beschrijving = trim($_POST["beschrijving"]);
$prijsperstuk = trim($_POST["prijsPstuk"]);
$linkfoto = trim($_POST["linkfoto"]);
$soort = $_POST["soort"];

if(empty($productnaam)){
	$foutief = false;
}
if(empty($producttaal)){
	$foutief = false;
}
else{
	if (strlen($producttaal) != 2) {
		$foutief = false;

	}
}
if(empty($beschrijving)){
	$foutief = false;
}
if(empty($prijsperstuk)){
	$foutief = false;
}
else{
	if(!(preg_match("/^\d+$/",$prijsperstuk))){
		$foutief = false;

	}
}
if(empty($linkfoto)){
	$foutief = false;
}


if($soort == "start"){
	$foutief = false;
}

if ($foutief){
	echo "good";
	include("voegproducttoe.php");
}
else{
	echo "bad";
}
?>
