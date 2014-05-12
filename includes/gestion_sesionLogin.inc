<?php

	//Gestiona si un usuario esta registrado o no

	if($_SESSION["registrado"]){
		include('./includes/loged.inc');
	}else{
		include('./includes/login.inc');
	}

?>