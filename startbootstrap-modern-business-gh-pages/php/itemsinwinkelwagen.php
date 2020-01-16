<?php
$teller = 0;
$mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }

else
{
	 $count = $_SESSION["count"];
	 $aantalproducten = $_SESSION["aantal"];
	 $productiden = $_SESSION["koopwaren"];

	for ($i=0; $i < ; $i++) {
		$querries[] = "SELECT * FROM tblproducten WHERE productid = "
	}


	if($stmt = $mysqli->prepare($sql)){
                if(!$stmt->execute()){
                    echo 'Het uitvoeren van de query is mislukt: '.$stmt->error.' in query: '.$sql;
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
?>
