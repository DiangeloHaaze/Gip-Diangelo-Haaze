<?php
$teller = 0;
$productiden = NULL;
$producten= NULL;
$talen = NULL;
$beschrijvingen = NULL;
$prijzen = NULL;
$fotos = NULL;

$mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }

else
{
	
    include('php/zoekkeuzes.php');

    if($stmt = $mysqli->prepare($sql)){

                if(!$stmt->execute()){
                    echo 'Het uitvoeren van de query is mislukt: '.$stmt->error.' in query: '.$sql;
                }
                else{
                    $stmt->bind_result($productid, $productnaam, $producttaal, $soortid, $beschrijving, $prijsPstuk, $linkfoto);
                    while($stmt->fetch()){
						$productiden[$teller] = $productid;
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
                echo "fout";
            }
}

?>
