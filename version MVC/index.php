<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>MVC</title>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="app/public/libs/bootstrap/dist/css/bootstrap.min.css">
    <!-- Bootstrap Material Desig../n -->
    <link href="app/public/libs/bootstrap/dist/css/bootstrap-material-design.css" rel="stylesheet">
    <link href="app/public/libs/bootstrap/dist/css/ripples.min.css" rel="stylesheet">
  </head>
  <body>

<?php
    include 'models/Hiking.php';
    include 'controllers/HikingController.php';

    $defaultController = 'HikingController';

    //On récupère le controller demandé dans l'url, si celui n'est pas passé dans l'url on utilise un controller par défaut
    $controllerAsked = empty($_GET['controller']) ? $defaultController : $_GET['controller'];
    $actionAsked = empty($_GET['action']) ? '' : $_GET['action'];
    $id = empty($_GET['id']) ? '' : $_GET['id'];

    //On regarde si le controller existe, on fait une concatenation car la variable passée dans l'url est Hiking, non HikingController.
    if (class_exists($controllerAsked.'Controller')) {
      $controllerName = $controllerAsked.'Controller';
    }else{
      //On met un controller par défaut au cas où ce n'est pas spécifié dans l'url
      $controllerName = $defaultController;
    }
    //On créé l'objet controller à partir du nom contenu dans la varibale $controllerName
    $controller = new $controllerName();
    //On teste si l'action est bien une méthode du controller
    //Si l'action n'existe pas on lance une exeception
    if (!method_exists($controller, $actionAsked)) {
        throw new Exception("Error : action : {$actionAsked} doesn't exist for the controller {$controllerName}");
    }
    //Dispatch l'action vers le bon controller
    $controller->$actionAsked($id);

?>

    <script src="app/public/libs/jquery/dist/jquery.min.js"></script>
    <script src="app/public/libs/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Material Design for Bootstrap -->
    <script src="app/public/libs/jquery/dist/material.js"></script>
    <script src="app/public/libs/jquery/dist/ripples.min.js"></script>
    <script>
        $.material.init();
    </script>

</body>

</html>
