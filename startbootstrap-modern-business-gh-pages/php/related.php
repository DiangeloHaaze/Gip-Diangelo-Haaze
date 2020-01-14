<?php
$teller = 0;
$mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }
else
{
	for ($i=0; $i < $tel; $i++) {
		$querries[$i] = "SELECT p.linkfoto, p.productid FROM tblproducten AS p, tblcategorieperproduct AS cap WHERE p.productid = cap.productid AND cap.categorieid = '$tags[$i]'";
	}
	foreach ($querries as $querrie) {
		if($stmt = $mysqli->prepare($querrie)){
			if (!$stmt->execute()) {
				$error = "Fout";
			}
			elseif($mysqli->affected_rows == 0) {
				$error_w = "Geen wijzigingen";
			}
			else{
				$stmt->bind_result($linkfoto, $productid);
				$vol = 0;
				while($stmt->fetch()){
						$linken[$teller] = $linkfoto;
						$productiden[$teller] = $productid;

						//$linken = array_unique($linken);
						//$productiden = array_unique($productiden);
					}
				}
			}

			$stmt->close();
		}
}


 ?>
