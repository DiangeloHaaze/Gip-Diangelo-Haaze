<?php
$teller = 0;

if(isset($tags)){
$mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }
else
{
	for ($i=0; $i < $tel; $i++) {
		$querries[$i] = "SELECT p.linkfoto, p.productid From tblcategorieperproduct AS cap, tblproducten AS p, tblcategorie as c WHERE p.productid = cap.productid AND c.categorieid = cap.categorieid Group by p.linkfoto, p.productid, c.categorie HAVING c.categorie = '$tags[$i]' AND NOT p.productid = '$productid'";
	}
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
 ?>
