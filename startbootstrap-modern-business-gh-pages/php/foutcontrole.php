<?php
//hier word bekeken of de velden zijn ingevuld en of deze wel of niet volgens het juiste patroon zijn ingedient. Meer info staat bij de stellingen zelf.
if(isset($_POST['versturen'])){
$gekeurt = true;


//Dit volgend stuk gaat over of het conformatie paswoord overeenkomt met het ingevoert passwoord en of dit veld niet leegstaat of geen waarde is voor ingevuld. Omdat dit op paswoord moet lijken heb ik hier niet hetzelfde soort controle op gedaan sinds het conformatie passwoord moet lijken op het paswoord zelf.
if($_POST['confirmpaswoord'] == $_POST["paswoord"] && !(isset($_POST['confirmpaswoord'])) && $_POST['confirmpaswoord'] == ""){
	$foutconfirmpasswoord = true;
	$gekeurt = false;
}
//Hierbij word gecontroleerd of men wel of niet het wachtwoord heeft ingevult. Zoniet krijgt men de gepaste foutboodschap, Zowel dan word bekeken of men wel of niet het juiste patroon voor het wachtwoord heeft ingevoerd. Hierbij is er weer een gepaste boodschap bij het beantwoorden van de stelling.
if (!(isset($_POST['pasword'])) && $_POST['password'] == ""){
	$foutpaswoord = true;
	$gekeurt = false;
}
else{
	// het patroon die moet gebruikt worden om te vergelijken met de ingevoerde waarde.
	$patroon = '(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}';
	$paswoorddoor = preg_match($pattern, $_POST["password"]);
	if(!isset($paswoorddoor)){
		$foutpatroonpasswoord = true;
	}
}
//Hierbij word gecontroleerd of er wel of niet een waarde is ingevoerd bij het ingeven van de voornaam.
if (!(isset($_POST['voornaam'])) && $_POST['voornaam'] == ""){
	$foutvoornaam = true;
	$gekeurt = false;
}
//Hierbij wordt gecontroleer of men wel of niet de achternaam heeft ingevuld. Dit geeft klaar aan de variabele voor de foutboodschap te tonen.
if(!(isset($_POST["achternaam"]) && $_POST['achternaam'] == ""){
	$foutachternaam = true;
	$gekeurt = false;
}

//Hierbij word gecontroleerd of er wel of niet is ingevoert van een gemeente.
if(!(isset($_POST["gemeente"]) && $_POST['gemeente'] == ""){
	$foutgemeente = true;
	$gekeurt = false;
}
//hierbij word bekeken of men een postcode heeft ingevoerd en of deze waarde ook voldoet aan de gevraagde patroon.


if(!(isset($_POST["postcode"])) && $_POST['postcode'] == ""){
	$foutingevuldpostcode = true;
	$gekeurt = false;
}else
//het gevraagde patroon voor het invoeren van de postcode.
$pattern = "[0-9]{4}";
$postcodedoor =  preg_match($pattern, $_POST["Postcode"]);
if(!(isset($postcodedoor))){
	$foutpatroonpostcode = true;
	$gekeurt = false;
}

}
?>
