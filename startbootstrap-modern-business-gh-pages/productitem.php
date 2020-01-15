<?php
include('php/itemdisplay.php');
include('php/related.php');
 ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>athenagames</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">
  <link href="css/Stylediangelo.css" rel="stylesheet">

</head>

<body>
    <!-- navigatie  -->
	<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
   	 <a class="navbar-brand" href="index.php">Athena's Game</a>
   	 <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
   	   <span class="navbar-toggler-icon"></span>
   	 </button>
   	 <div class="collapse navbar-collapse" id="navbarResponsive">
   	   <ul class="navbar-nav ml-auto">
   		 <li class="nav-item">
   		   <a class="nav-link" href="contact.php">Contact</a>
   		 </li>
   		 <li class="nav-item">
   		   <a class="nav-link" href="producten.php">Producten</a>
   		 </li>
   		   <li class="nav-item">
   		   <a class="nav-link" href="Subscribtie.php">Subscribtie</a>
   		 </li>
   			<?php if(!isset($_SESSION["ingelogd"])){ ?>
   		 <li class="nav-item">
   		   <a class="nav-link" href="registreer.php">Registreer</a>
   		 </li>
   		   <li class="nav-item">
   		   <a class="nav-link" href="Inloggen.php">inloggen</a>
   		 </li>
   		   <?php } else{ ?>
   		   <li class="nav-item dropdown">
   		   <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   			 <?php echo $_SESSION["gebruikernaam"]; ?>
   		   </a>
   		   <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
   			 <a class="dropdown-item" href="Weizigen.php">Aanpassen</a>
   			 <a class="dropdown-item" href="php/uitloggen.php">Uitloggen</a>
   			   <?php if($_SESSION["adminkey"] == true){?>
   			 <a class="dropdown-item" href="toonklanten.php">Gebruikers bekijken</a>
   			   <?php } ?>
   		   </div>
   		 </li>
   		   <?php
   		   }
   		   ?>
   	   </ul>
   	 </div>
      </div>
    </nav>

  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.html">Home</a>
      </li>
      <li class="breadcrumb-item active"><?php echo $product;?></li>
    </ol>

    <!-- Portfolio Item Row -->
    <div class="row">

      <div class="col-md-8">
        <img class="img-fluid" src="<?php echo $foto; ?>" alt="http://placehold.it/750x500">
      </div>

      <div class="col-md-4">
        <h3 class="my-3"><?php echo $product;?></h3>
        <p><?php echo $beschrijving; ?></p>
        <h3 class="my-3">Details</h3>
        <ul>
          <li class="tags">Taal: <?php echo $taal; ?></li>
          <li class="tags">Prijs: €<?php echo $prijs; ?></li>
		  <li class="tagt"> Tags: </li>
		  <?php for ($i=0; $i < $tel ; $i++) { ?>
		  <li class="tags"> &nbsp; &nbsp; <?php echo $tags[$i] ?></li>
	  <?php } ?>
        </ul>
      </div>

    </div>
    <!-- /.row -->
<!--  -->
    <!-- Related Projects Row -->
    <h3 class="my-4">gerelateerde producten</h3>

    <div class="row">
	<?php for ($i=0; $i < 4; $i++) {
	 ?>
      <div class="col-md-3 col-sm-6 mb-4">
        <a href="">
          <img class="img-fluid" src="<?php echo $link[$i]; ?>" alt="">
        </a>
      </div>
  <?php } ?>
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Athena's Game 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
