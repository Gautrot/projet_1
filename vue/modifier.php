<?php
require_once '../model/cl_utilisateur.php';
require_once '../manager/cl_manager.php';
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
                                <form class="user" action="../traitement/tr_modifier.php">
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" name="nom" class="form-control form-control-user" id="exampleInputPassword" placeholder="Nom">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" name="prenom" class="form-control form-control-user" id="exampleInputPassword" placeholder="Prénom">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="mail" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="E-mail">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" name="mdp" class="form-control form-control-user" id="exampleInputPassword" placeholder="Mot de passe">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" name="mdpconfirm" class="form-control form-control-user" id="exampleInputPassword" placeholder="Confirmer">
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Date de naissance</h1>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                            <input type="text" name="date_jour" class="form-control form-control-user" id="exampleInputPassword" placeholder="Jour">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" name="date_mois" class="form-control form-control-user" id="exampleInputPassword" placeholder="Mois">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" name="date_annee" class="form-control form-control-user" id="exampleInputPassword" placeholder="Année">
                                        </div>
                                    </div>
                                    <div class="justify-content-center">
                                        <input class="btn btn-primary" type="submit" value="Modifier" />
                                    </div>
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

<!--
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>../vue/modifier.php</title>
    </head>
    <body>
        <form action="../traitement/tr_modifier.php" method="post">
          <table>
              <th>Nom
              <th>Mot de passe
              <th>Email
              <tr>
              <?php/*
              $manager = new Manager();
              $valeur = $manager->recupSession($_SESSION['login']);
              echo '<td><input type="text" name="login" value="' .$valeur['login']. '"/>
                    <td><input type="text" name="password" value="' .$valeur['password']. '"/>
                    <td><input type="text" name="email" value="' .$valeur['email']. '"/>';
                    */
              ?>
            </table>
            <input type="submit" value="Valider" />
        </form>
    </body>
</html>
-->
