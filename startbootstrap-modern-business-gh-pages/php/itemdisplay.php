<?php
session_start();
if(isset($_GET["actie"]) && $_GET["actie"] == 'doorgang' && isset($_GET["productid"])){

	$mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
	if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }
	else
	{

		$id = $_GET["productid"];
		$tel = 0;

		$sql = "SELECT * FROM tblproducten WHERE productid = '$id'";
		$sql_t = "SELECT c.categorie FROM tblcategorieperproduct AS cap, tblcategorie AS c  WHERE cap.categorieid = c.categorieid AND cap.productid = '$id'";

	    if($stmt = $mysqli->prepare($sql)){
	                if(!$stmt->execute()){
	                    echo 'Het uitvoeren van de query is mislukt: '.$stmt->error.' in query: '.$sql;
	                }
	                else{
	                    $stmt->bind_result($productid, $productnaam, $producttaal, $soortid, $beschrijving, $prijsPstuk, $linkfoto);
	                    while($stmt->fetch()){
	                        $product = $productnaam;
	                        $taal = $producttaal;
	                        $beschrijving = $beschrijving;
	                        $prijs = $prijsPstuk;
	                        $foto = $linkfoto;
	                    }

	                    $stmt->close();
	                }

	            }
	            else{
	                echo "fout";
	            }
				if($stmt_t = $mysqli->prepare($sql_t)){



							if(!$stmt_t->execute()){
								echo 'Het uitvoeren van de query is mislukt: '.$stmt_t->error.' in query: '.$sql_t;
							}
							else{
								$stmt_t->bind_result($categorie);
								while($stmt_t->fetch()){
								$tags[$tel] = $categorie;
								$tel++;

								}

								$stmt_t->close();
							}

						}

						else{
							echo 'Het uitvoeren van de query is mislukt: in query: '.$sql_t;
						}
	}




}
else{echo 'boe';}

 ?>
