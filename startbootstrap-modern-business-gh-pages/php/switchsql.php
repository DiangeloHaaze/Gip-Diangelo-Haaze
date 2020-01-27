<?php

switch ($_POST["keuze"]) {
	case 'productnaam':
		$sql = "
		UPDATE tblproducten SET productnaam = '$zoekwaarde' WHERE  productid = '$productid'";
		break;
	case 'producttaal':
		$sql = "
		UPDATE tblproducten SET producttaal = '$zoekwaarde' WHERE  productid = '$productid'" ;
		break;
	case 'beschrijving':
		$sql = "
		UPDATE tblproducten SET beschrijving = '$zoekwaarde' WHERE  productid = '$productid'";
		break;
	case 'prijsPstuk':
		$sql = "
		UPDATE tblproducten SET prijsPstuk = '$zoekwaarde' WHERE  productid = '$productid'";
		break;
	case 'linkfoto':
		$sql = "
		UPDATE tblproducten SET linkfoto = '$zoekwaarde' WHERE  productid = '$productid'";
		break;
}
 ?>
