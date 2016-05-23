<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <!-- Material Design fonts -->
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
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="well" style="margin-top:100px;">

                    <form action="check_login.php" method="post">
                        <div class="form-group label-floating">
                            <label for="login" class="control-label">Identifiant</label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        <div class="form-group label-floating">
                            <label for="password" class="control-label">Mot de passe </label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary" name="button">Se connecter</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>




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