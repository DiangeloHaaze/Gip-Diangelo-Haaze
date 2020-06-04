<?php
$aantal = 0;
$mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');

if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }
else
{
	$sql_h = "SELECT AantalInStock FROM tblproducten WHERE productid = '$productiden[$z]'";
	$res_h = mysqli_query($mysqli, $sql_h);
	if ($res_h->num_rows == 1) {
	while($row_h = $res_h->fetch_assoc()){
	$aantal = $row_h["AantalInStock"];
}
}
 $aantal = $aantal - $aantalproducten[$z];
 if ($aantal < 0) {
 	?>
<a href="producten.php" class="factuurlink">We hebben niet langer genoeg in stock</a>
	<?php
	$erdoor = false;
 }
 else{
	 $sql_g = "UPDATE tblproducten SET AantalInStock = '$aantal' WHERE productid = '$productiden[$z]'";
	 if($mysqli->query($sql_g)==true){}
 }
}

 ?>
