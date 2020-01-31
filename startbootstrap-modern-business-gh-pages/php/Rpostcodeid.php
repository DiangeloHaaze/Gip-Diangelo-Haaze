<?php
//
if(isset($_POST["versturen"])){
$mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
      if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }
           else {
			    $pid = mysqli_real_escape_string($mysqli,$postcodeid);
                $sql = "SELECT * FROM tblgemeente where postcodeid = '$pid'";

                $res = mysqli_query($mysqli, $sql);

                if ($res->num_rows == 1) {
                while($row = $res->fetch_assoc()){

                $pcid = "De Postcode is ".$row["postcode"]." en de gemeente is ".$row["gemeente"];
                }
           }
}
}
// Behoort tot de pagina weizigen.php.
?>
