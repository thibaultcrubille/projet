<?php
	session_start();
	// si la session n'est pas enregistré alor on n'a pas le droit d'être dans l'espace sécurisé
	// donc le script renvoie vers le formulaire de connexion avec un message d'erreur à afficher
	if (!isset($_SESSION['identifie'])) {
		header('Location:formConnexion.php?msgErreur=Interdiction d\'acceder à l\'espace sécurisé sans identification !!!');
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
		include("connect.inc.php");
		include("./include/header.php"); 
		include("initTableaux.php");
	?>
	<div class="wrapper">
		<?php include("./include/menus.php"); ?>
		<section id="content">
			<p>Bienvenue sur mon site !</p>
			<BR/>
			<?php	
			/********************
				ConsultPrix.php	
			*********************/
				// le formulaire de choix de la tranche de prix
				echo "<h1>Consulter les produits par tranche de prix </h1>";
				echo "<BR/><BR/>";
				echo "<form method='post'>";
					echo "<fieldset>";
						echo "<legend> Produits </legend><BR/>";	
						echo "<input type='radio' name='choix' value='moins500' checked='checked'";
							// on garde la sélection effectuée précédemment
							if(isset($_POST['Afficher']) && isset($_POST['choix']) && $_POST['choix'] == "moins500") {echo "checked='checked'";}
						echo "/> Prix inférieur à 500€<BR/><BR/>";
						echo "<input type='radio' name='choix' value='plus500' ";
							if(isset($_POST['Afficher']) && isset($_POST['choix']) && $_POST['choix'] == "plus500") {echo "checked='checked'";}
						echo "/> Prix supérieur ou égal à 500€<BR/><BR/>";					
						echo "<input type='submit' name='Afficher' value='Afficher'/><BR/><BR/>";
					echo "</fieldset>";
				echo "</form>";		
								
				// le formulaire a été soumis
				if(isset($_POST['Afficher']) && isset($_POST['choix'])) {
					//  on sélectionne les produits recherchés					
					switch($_POST['choix']) { 
						case "moins500": 
							$titre="Produits de prix inférieur à 500€";
								include("connect.inc.php");
								echo "<BR/><BR/>";
								echo "<table align='center' border='2' >";
								echo "<tr><th>IdProduit</th><th>idCategorie</th><th>Nom Produit</th><th>Prix Produit</th></tr>";	
								$pdostat = $conn->query("Select idProduit,idCategorie,nomProduit,prixProduit from produits where prixProduit<500");
								while($ligne=$pdostat->fetch(PDO::FETCH_ASSOC)){
									echo "<tr><th>".$ligne['idProduit']."</th><th>".$ligne['idCategorie']."</th><th>".$ligne['nomProduit']."</th><th>".$ligne['prixProduit']."</th>\n";
								}
								echo "</table>";	
								echo "<BR/><BR/>";
							break;		
							
							case "plus500": 
								include("connect.inc.php");
								echo "<BR/><BR/>";
								echo "<table align='center' border='2' >";
								echo "<tr><th>IdProduit</th><th>idCategorie</th><th>Nom Produit</th><th>Prix Produit</th></tr>";
								$pdostat = $conn->query("Select idProduit,idCategorie,nomProduit,prixProduit from produits where prixProduit>500");
								while($ligne=$pdostat->fetch(PDO::FETCH_ASSOC)){
									echo "<tr><th>".$ligne['idProduit']."</th><th>".$ligne['idCategorie']."</th><th>".$ligne['nomProduit']."</th><th>".$ligne['prixProduit']."</th>\n";
								}
								echo "</table>";	
								echo "<BR/><BR/>";								
							break;		
					}
				}	
			?>
		</section>
		
	</div>
	<?php include("./include/footer.php"); ?>
</body>
</html>

















