<?php
	$login=$_POST['login'];
	$motPasse=$_POST['motPasse'];
	setcookie('Login',htmlspecialchars($login),0);
	setcookie('MotDePasse',htmlspecialchars($motPasse),0);
	header('Location:index.php');
?>