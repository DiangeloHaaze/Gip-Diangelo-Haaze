<?php
$aantal = 1;
$counter = 1;
$mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }

else
{

    $sql = "SELECT categorie FROM tblcategorie";
	$sql_s = "SELECT s.soorten FROM tblproducten AS p, tblsoorten AS s WHERE s.soortid = p.soortid GROUP BY s.soortid";

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
			if($stmt_s = $mysqli->prepare($sql_s)){
		                if(!$stmt_s->execute()){
		                    echo 'Het uitvoeren van de query is mislukt: '.$stmt_s->error.' in query: '.$sql_s;
		                }
		                else{
		                    $stmt_s->bind_result($soort);
		                    while($stmt_s->fetch()){
		                      $soorten[$counter] = $soort;
								  $counter++;


		                    }
		                }

		            }

}

?>
