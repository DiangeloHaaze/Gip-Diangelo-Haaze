<?php
//bekijkt of welk soort gebruiker zich juist heeft aangelogd. Zodat de gepaste opties voor die gebruiker dan ter beschikking word gestelt. Bv. Als er een admin inlogt moet dit ervoor zorgen dat hij dus ook admin privileges krijgt bij het inloggen van de website
if(isset($_SESSION["gebruikernaam"]) && isset($_SESSION["soortklant"]) ){
			switch ($_SESSION["soortklant"]) {
				case 1:
					$_SESSION["adminkey"] = true;
					$_SESSION["Klant"] = "Admin";
					break;
				case 2:
					$_SESSION["Klant"] = "Basic";
					break;
				case 3:
					$_SESSION["Klant"] = "Plus";
					break;
				case 4:
					$_SESSION["Klant"] = "Ultra";
					break;
				default:
					$_SESSION["Klant"] = "Geen";
					break;
			}
}
// Behoort tot de pagina index.php.
?>
