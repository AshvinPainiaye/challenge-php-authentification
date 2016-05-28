<?php
session_start ();
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <title>Randonnées</title>
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
        <?php
      if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    echo '<p class="text-center" style="margin: 10px auto 0 auto">Vous etes connecter sous le pseudo : '.$_SESSION['username'].' | <a href="../logout.php">déconnexion</a></p>';
	echo '<br />';
      }
    else{
        echo '<p class="text-center" style="margin: 10px auto 0 auto">Vous n\'etes pas connecter | <a href="../logout.php">Connexion</a><br /><br />';
    }
    ?>
            <div class="container">
                <div class="well">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="text-center" style="margin-bottom:50px;">Liste des randonnées</h1>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="bs-component text-center">
                                <?php

                        include("../PDO.php");

                        $req = $bdd->query('SELECT * FROM hiking');

                        ?>
                                    <table class="table table-striped table-hover text-left table-responsive">
                                        <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Distance</th>
                                                <th>Difficulté</th>
                                                <th>Durée</th>
                                                <th>Dénivelé</th>
                                                <th>Available</th>
                                                <?php if (isset($_SESSION['username']) && isset($_SESSION['password'])) { ?>
                                                    <th></th>
                                                    <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php
                                    while ($donnees = $req->fetch()){

                                    echo '<tr>';
                                    echo '<td>'.'<a href="update.php?id='.$donnees['id'].'">'.$donnees['name'].'</a></td>';  echo '<td>'.$donnees['distance'].'</td>';
                                    echo '<td>'.$donnees['difficulty'].'</td>';
                                    echo '<td>'.$donnees['duration'].'</td>';
                                    echo '<td>'.$donnees['height_difference'].'</td>';
                                    echo '<td>'.$donnees['available'].'</td>';
                                    if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
                                    echo '<td><a href="delete.php?id='.$donnees['id'].'">Supprimer</a></td>';}
                                    echo '</tr>';
                                    }
                                    $req->closeCursor();
                                ?>

                                        </tbody>
                                    </table>
                                    <?php if (isset($_SESSION['username']) && isset($_SESSION['password'])) { ?>
                                        <a href="create.php" class="btn btn-primary">Ajouter une randonnée</a>
                                        <?php    } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




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
