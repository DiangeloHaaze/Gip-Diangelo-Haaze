<?php
$aantal = 1;

$mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }

else
{   
    
    $sql = "SELECT categorie FROM tblcategorie";
    if($stmt = $mysqli->prepare($sql)){
                if(!$stmt->execute()){
                    echo 'Het uitvoeren van de query is mislukt: '.$stmt->error.' in query: '.$sql; 
                }
                else{
                    $stmt->bind_result($categorie);
                    while($stmt->fetch()){
                      $categorien[$aantal] = $categorie;
                      $aantal++;
                    }
                }
                
            }
            else{
                echo "fout";
            }
    
}

?>