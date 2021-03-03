<?php
require_once '../model/cl_utilisateur.php';
require_once '../manager/cl_manager.php';
?>

<html lang="en">
    <!-- Header -->
    <?php include('../include/header.php'); ?>
    <title>Modifier</title>
    <!-- Fin Header -->
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
                                        <input type="text" name="datenaissance" class="form-control form-control-user" placeholder="Date de naissance" value="<?php #echo $value['datenaissance']; ?>">
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
        <?php include('../include/javascript.php'); ?>
        <!-- Fin JS -->
    </body>
</html>
