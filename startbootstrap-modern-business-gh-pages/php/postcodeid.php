<?php
if(isset($_POST["versturen"])){
$mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
      if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }
           else {

                $sql = "SELECT Count(*) FROM tblgemeente where postcode = ? AND gemeente = ?";

				if($stmt = $mysqli->prepare($sql)){
					
					$res = mysqli_query($mysqli, $sql);
					if ($aantalpcid == 1) {
						$sql_b = "SELECT postcodeid FROM tblgemeente WHERE postcode = ? AND gemeente = ?";
						if ($stmtb = $mysqli->prepare($sql_b)){

						}
					}
				}
           }
}
?>
