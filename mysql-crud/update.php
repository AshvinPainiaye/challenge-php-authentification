<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Modifié une randonnée</title>
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
             
include("PDO.php");
        
    
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
session_start ();

// On récupère nos variables de session
if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
	
	echo '<p class="text-center" style="margin: 10px auto 0 auto">Vous etes connecter sous le pseudo : '.$_SESSION['username'].' | <a href="../logout.php">Déconnection</a></p>';
	echo '<br />';
    
    $id = $_GET['id'];
    $name = NULL;
    $distance = NULL;
    $duration = NULL;
    $height_difference = NULL;
    $available = NULL;

    
$reponse = $bdd->query('SELECT * FROM hiking WHERE id = "'.$id.'" ');

        while ($donnees = $reponse->fetch()){

        $name = $donnees['name'];
        $difficulty = $donnees['difficulty'];
        $distance = $donnees['distance'];
        $duration = $donnees['duration'];
        $height_difference = $donnees['height_difference'];
        $available = $donnees['available'];
        }    
    
?>

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="well">
                        <h1 style="margin-bottom:50px;">Modifié une randonnée</h1>
                        <a href="read.php " class="btn btn-primary">Voir liste des randonnée</a>

                        <form action="" method="post" class="text-left">
                            <div class="form-group label-static">
                                <label for="name" class="control-label">Name</label>
                                <input type="text" name="name" class="form-control" value=" <?php echo $name; ?>">
                            </div>

                            <div class="form-group">
                                <label for="difficulty" class="control-label">Difficulté</label>
                                <select name="difficulty" class="form-control">
                                    <?php   
                if($difficulty == 'très facile'){
                   echo '<option value="très facile" selected="selected">Très facile</option>';
                    } 
                else{
                    echo '<option value="très facile">Très facile</option>';
                    }     
                    
                    if($difficulty == 'facile'){
                   echo '<option value="facile" selected="selected">facile</option>';
                    } 
                else{
                    echo '<option value="facile">facile</option>';
                    }   
                    
                if($difficulty == 'moyen'){
                   echo '<option value="moyen" selected="selected">moyen</option>';
                    } 
                else{
                    echo '<option value="moyen">moyen</option>';
                    }
                    
                if($difficulty == 'difficile'){
                   echo '<option value="difficile" selected="selected">difficile</option>';
                    } 
                else{
                    echo '<option value="difficile">difficile</option>';
                    } 
                    
                if($difficulty == 'très difficile'){
                   echo '<option value="très difficile" selected="selected">très difficile</option>';
                    } 
                else{
                    echo '<option value="très difficile">très difficile</option>';
                    } 
                    
            ?>

                                </select>
                            </div>

                            <div class="form-group label-static">
                                <label for="distance" class="control-label">Distance</label>
                                <input type="number" min="0" name="distance" class="form-control" value=" <?php echo $distance; ?>">
                            </div>

                            <div class="form-group label-static">
                                <label for="duration" class="control-label">Durée</label>
                                <input type="time" name="duration" class="form-control" value=" <?php echo $duration; ?> ">
                            </div>

                            <div class="form-group label-static">
                                <label for="height_difference" class="control-label">Dénivelé</label>
                                <input type="number" min="0" name="height_difference" class="form-control" value=" <?php echo $height_difference; ?> ">
                            </div>
                            <div class="form-group label-static">
                                <label for="available" class="control-label">Available</label>
                                <input type="text" name="available" class="form-control" value=" <?php echo $available; ?> ">
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary" name="button">Envoyer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>





        <?php
  
if(isset($_POST['button'])){
    $name = $_POST['name'];
    $difficulty = $_POST['difficulty'];
    $distance = $_POST['distance'];
    $duration = $_POST['duration'];
    $height_difference = $_POST['height_difference'];
    $available = $_POST['available'];


   $req = $bdd->prepare('UPDATE hiking SET name = :name, difficulty = :difficulty, distance = :distance, duration = :duration, height_difference = :height_difference, available = :available WHERE id = "'.$id.'" ');
    
    $req->execute(array(
	   'name' => $name,
	   'difficulty' => $difficulty,
	   'distance' => $distance,
	   'duration' => $duration,
	   'height_difference' => $height_difference,
        'available' => $available
	));   
}  
        
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