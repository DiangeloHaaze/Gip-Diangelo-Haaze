<?php
//Als de klant zijn gewenste producten tog niet meer wilt en ze allemaal in een keer wilt verwijderen dan kan dat door deze pagina die alle session variabelen terug omzet naar een null waarde zodat hij zich niet steeds moet uitloggen om zijn winkelkar te kunne legen.
$_SESSION["aantal"] = null;
$_SESSION["koopwaren"] = null;
$_SESSION["count"] = null;
header('location:index.php');
//behoort bij de webpagina winkelwagen.php
 ?>
