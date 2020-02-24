<?php
//hier word bekeken of de velden zijn ingevuld en of deze wel of niet volgens het juiste patroon zijn ingedient. Meer info staat bij de stellingen zelf.
$gekeurt = true;
if(isset($_POST['versturen'])){
	
$gekeurt = true;


//Dit volgend stuk gaat over of het conformatie paswoord overeenkomt met het ingevoert passwoord en of dit veld niet leegstaat of geen waarde is voor ingevuld. Omdat dit op paswoord moet lijken heb ik hier niet hetzelfde soort controle op gedaan sinds het conformatie passwoord moet lijken op het paswoord zelf.
if($_POST['confirmpaswoord'] != $_POST["paswoord"] || !(isset($_POST['confirmpaswoord'])) && $_POST['confirmpaswoord'] == ""){
	$foutconfirmpasswoord = true;
	$gekeurt = false;
}
//Hierbij word gecontroleerd of men wel of niet het wachtwoord heeft ingevult. Zoniet krijgt men de gepaste foutboodschap.
if (!(isset($_POST['paswoord'])) && $_POST['passwoord'] == ""){
	$foutpaswoord = true;
	$gekeurt = false;
}

//Hierbij word gecontroleerd of er wel of niet een waarde is ingevoerd bij het ingeven van de voornaam.
if (!(isset($_POST['voornaam'])) && $_POST['voornaam'] == ""){
	$foutvoornaam = true;
	$gekeurt = false;
}
//Hierbij wordt gecontroleer of men wel of niet de achternaam heeft ingevuld. Dit geeft klaar aan de variabele voor de foutboodschap te tonen.
if(!(isset($_POST["achternaam"])) && $_POST['achternaam'] == ""){
	$foutachternaam = true;
	$gekeurt = false;
}

//Hierbij word gecontroleerd of er wel of niet is ingevoert van een gemeente.
if(!(isset($_POST["gemeente"])) && $_POST['gemeente'] == ""){
	$foutgemeente = true;
	$gekeurt = false;
}
//hierbij word bekeken of men een postcode heeft ingevoerd.


if(!(isset($_POST["postcode"])) && $_POST['postcode'] == ""){
	$foutingpostcode = true;
	$gekeurt = false;
}
//Hierbij word gecontroleerd of de gebruikersnaam is ingevult later in registratie.php word bekeken of dit wel een unieke voorwaarde is ingegeven.
if(!(isset($_POST["gebruikersnaam"])) && $_POST["gebruikersnaam"] == ""){
	$foutgebruiker = true;
	$gekeurt = false;
}
//Hierbij word gecontroleerd of de email is ingevuld. En net zoals bij gebruikersnaam word gecontroleerd of de email al bestaat of niet.
if(!(isset($_POST["email"])) && $_POST["email"] == ""){
	$foutemail = true;
	$gekeurt = false;
}
}
//behoort bij de pagina: registreer.php;
?>
