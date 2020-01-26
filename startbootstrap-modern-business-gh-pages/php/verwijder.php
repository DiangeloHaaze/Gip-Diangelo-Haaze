<?php
$counts = 0;
do{
if($_SESSION["koopwaren"][$counts] == $id){
	$goed = true;
	unset($_SESSION["koopwaren"][$counts]);
	unset($_SESSION["aantal"][$counts]);
	$_SESSION["count"]--;
}
else{
	$counts++;
}
}while(!isset($goed));



 ?>
