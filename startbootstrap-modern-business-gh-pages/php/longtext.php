<?php
if(!empty($beschrijving)){
	if(strlen($beschrijving) > 100){
		 $rest = null;
		 for($i = 0; $i < 100; $i++){
			 if(ctype_space(substr($beschrijving, $i, 1))){
				 $rest = substr($beschrijving, 0, $i);
			 }
		 }
		 $rest = $rest. " ...";
		 $beschrijving = $rest;
	}
}
	echo $beschrijving;
//Jaron De Vrieze heeft mij geholpen om deze code te schrijven.
?>
