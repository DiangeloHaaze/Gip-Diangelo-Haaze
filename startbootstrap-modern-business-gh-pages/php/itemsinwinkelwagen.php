<?php
//
$teller = 0;
$mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }
else
{
	for ($y=0; $y < $_SESSION['count']; $y++) {
		$aantalproducten[$y] = $_SESSION["aantal"][$y];
		$productiden[$y] = $_SESSION["koopwaren"][$y];
	}


	for ($i=0; $i < $_SESSION['count']; $i++) {
		$querries[$i] = "SELECT * FROM tblproducten WHERE productid = '$productiden[$i]'";
	}

foreach ($querries as $querrie) {
	if($stmt = $mysqli->prepare($querrie)){
                if(!$stmt->execute()){
                    echo 'Het uitvoeren van de query is mislukt: '.$stmt->error.' in query: '.$querrie;
                }
                else{
                    $stmt->bind_result($productid, $productnaam, $producttaal, $soortid, $beschrijving, $prijsPstuk, $linkfoto);
                    while($stmt->fetch()){
                        $producten[$teller] = $productnaam;
                        $talen[$teller] = $producttaal;
                        $beschrijvingen[$teller] = $beschrijving;
                        $prijzen[$teller] = $prijsPstuk;
                        $fotos[$teller] = $linkfoto;
                        $teller++;

                    }

                    $stmt->close();
                }

            }
            else{

            }
}

}
// Behoort tot de pagina winkelwagen.php.
?>
