<?php
$mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }
else
{

		$waarde = mysqli_real_escape_string($mysqli,$_POST['zoekwaarde']);
		if (isset($cat)) {
			$sql ="
			SELECT * FROM tblklanten WHERE gebruikersnaam='$waarde'";
		}
		else {
			$sql ="
			SELECT * FROM tblklanten WHERE email='$waarde'";
		}

		$res = mysqli_query($mysqli, $sql);

		if(mysqli_num_rows($res) > 0){
			$foutnuniek = true;
			$totfout = true;
		}
}
 ?>
