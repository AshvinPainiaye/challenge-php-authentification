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

    <div class="container">
        <div class="well" style="margin-top:50px;">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center" style="margin-bottom:50px;">Liste des randonnées</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="bs-component text-center">
                        <?php
             
                        include("PDO.php");
        
                        $reponse = $bdd->query('SELECT * FROM hiking'); 
        
                        ?>
                            <table class="table table-striped table-hover text-left">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Distance</th>
                                        <th>Difficulté</th>
                                        <th>Durée</th>
                                        <th>Dénivelé</th>
                                        <th>Available</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <?php
                                    while ($donnees = $reponse->fetch()){
                                        
                                    echo '<tr>';
                                    echo '<td>'.'<a href="update.php?id='.$donnees['id'].'">'.$donnees['name'].'</a></td>';  echo '<td>'.$donnees['distance'].'</td>';    
                                    echo '<td>'.$donnees['difficulty'].'</td>';       
                                    echo '<td>'.$donnees['duration'].'</td>';
                                    echo '<td>'.$donnees['height_difference'].'</td>';
                                    echo '<td>'.$donnees['available'].'</td>';
                                    echo '<td><a href="delete.php?id='.$donnees['id'].'">Supprimer</a></td>';
                                    echo '</tr>';
                                    }
                                    $reponse->closeCursor();
                                ?>

                                </tbody>
                            </table>

                            <a href="create.php" class="btn btn-primary">Ajouter une randonnée</a>
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