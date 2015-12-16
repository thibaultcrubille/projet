<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<?php 
try{
	$user='root';
	$pass='';
	$conn=new PDO('mysql:host=localhost;dbname=test;charset=UTF8',$user,$pass,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}catch (PDOException $e){
	echo "Erreur: ".$e->getMessage()."";
	die();
}
?>
