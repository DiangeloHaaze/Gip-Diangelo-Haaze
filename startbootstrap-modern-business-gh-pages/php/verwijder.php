<?php
$koopwaar = $_SESSION["koopwaren"];
$tell = 0;
foreach ($koopwaar as $kw) {
	if($kw != $id){
		$nieuw[$tell] = $kw;
	}
	$tell++;
}

$_SESSION["koopwaren"] = array_merge($koopwaar,$nieuw);
foreach ($_SESSION["koopwaren"] as $key) {
	echo $key;
}

?>
