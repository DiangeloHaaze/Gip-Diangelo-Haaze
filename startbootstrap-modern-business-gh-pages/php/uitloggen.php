<?php
//
session_start();
$_SESSION["gebruikernaam"] = null;
$_SESSION["email"] = null;
$_SESSION["ingelogd"] = null;
$_SESSION["adminkey"] = false;
header("location:../index.php");
//is op elke pagina die een navigatiebar heeft als de gebruiker is ingelogd.
?>
