<?php
if(isset($_POST["versturen"])){
$mysqli = mysqli_connect('localhost', 'root', '', 'athenagames');
      if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }
           else {
                $postcode = $_POST["postcode"];
                $gemeente = $_POST["gemeente"];
               
                $sql = "SELECT * FROM tblgemeente where postcode = '$postcode' AND gemeente = '$gemeente'";
                
                $res = mysqli_query($mysqli, $sql);
               
                if ($res->num_rows == 1) {
                while($row = $res->fetch_assoc()){
                    
                $pcid = $row["postcodeid"];    }
                    
           }
           }
}
?>