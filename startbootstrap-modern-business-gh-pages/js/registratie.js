$(function(){

	$("#versturen").on('click',function() {
		var $geslaagd = true;
		var $voornaam = $("#voornaam").val();
		var $achternaam = $("#achternaam").val();
		var $gebruikersnaam = $("#gebruikernaam").val();
		var $gemeente = $("#gemeente").val();
		var $postcode = $("#postcode").val();
		var $paswoord = $("#paswoord").val();
		var $cpaswoord = $("#cpaswoord").val();

		if($voornaam.trim().length == 0){
			alert("voornaam mislukt");
			$geslaagd = false;
		}
		if($achternaam.trim().length == 0){
			alert("achternaam mislukt");
			$geslaagd = false;
		}
		if($gebruikersnaam.trim().length == 0){
			alert("gebruikersnaam mislukt");
			$geslaagd = false;
		}
		if($gemeente.trim().length == 0){
			alert("gemeente mislukt");
			$geslaagd = false;
		}
		if($postcode.trim().length == 0){
			alert("postcode mislukt");
			$geslaagd = false;
		}
		else{
			if ($postcode.length != 4) {
				alert("postcode is te kort");
				$geslaagd = false;
			}
			if(!(Number.isInteger($postcode))){
				alert("postcode is geen nummer");
				$geslaagd = false;
			}
		}
		if($paswoord.trim().length == 0){
			alert("pawoord mislukt");
			$geslaagd = false;
		}
		else {
			var pattern = /^[A-Za-z]\w{8,100}$/;
			if (!($paswoord.match(pattern))) {
				alert("Het patroon is fout");
				$geslaagd = false;
			}

		}
		if ($cpaswoord != $paswoord) {
			alert("Het controle paswoord is fout");
			$geslaagd = false;
		}

		if($geslaagd){
			$("#goed").html("Geslaagd");
			$("#fout").html("");
		}
		else {
			$("#goed").html("");
			$("#fout").html("Je hebt gegevens fout ingegeven");
		}
	})



});
