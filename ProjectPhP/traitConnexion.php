<?php
	session_start();
	
	// SI le formulaire d’identification a été soumis Alors
	if(isset($_POST['Envoyer'] ) && $_POST['Envoyer']=='Valider'){
		
		// SI les identifiants n'ont pas été remplis ou ne sont pas corrects Alors
		if((!isset($_POST['login']) || !isset($_POST['motPasse'])) || ($_POST['login']!='Achille' || $_POST['motPasse']!='Talon')){
			
			// On redirige vers la page d’identification avec un paramètre d’erreur à afficher 
			$msgErreur='Erreur d\'identification... Recommencez';
			header('Location:formConnexion.php?msgErreur='.$msgErreur);
		}
		// SINON 
		else{
			// cas où l’identification est correcte.
			// On enregistre la session ‘identifié’ avec la valeur ‘OK’
			$_SESSION['identifie']='OK';
			
			// SI l'utilisateur a cliqué sur la case à cocher "se souvenir de moi" Alors 
			if(isset($_POST['cb_souvenirMoi'])){
			
			// On envoie un cookie (définir un nom, une valeur et une date d’expiration pour ce cookie) 
				$login=$_POST['login'];
				$pwd=$_POST['motPasse'];
				$dateExpi=time()+3600;
				setcookie("Login",htmlspecialchars($login),$dateExpi);
				setcookie("MotDePasse",htmlspecialchars($pwd),$dateExpi);
			} // FSI 
			
			// On redirige vers la page index.php
			header('Location:index.php');
		}
	} // SINON
	else{
		// on est arrivé sur cette page sans soumettre le formulaire d’identification 
		// SI le cookie d'identification existe Alors
		if(isset($_COOKIE['Login']) || isset($_COOKIE['MotDePasse'])){
		
		// On enregistre la session ‘identifié’ avec la valeur ‘OK’
			$_SESSION['identifie']="OK";
		
		// On "rafraichit" le cookie en le renvoyant avec une nouvelle date d’expiration 
			$login=$_POST['login'];
			$pwd=$_POST['motPasse'];
			$dateExpi=time()+7200;
			setcookie('Login',htmlspecialchars($login),$dateExpi);
			setcookie('MotDePasse',htmlspecialchars($pwd),$dateExpi);
		
		// On redirige vers la page index.php 
			header('Location:index.php');
		}else{
			// tentative frauduleuse d’accès à cette page sans passer par l’identification 
			// On redirige vers la page d’identification avec un paramètre d’erreur à afficher 
			$msgErreur='Erreur d\'identification... Recommencez';
			header('Location:formConnexion.php?msgError='.$msgErreur);
		} // FSI 
	} // FSI
?>