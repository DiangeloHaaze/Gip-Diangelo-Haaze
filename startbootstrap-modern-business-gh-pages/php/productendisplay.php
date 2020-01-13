<?php
session_start();
$teller = 0;
$mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }

else
{

    $sql_b = "SELECT * FROM tblproducten";
    if($stmt_b = $mysqli->prepare($sql_b)){
                if(!$stmt_b->execute()){
                    echo 'Het uitvoeren van de query is mislukt: '.$stmt_b->error.' in query: '.$sql_b;
                }
                else{
                    $stmt_b->bind_result($productid, $productnaam, $producttaal, $soortid, $beschrijving, $prijsPstuk, $linkfoto);
                    while($stmt_b->fetch()){
						$productiden[$teller] = $productid;
                        $producten[$teller] = $productnaam;
                        $talen[$teller] = $producttaal;
                        $beschrijvingen[$teller] = $beschrijving;
                        $prijzen[$teller] = $prijsPstuk;
                        $fotos[$teller] = $linkfoto;
                        $teller++;

                    }

                    $stmt_b->close();
                }

            }
            else{
                echo "fout";
            }

}

?>
