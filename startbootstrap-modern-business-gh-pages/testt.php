<?php
echo "hallo ";
?>
<form action="testt.php" method="post">


<input type="text" name="email" id="email">
 <button type="submit" name="versturen" class="btn btn-primary">Versturen</button>
  </form>
<?php
if(isset($_POST["versturen"])){
$email = $_POST["email"];
if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {

}
else{
	
}
}
 ?>
