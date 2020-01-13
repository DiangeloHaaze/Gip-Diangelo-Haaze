<?php
session_start();  

If(isset($_POST["versturen"]) && isset($_POST["gebruikersnaam"]) && $_POST["gebruikersnaam"] != ""  && $_POST["paswoord"] && isset($_POST["paswoord"])){

$mysqli= new MySQLi ("localhost","root","","athenagames");
if(mysqli_connect_errno()) {trigger_error('Fout bij verbinding: '.$mysqli->error); }

else
{    
  	$gebruikersnaam = $_POST['gebruikersnaam'];
  	$password = $_POST['paswoord'];

  	$sql = "SELECT * FROM tblklanten WHERE gebruikersnaam='$gebruikersnaam' AND paswoord = '$password'";
    
  	$res = mysqli_query($mysqli, $sql);
        if(mysqli_num_rows($res) == 1){
                $_SESSION["ingelogd"] = true;
                $_SESSION["gebruikernaam"] = $gebruikersnaam;
                $_SESSION["paswoord"] = $paswoord;
    }
       else
       {
           $fout = true;
       }
}
}




?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Inloggen</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link type="text/css" href="css/Stylediangelo.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">

</head>

<body>
    <!-- navigatie -->
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
    
    <?php
    //gaan naar start na het inloggen
    if(isset($_SESSION["ingelogd"])){header("location:index.php");}
    ?>
    
  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Inloggen
      <small>Gegevens</small>
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Home</a>
      </li>
      <li class="breadcrumb-item active">Log In</li>
    </ol>
      <!-- Map Column -->

    <!-- Contact Form -->
    <div class="row">
      <div class="col-lg-9 mb-4">
        <h3></h3>
        <form name="sentMessage" id="contactForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="control-group form-group">
            <div class="controls">
              <label>Gebruikersnaam:</label>
              <input type="text" class="form-control" name="gebruikersnaam" id="gebruikersnaam" required data-validation-required-message="Gelieve u gebruikersnaam in te voeren.">
            </div>
          </div>
            
            <div class="control-group form-group">
            <div class="controls">
              <label>Paswoord:</label>
               <input type="password" class="form-control" name="paswoord" id="paswoord" required data-validation-required-message="Gelieve u paswoord in te voeren.">
            </div>
            </div>
            <?php
            if(isset($fout)){ ?>
               <p class="fout">Je Wachtwoord of Gebruikersnaam is verkeerd probeer nog een keer</p>
            <?php }?>
          <div id="success"></div>
          <!-- For success/fail messages -->
          <button type="submit" name="versturen" class="btn btn-primary" id="sendMessageButton">Versturen</button>
         </form>
      </div>

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
