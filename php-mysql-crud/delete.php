<?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
session_start ();
/**** Supprimer une randonnée ****/
include("../PDO.php");

// On récupère nos variables de session
if (isset($_SESSION['username']) && isset($_SESSION['password'])) {

	echo 'Vous etes connecter sous le pseudo : '.$_SESSION['username'];
	echo '<br />';

	// On affiche un lien pour fermer notre session
	echo '<a href="../logout.php">Déconnection</a> <br /><br />';


     $id = $_GET['id'];

    $req = $bdd->prepare('DELETE FROM hiking  WHERE id = ? ');

    $req->execute(array(
$id
    ));





}
else {
	echo 'Vous n\'etes pas connecter';
}

header('Location: read.php');
exit;


?>
