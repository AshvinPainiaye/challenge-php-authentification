<?php
//Check if credentials are valid

  include("mysql-crud/PDO.php");


// on teste si nos variables sont définies
if ((isset($_POST['username']) && !empty($_POST['username'])) && (isset($_POST['password']) && !empty($_POST['password']))) {

    
    // On définit un login et un mot de passe de base pour tester notre exemple. Cependant, vous pouvez très bien interroger votre base de données afin de savoir si le visiteur qui se connecte est bien membre de votre site
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

		// on la démarre :)
		session_start ();
		// on enregistre les paramètres de notre visiteur comme variables de session ($login et $pwd) (notez bien que l'on utilise pas le $ pour enregistrer ces variables)
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;

		// on redirige notre visiteur vers une page de notre section membre
		header ('location: mysql-crud/read.php');
	}
	else {
		// Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
		echo '<body onLoad="alert(\'Membre non reconnu...\')">';
		// puis on le redirige vers la page d'accueil
		echo '<meta http-equiv="refresh" content="0;URL=login.php">';
	}
}
else {
    echo '<body onLoad="alert(\'Veuillez renseigner vos information\')">';
    echo '<meta http-equiv="refresh" content="0;URL=login.php">';
}
    
    


?>