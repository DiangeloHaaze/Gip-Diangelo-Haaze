<?php
$mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
      if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }
           else {
                $sql = "SELECT * FROM tblgemeente where postcodeid = '$postcodeid'";

                $res = mysqli_query($mysqli, $sql);

                if ($res->num_rows == 1) {
                while($row = $res->fetch_assoc()){
            	$postcode = $row["postcode"];
				$gemeente = $row["gemeente"];
                }
				}
}
 ?>
