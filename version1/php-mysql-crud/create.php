<?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
session_start ();
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <title>Ajouter une randonnée</title>
        <!-- Material Design fonts -->
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700">
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">

        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="../app/public/libs/bootstrap/dist/css/bootstrap.min.css">
        <!-- Bootstrap Material Desig../n -->
        <link href="../app/public/libs/bootstrap/dist/css/bootstrap-material-design.css" rel="stylesheet">
        <link href="../app/public/libs/bootstrap/dist/css/ripples.min.css" rel="stylesheet">
    </head>

    <body>
      <!--objet-->
      <?php
include '../formulaire/form.php';
      $form = new Form;
       ?>
      <!--/objet-->

        <?php
include("../PDO.php");

// On récupère nos variables de session
if (isset($_SESSION['username']) && isset($_SESSION['password'])) {

    echo '<p class="text-center" style="margin: 10px auto 0 auto">Vous etes connecter sous le pseudo : '.$_SESSION['username'].' | <a href="../logout.php">déconnexion</a></p>';
	echo '<br />';


if(isset($_POST['button'])){
    $name = $_POST['name'];
    $difficulty = $_POST['difficulty'];
    $distance = $_POST['distance'];
    $duration = $_POST['duration'];
    $height_difference = $_POST['height_difference'];
    $available = $_POST['available'];



   $req = $bdd->prepare('INSERT INTO hiking(name, difficulty, distance, duration, height_difference, available) VALUES(:name, :difficulty, :distance, :duration, :height_difference, :available)');

   $state = $req->execute(array(
	   'name' => $name,
	   'difficulty' => $difficulty,
	   'distance' => $distance,
	   'duration' => $duration,
	   'height_difference' => $height_difference,
        'available' => $available

	));

    if($state == true){

    echo '<p class="text-center">La randonnée a été ajoutée avec succès.</p>';
    }else{
        echo '<p class="text-center">Une erreur s\'est produit lors de l\'envoie.</p>';
    }
}

?>

            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center">
                        <div class="well">
                            <h1 style="margin-bottom:50px;">Ajouter</h1>
                            <a href="read.php " class="btn btn-primary">Voir liste des randonnée</a>

                            <?php  $form->startForm('','post'); ?>
                                    <?php  $form->input('label-floating','name','text'); ?>

                                    <?php  $form->difficulty('','difficulty','très facile','facile','moyen','difficile','très difficile'); ?>

                                    <?php  $form->input('label-floating','distance','text'); ?>

                                    <?php  $form->input('label-floating','duration','time'); ?>

                                    <?php  $form->input('label-floating','height_difference','text'); ?>

                                    <?php  $form->select2('','available','Ouvert','Fermer'); ?>

                                    <?php  $form->boutonEnvoie('text-center','Envoyer'); ?>
                            <?php  $form->endForm() ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php
}
else {
	echo '<p class="text-center" style="margin-top:20px;">Vous n\'etes pas connecter <br> <a href="../login.php"class="btn btn-primary">Se connecter</a></p>';
}

?>



                <script src="../app/public/libs/jquery/dist/jquery.min.js"></script>
                <script src="../app/public/libs/bootstrap/dist/js/bootstrap.min.js"></script>

                <!-- Material Design for Bootstrap -->
                <script src="../app/public/libs/jquery/dist/material.js"></script>
                <script src="../app/public/libs/jquery/dist/ripples.min.js"></script>
                <script>
                    $.material.init();
                </script>

    </body>

    </html>
