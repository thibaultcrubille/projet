<?php
	session_start();
	// Si la session n'est pas enregistré alors on ne peut pas accéder dans l'espace sécurisé
	// donc nous sommes dirigés vers le formulaire de connexion avec un message d'erreur à afficher
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
  		include("./include/header.php"); 
  		include("initTableaux.php");
  	?>
  	<div class="wrapper">
  		<?php include("./include/menus.php"); ?>
  		<section id="content">
  			<p>Bienvenue dans l'espace sécurisé du site !</p>
  			<BR/>
        
        <?php if(isset($_SESSION['identifie'])){ ?>
        
        <p>On affiche la session :</p>
			  <?php var_dump($_SESSION['identifie']);?>
        <br/><br/>
        
        <p>On affiche le possible cookie : </p>
        <?php var_dump($_COOKIE['PHPSESSID']); } ?>
				<br/>
        
        <?php 
          if (isset($_COOKIE['PHPSESSID'])&& isset($_COOKIE['login'])){
				  var_dump($_COOKIE['login']);
				  } 
        ?>
        
  		</section>
  	</div>
  	<?php include("./include/footer.php"); ?>
  </body>
</html>