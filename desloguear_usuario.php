<?php
	session_start();

	session_regenerate_id();

	foreach ($_SESSION as $indice => $campo) {
		$campo="";
	}
	session_destroy();
	header('Location: ./home.php');
?>