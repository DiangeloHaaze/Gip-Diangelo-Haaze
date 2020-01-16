<?php include("php/voorwaarden.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Modern Business - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/diangelostyle.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">

</head>

<body>

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
              <a class="nav-link" href="test.php">Test</a>
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
  		  <li class="nav-item">
                <a class="notification" href="winkelwagen.php"><span class="glyphicon">&#x1f6d2;</span><span class="badge"><?php if($_SESSION["count"] != 0){echo $_SESSION["count"];} ?></span></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Contact
      <small>Gegevens</small>
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.html">Home</a>
      </li>
      <li class="breadcrumb-item active">Contact</li>
    </ol>

    <!-- Content Row -->
    <div class="row">
      <!-- Map Column -->

      <!-- Contact Details Column -->
      <div class="col-lg-4 mb-4">
        <h3>Contact Gegevens</h3>
        <p>
          Bromeliastraat 7
          <br>Melle, 9090
          <br>
        </p>
        <p>
          Phone: 00 32 468 48 31
        </p>
        <p>
        E-mail:
          <a href="mailto:napoleondanl@gmail.com">napoleondanl@gmail.com
          </a>
        </p>
        <p>
          Contacturen: Zaterdag - Zondag: 08:00 tot 21:00
        </p>
      </div>
    </div>
    <!-- /.row -->

    <!-- Contact Form -->
    <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <div class="row">
      <div class="col-lg-8 mb-4">
        <h3>Stuur ons een bericht</h3>
        <form name="sentMessage" id="contactForm" novalidate>
          <div class="control-group form-group">
            <div class="controls">
              <label>Volledige Naam:</label>
              <input type="text" class="form-control" id="name" required data-validation-required-message="Gelieve u naam in te voeren">
              <p class="help-block"></p>
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Telefoonnummer:</label>
              <input type="tel" class="form-control" id="phone" required data-validation-required-message="Gelieve u telefoonnummer in te voeren.">
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Email Address:</label>
              <input type="email" class="form-control" id="email" required data-validation-required-message="Gelieve u email in te voeren.">
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Bericht:</label>
              <textarea rows="10" cols="100" class="form-control" id="message" required data-validation-required-message="Gelieve u bericht in te voeren." maxlength="999" style="resize:none"></textarea>
            </div>
          </div>
          <div id="success"></div>
          <!-- For success/fail messages -->
          <button type="submit" class="btn btn-primary" id="sendMessageButton">Versturen</button>
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

  <!-- Contact form JavaScript -->
  <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

</body>

</html>
