<?php
require_once 'model/cl_utilisateur.php';
require_once 'manager/cl_manager.php';
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
        <title>Index</title>
    </head>
    <body style="background-size: cover; background-image: url('https://upload.wikimedia.org/wikipedia/commons/b/b2/M%C3%A9diath%C3%A8que_Anne_Franck_%C3%A0_Dugny.jpg')">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-10 col-md-8">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <div class="col-lg-12 p-3 text-center">
                                <h1 class="h4 text-gray-500 mb-4">Bienvenue dans la<br>Médiathèque Anne Franck !</h1>
                                <hr>
                                <div class="form-group row p-3">
                                    <div class="col-sm-6" data-toggle="modal" data-target="#connexion" href="#connexion">
                                        <a class="btn btn-primary btn-user btn-block">Se connecter</a>
                                    </div>
                                    <div class="col-sm-6" data-toggle="modal" data-target="#inscription" href="#inscription">
                                        <a class="btn btn-primary btn-user btn-block">S'inscrire</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Fenêtre connexion -->
        <div class="modal fade" id="connexion" tabindex="-1" aria-labelledby="connexionFen" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="text-center container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 m-5">
                                <h2 class="text-uppercase" id="connexionFen">Connexion</h2>
                                <hr class="m-4">
                                <form method="post" action="traitement/tr_connexion.php">
                                    <div class="m-2">
                                        <input type="email" name="mail" placeholder="E-mail" />
                                    </div>
                                    <div class="m-2">
                                        <input type="password" name="mdp" placeholder="Mot de passe" />
                                    </div>
                                    <div class="m-4">
                                        <input class="btn btn-primary" type="submit" value="Se connecter" />
                                    </div>
                                    <p class="form-text text-muted text-danger">
                                        <!-- PHP : Connexion -->
                                        <?php
                                        if (isset($_SESSION['erreur'])) {
                                          echo $_SESSION['erreur'];
                                        }
                                        ?>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Fenêtre inscription -->
        <div class="modal fade" id="inscription" tabindex="-1" aria-labelledby="inscriptionFen" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="text-center container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 m-5">
                                <h2 class="text-uppercase" id="inscriptionFen">Inscription</h2>
                                <hr class="m-4">
                                <form method="post" action="traitement/tr_inscription.php">
                                    <div class="m-2">
                                        <input type="text" name="nom" placeholder="Nom" />
                                    </div>
                                    <div class="m-2">
                                        <input type="text" name="prenom" placeholder="Prénom" />
                                    </div>
                                    <div class="m-2">
                                        <input type="email" name="mail" placeholder="E-mail" />
                                    </div>
                                    <div class="m-2">
                                        <input type="password" name="mdp" placeholder="Mot de passe" />
                                    </div>
                                    <div class="mt-4">
                                        <input class="btn btn-primary" type="submit" value="S'inscrire" />
                                    </div>
                                    <p class="form-text text-muted text-danger">
                                        <!-- PHP : Inscription -->
                                        <?php
                                        if (isset($_SESSION['erreur'])) {
                                          echo $_SESSION['erreur'];
                                        }
                                        ?>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
