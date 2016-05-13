<?php
	var_dump($_SESSION);
	include('controle/globais.php');
	session_destroy();
	header('LOCATION: /'.BASE);	
?>