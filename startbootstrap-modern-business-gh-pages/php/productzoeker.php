<?php
$teller = 0;
$mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }

else
{   
    $categorie = $_POST["categorie"];
    $zoekterm = $_POST["zoekterm"];
    
    if($categorie != 'start' && !(isset($zoekterm))){
        $sql = "SELECT * FROM tblproducten p, tblcategorieperproduct c where c.productid = p.productid AND '$categorie' = c.categorieid";
    }
    else if(isset($zoekterm) && $categorie == 'start'){
        $sql = "SELECT * FROM tblproducten where productnaam LIKE '%$zoekterm%'";
    }
    else{
        $sql = "SELECT p.* FROM tblproducten AS p, tblcategorieperproduct AS c where c.productid = p.productid AND '$categorie' = c.categorieid AND productnaam LIKE '%$zoekterm%'";
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
                echo "fout";
            }
}

?>