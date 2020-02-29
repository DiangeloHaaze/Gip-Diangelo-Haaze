<?php
if(isset($_POST["versturen"])){
	$fout = true;
	$oudpaswoord = trim($_POST["oudpaswoord"]);
	$nieuwpaswoord = trim($_POST["nieuwpaswoord"]);
	$bnieuwpaswoord = trim($_POST["bnieuwpaswoord"]);

	if(empty($oudpaswoord)){
		$fout = false;
	}
	if(empty($nieuwpaswoord)){
		$fout = false;
	}
	if(empty($bnieuwpaswoord)){
		$fout = false;
	}
	$mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
	      if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }
	           else {
				   

			   }


	if($fout){

	}
	else{
		echo "string";
	}






}

 ?>
