<?php
$mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }

else
{
$sql_t = "SELECT * from tbltalen";
if($stmt_t = $mysqli->prepare($sql_t)){
			if(!$stmt_t->execute()){
				echo 'Het uitvoeren van de query is mislukt: '.$stmt_t->error.' in query: '.$sql_t;
			}
			else{
				$stmt_t->bind_result($taalid,$taals);
				while($stmt_t->fetch()){
	echo '<option value="'.$taalid.'">--'.$taals.'--</option>';

}}}}
 ?>
