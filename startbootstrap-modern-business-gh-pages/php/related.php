<?php
//Kijkt naar welke categorien de game heeft en kijkt dan per categorie welke andere games ermee overeenstemmen. Bij een spel die meerdere tags heeft word uitgesloten sinds anders men twee keer hetzelfde spel zou kunnen zien en dit is niet een gewenst resultaat.
$teller = 0;
if(isset($tags)){
$mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }
else
{
	for ($i=0; $i < $tel; $i++) {
		$querries[$i] = "SELECT p.linkfoto, p.productid From tblcategorieperproduct AS cap, tblproducten AS p, tblcategorie as c WHERE p.productid = cap.productid AND c.categorieid = cap.categorieid Group by p.linkfoto, p.productid, c.categorie HAVING c.categorie = '$tags[$i]' AND NOT p.productid = '$productid'";}

	foreach ($querries as $querrie) {

		if($stmt = $mysqli->prepare($querrie)){
			if (!$stmt->execute()) {
				$error = "Fout";
			}
			else{
				$stmt->bind_result($linkfoto, $productid);
				while($stmt->fetch()){
						$link[$teller] = $linkfoto;
						$productiden[$teller] = $productid;
//Maakt de array variabelen uniek en kijkt dan of de array in formaat is verandert zoniet gaat hij door zonder de teller te verhogen.
						$link = array_unique($link);
						$productiden = array_unique($productiden);
						if ( sizeof($link) != $teller) {
							$teller++;
						}


					}
				}
			}
		}
}
}
//behoort to de pagina productitem.php
 ?>
