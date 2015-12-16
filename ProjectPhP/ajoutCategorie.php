<?php
	session_start();
	// si la session n'est pas enregistré alor on n'a pas le droit d'être dans l'espace sécurisé
	// donc le script renvoie vers le formulaire de connexion avec un message d'erreur à afficher
	if(!isset($_SESSION['identifie'])){
		header('Location:formConnexion.php?msgErreur=Interdication d\'acceder à l\'espace sécurisé sans identification !!!');
	}
	include("connect.inc.php");
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
		include("./include/header.php");
		include("initTableaux.php");
	?>
	<div class="wrapper">
		<?php include("./include/menus.php"); ?>
		<section id="content">
		<form method='post' action='ajoutCategorie.php'>
			<p>Veuillez entrer les informations de la nouvelle catégorie :</p>
			<BR/>
			<?php	
				echo "Id de la Catégorie : <input type='text' name='id' /> <BR/><BR/>";
				echo "Nom de la Catégorie : <input type='text' name='nom' /> <BR/><BR/>";	
				echo "<input type='submit' name='Envoyer' value='Valider'/> <BR/><BR/>";			
			?>
			
		</form>		
			<?php
//SI le formulaire est envoyé alors
if(isset($_POST['Envoyer'] ) && $_POST['Envoyer']=='Valider'){ //Si le formulaire est soumis.
	$erreur=0;	
	//On vérifie, avec des REGEX, que :
			if((preg_match('#^[4-9]00$#',$_POST['id'])==0)||(preg_match("#[a-z]{3,25}#i",$_POST['nom'])==0)){
					$erreur=1;
					echo "id ou nom de catégorie invalide.";
				}else{
					echo "La nouvelle catégorie : ".$_POST['nom']."(id: ".$_POST['id'].") a bien été validée.";
				}
	if($erreur==0){ // Si le formulaire est correctement rempli.
		$req=$conn->prepare("INSERT into categories values (?, ?)");
		$req->execute(array($_POST['id'],$_POST['nom']));
	}
}

?>	
		</section>	
	</div>
<?php include("./include/footer.php"); ?>
</body>
</html>









