<?php
require_once '../model/cl_utilisateur.php';
require_once '../manager/cl_manager.php';
#$manager = new Manager();
#$res = $manager->recupSession($_SESSION['email']);
?>

<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <title>Modifier</title>
    </head>
    <body class="bg-secondary">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-12 col-md-9">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Modifier votre compte</h1>
                                </div>
                                <hr>
                                <form class="user" action="../traitement/tr_modifier.php" method="post">
                                    <?php
                                    #foreach ($res as $value) {
                                    ?>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" name="nom" class="form-control form-control-user" placeholder="Nom" value="<?php #echo $value['nom']; ?>">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" name="prenom" class="form-control form-control-user" placeholder="Prénom" value="<?php #echo $value['prenom']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-user" placeholder="E-mail" value="<?php #echo $value['email']; ?>">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" name="mdp" class="form-control form-control-user" placeholder="Mot de passe">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" name="mdpconfirm" class="form-control form-control-user" placeholder="Confirmer">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="dateNaissance" class="form-control form-control-user" placeholder="Date de naissance" value="<?php #echo $value['dateNaissance']; ?>">
                                    </div>
                                    <div class="justify-content-center">
                                        <input class="btn btn-primary" type="submit" value="Modifier" />
                                    </div>
                                    <?php
                                    #}
                                    #var_dump($manager);
                                    ?>
                                </form>
                                <div class="text-danger form-text text-center">
<!-- PHP : Message d'erreur de modification -->
                                    <?php
                                    if (isset($_SESSION['erreur'])) {
                                      echo $_SESSION['erreur'];
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    </body>
</html>
