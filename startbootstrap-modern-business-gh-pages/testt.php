<?php
session_start();
if(isset($_GET["actiep"]) && $_GET["actiep"] == "wis" && isset($_GET["artikelid"])){
	echo "gelukt";
}
else{
	echo 'fail';
}
$productiden = array(3,1,2);
$hey = $productiden[1];
?>
<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>



	  <form name="form1" method="post" action="<?php echo
	  $_SERVER['PHP_SELF']?>?actiep=wis&artikelid=<?php echo $productiden[1] ?>">
	  <input type="submit" name="btnwissen" id="wis" value="wis">
	  </form>



</body>

</html>
