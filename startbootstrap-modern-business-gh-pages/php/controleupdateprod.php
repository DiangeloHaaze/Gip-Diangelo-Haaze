<?php
$goedkeuring = true;
if (!(isset($_POST["productnaam"]) && $_POST["productnaam"] != "")) {
	// code...
}
if (!(isset($_POST["producttaal"]) && $_POST["producttaal"] != "")) {
	// code...
}
if (!(isset($_POST["beschrijving"]) && $_POST["beschrijving"] != "")) {
	// code...
}
if (!(isset($_POST["prijsPstuk"]) && $_POST["prijsPstuk"] != "")) {
	$goedkeuring = false;
}
if (!(isset($_POST["linkfoto"]) && $_POST["linkfoto"] != "")) {

}
 ?>
