<?php

include("php-mysql-crud/PDO.php");

// on teste si nos variables sont définies
if ((isset($_POST['username']) && !empty($_POST['username'])) && (isset($_POST['password']) && !empty($_POST['password']))) {

$login_valide = NULL;
$pwd_valide = NULL;
$username = $_POST['username'];
$password = sha1($_POST['password']);

$req = $bdd->prepare('SELECT * FROM user WHERE username = ? AND password <= ?');

$req-> execute(array(
    $username,
    $password
));

while ($donnees = $req->fetch())
{
    $login_valide = $donnees['username'];
    $pwd_valide = $donnees['password'];
}
    
$req->closeCursor();
    
	// on vérifie les informations du formulaire, à savoir si le pseudo saisi est bien un pseudo autorisé, de même pour le mot de passe
	if ($login_valide == $username && $pwd_valide == $password) {
		// dans ce cas, tout est ok, on peut démarrer notre session

		session_start ();
		// on enregistre les paramètres de notre visiteur comme variables de session ($username et $password) (notez bien que l'on utilise pas le $ pour enregistrer ces variables)
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;

		// on redirige notre membre vers la page read
		header ('location: php-mysql-crud/read.php');
	}
	else {
		// Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
		echo '<body onLoad="alert(\'Membre non reconnu...\')">';
		// puis on le redirige vers la page de login
		echo '<meta http-equiv="refresh" content="0;URL=login.php">';
	}
}
else {
    echo '<body onLoad="alert(\'Veuillez renseigner vos information\')">';
    echo '<meta http-equiv="refresh" content="0;URL=login.php">';
}
    
    


?>