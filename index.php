<?php
require_once 'model/cl_utilisateur.php';
require_once 'manager/cl_manager.php';
?>
<!doctype html>
<html lang="en">
    <!-- Header -->
    <?php include('include/header.php'); ?>
    <title>Index</title>
    <!-- Fin Header -->
    <body class="bg-secondary">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-10 col-md-8">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <div class="col-lg-12 p-3 text-center">
                                <h1 class="h4 text-gray-500 mb-4">Bienvenue dans la<br>Médiathèque Anne Franck !</h1>
                                <hr>
                                <div class="row p-3">
                                    <div class="col-6" data-toggle="modal" data-target="#connexion" href="#connexion">
                                        <a class="btn btn-primary btn-user btn-block">Se connecter</a>
                                    </div>
                                    <div class="col-6" data-toggle="modal" data-target="#inscription" href="#inscription">
                                        <a class="btn btn-primary btn-user btn-block">S'inscrire</a>
                                    </div>
                                </div>
                                <div class="text-center" data-toggle="modal" data-target="#oublie" href="#oublie">
                                    <a class="small">Mot de passe oublié ?</a>
                                </div>
<!-- PHP : Message d'erreur de connexion/inscription -->
                                <p class="text-danger m-0 form-text">
                                    <?php
                                    if (isset($_SESSION['erreur'])) {
                                      echo $_SESSION['erreur'];
                                    }
                                    ?>
                                </p>
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
                            <div class="col-lg-10 m-5">
                                <h2 class="text-uppercase" id="connexionFen">Connexion</h2>
                                <hr class="m-4">
                                <form method="post" action="traitement/tr_connexion.php">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-user" placeholder="E-mail">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="mdp" class="form-control form-control-user" placeholder="Mot de passe">
                                    </div>
                                    <div class="m-4">
                                        <input class="btn btn-primary" type="submit" value="Se connecter" />
                                    </div>
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
                            <div class="col-lg-10 m-5">
                                <h2 class="text-uppercase" id="inscriptionFen">Inscription</h2>
                                <hr class="m-4">
                                <form method="post" action="traitement/tr_inscription.php">
                                    <div class="form-group">
                                        <input type="text" name="nom" class="form-control form-control-user" placeholder="Nom">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="prenom" class="form-control form-control-user" placeholder="Prénom">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-user" placeholder="E-mail">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" name="mdp" class="form-control form-control-user" placeholder="Mot de passe">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" name="mdpconfirm" class="form-control form-control-user" placeholder="Confirmer">
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <input class="btn btn-primary" type="submit" value="S'inscrire" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Fenêtre mot de passe oublié -->
        <div class="modal fade" id="oublie" tabindex="-1" aria-labelledby="oublieFen" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="text-center container">
                        <div class="row justify-content-center">
                            <div class="col-lg-10 m-5">
                                <h2 class="text-uppercase" id="oublieFen">Mot de passe oublié ?</h2>
                                <p>Saisissez votre e-mail pour mettre un nouveau mot de passe.</p>
                                <hr class="m-4">
                                <form method="post" action="traitement/tr_oublie.php">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-user" placeholder="E-mail">
                                    </div>
                                    <div class="mt-4">
                                        <input class="btn btn-primary" type="submit" value="Envoyer" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <?php include('include/footer.php'); ?>
        <!-- Fin Footer -->
        <!-- JS -->
        <?php include('include/javascript.php'); ?>
        <!-- Fin JS -->
    </body>
</html>
