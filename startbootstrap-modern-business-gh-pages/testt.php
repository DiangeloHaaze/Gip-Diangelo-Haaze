<?php
session_start();
for ($i=0; $i < $_SESSION["count"]; $i++) {
	echo $_SESSION["koopwaren"][$i];
	echo $_SESSION["aantal"][$i];
}
?>
