<?php
// si un cookie est existant on redirige vers traitConnexion.php sans passer par le formulaire d'identification
// .......
if(isset($identifie)){
	header('Location:traitConnexion.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="./include/styles.css" />
	<title>Mon site !</title>
</head>
<body>
	<?php
		if (isset($_GET['msgErreur'])) {
			echo "<h2>".$_GET['msgErreur']."</h2><BR/>";
		}
		echo "<p>Veuillez entrer les identifiants :</p><BR/>";
		echo "<form method='post' action='traitConnexion.php'>";
		echo "<p>";
		if(isset($_COOKIE['Login'])){
			$login=$_COOKIE['Login'];
			echo "Login : <input type='text' value='$login' name='login' /> <BR/><BR/>";
		}else{
			echo "Login : <input type='text' name='login' /> <BR/><BR/>";
		}
		
		if(isset($_COOKIE['MotDePasse'])){
			$motPasse=$_COOKIE['MotDePasse'];
			echo "Login : <input type='password' value='$motPasse' name='motPasse' /> <BR/><BR/>";
		}else{
			echo "Mot de passe : <input type='password' name='motPasse' /> <BR/><BR/>";
		}
		
		echo "Se souvenir de moi : <input type='checkbox' name='cb_souvenirMoi' /><BR/><BR/>";
		echo "<input type='submit' name='Envoyer' value='Valider' />";
		echo "</p>";
		echo "</form>";
	?>
</body>
</html>
