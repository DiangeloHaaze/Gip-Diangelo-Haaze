<?php
$mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }
else
{
	if(isset($cats)){
		$waarde = mysqli_real_escape_string($mysqli,$_POST['gebruikernaam']);
	}else {
		$waarde = mysqli_real_escape_string($mysqli,$_POST['email']);
	}

			$sql ="
			SELECT * FROM tblklanten WHERE gebruikersnaam='$waarde' OR email = '$waarde'";


		$res = mysqli_query($mysqli, $sql);

		if(mysqli_num_rows($res) > 0){
			$foutnuniek = true;
		}
}
 ?>
