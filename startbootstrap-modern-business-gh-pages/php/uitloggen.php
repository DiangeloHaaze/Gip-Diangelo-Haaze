<?php
//
session_start();
$_SESSION["gebruikernaam"] = null;
$_SESSION["email"] = null;
$_SESSION["ingelogd"] = null;
$_SESSION["adminkey"] = false;
$_SESSION["koopwaren"] = null;
$_SESSION["aantal"] = null;
$_SESSION["count"] = 0;
$_SESSION["Totaal"] = 0;
header("location:../index.php");
//is op elke pagina die een navigatiebar heeft als de gebruiker is ingelogd.
?>
