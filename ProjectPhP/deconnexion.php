<?php
	session_start();
	$_SESSION['identifie']=null;
	session_destroy();
	
	header('Location:formConnexion.php');
?>