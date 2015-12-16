<?php
	session_start();
	// si la session n'est pas enregistré alor on n'a pas le droit d'être dans l'espace sécurisé
	// donc le script renvoie vers le formulaire de connexion avec un message d'erreur à afficher
	if(!isset($_SESSION['identifie'])){
		header('Location:formConnexion.php?msgErreur=Interdication d\'acceder à l\'espace sécurisé sans identification !!!');
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
		include("./include/header.php");
		include("initTableaux.php");
	?>
	<div class="wrapper">
		<?php include("./include/menus.php"); ?>
		<section id="content">
			<p>Bienvenue sur mon site !</p>
			<BR/>
			<?php	

				// le formulaire de saisie de la catégorie recherchée
				echo "<h1>Consulter les produits par catégorie </h1>";
				echo "<BR/><BR/>";
				echo "<form method='post'>";
					echo "<fieldset>";
						echo "<legend> Catégories </legend><BR/>";	
						echo "<select name='categories'>";
						foreach($tabCat as $idCat => $nomCat) {
							echo "<option value='".$idCat."'>".$nomCat."</option>";
						}		
						echo "</select><br/><br/>";			
						echo "<input type='submit' name='Afficher' value='Afficher'/>";
						echo "<br/><br/>";
					echo "</fieldset>";
				echo "</form>";		
				
			
				// le formulaire a été soumis
				if(isset($_POST['Afficher']) && isset($_POST['categories'])) {	
					// on affiche le tableau des résultats
					echo "<BR/><BR/>";
					echo "<table align='center' border='2' >";
						switch($_POST['categories']) {
							case 100:
								include("connect.inc.php");
									$req=$conn->prepare("Select * from produits where idCategorie= ?");
									$req->execute(array('100'));
								echo "<BR/><BR/>";
										echo "<table align='center' border='2' >";
										echo "<tr><th>IdProduit</th><th>idCategorie</th><th>Nom Produit</th><th>Prix Produit</th></tr>";
								foreach($req as $valeur){
								
									echo "<tr><th>".$valeur['idProduit']."</th><th>".$valeur['idCategorie']."</th><th>".$valeur['nomProduit']."</th><th>".$valeur['prixProduit']."</th>\n";
								
								}
							break;
								
							case 200:
								include("connect.inc.php");
								$req=$conn->prepare("Select * from produits where idCategorie= ?");
								$req->execute(array('200'));
								echo "<BR/><BR/>";
										echo "<table align='center' border='2' >";
										echo "<tr><th>IdProduit</th><th>idCategorie</th><th>Nom Produit</th><th>Prix Produit</th></tr>";
								foreach($req as $valeur){
								
									echo "<tr><th>".$valeur['idProduit']."</th><th>".$valeur['idCategorie']."</th><th>".$valeur['nomProduit']."</th><th>".$valeur['prixProduit']."</th>\n";
								
								}
							break;
								
							
							case 300:
								include("connect.inc.php");
								$req=$conn->prepare("Select * from produits where idCategorie= ?");
								$req->execute(array('300'));
								
								echo "<BR/><BR/>";
										echo "<table align='center' border='2' >";
										echo "<tr><th>IdProduit</th><th>idCategorie</th><th>Nom Produit</th><th>Prix Produit</th></tr>";
								foreach($req as $valeur){
								
									echo "<tr><th>".$valeur['idProduit']."</th><th>".$valeur['idCategorie']."</th><th>".$valeur['nomProduit']."</th><th>".$valeur['prixProduit']."</th>\n";
								
								}
							break;
							
						}
						
					echo "</table>";	
					echo "<BR/><BR/>";	

				}				
			?>
		</section>
	</div>
	<?php include("./include/footer.php"); ?>
</body>
</html>