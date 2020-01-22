<?php
if(isset($_POST["versturen"])){
$mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
      if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }
           else {

                $sql = "SELECT postcodeid FROM tblgemeente where postcode = ? AND gemeente = ?";

				if($stmt = $mysqli->prepare($sql)){
					$stmt->bind_param('ss', $postcode, $gemeente);
					$postcode = $_POST['postcode'];
					$gemeente = $_POST['gemeente'];
					$stmt->bind_result($pcid);
					while($stmt->fetch()){echo $pcid;}

				}
           }

?>
