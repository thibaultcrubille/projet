<nav class="sidebar">
  <ul>
    <li><a href="index.php">Accueil</a></li>
    <li><a href="consultCategorie.php">Consultation par catégorie</a></li>
	<li><a href="ajoutCategorie.php">Ajouter une catégorie</a></li>
    <li><a href="consultPrix.php">Consultation par tranche de prix</a></li>
    <li><a href="deconnexion.php">Deconnexion (suppression de la session)</a></li>
	<?php
	// si le cookie est présent alors on affiche un hyperlien pour aller vers la page DetruireCookie.php
	// Rappel : pour détruire un cookie, il faut le renvoyer avec une date d'expiration "dans le passé"
	
	if(isset($_COOKIE['Login']) || isset($_COOKIE['MotDePasse'])){
		echo '<li><a href="DetruireCookie.php">Détruire le cookie</a></li>';
	}
	?>
	
  </ul>
</nav>
