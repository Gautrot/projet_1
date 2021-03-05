<?php
require_once '../model/cl_utilisateur.php';
require_once '../manager/cl_manager.php';

$liste = new Manager();
$res = $liste->listUtilisateur();
?>

<!-- HTML -->
<!doctype html>
<html lang="en">
    <!-- Header -->
    <?php include('../include/header.php'); ?>
    <title>Tableau des utilisateurs</title>
    <!-- Fin Header -->
    <body class="bg-dark">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Contenu -->
            <div id="content">
                <!-- Navbar -->
                <?php include('../include/navbar.php'); ?>
                <!-- Fin Navbar -->
                <!-- Tableau -->
                <div class="card shadow">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Liste d'utilisateurs</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Date de naissance</th>
                                        <th>Email</th>
                                        <th>Mot de passe</th>
                                        <th>Rang</th>
                                        <th style="width:50px">Selectionner</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form method="post" action="../traitement/tr_suppr_admin.php">
                                        <?php
                                        foreach ($res as $value) {
                                        ?>
                                        <tr>
                                            <td name="<?php echo $value['id']; ?>"><?php echo $value['id']; ?></td>
                                            <td name="<?php echo $value['nom']; ?>"><?php echo $value['nom']; ?></td>
                                            <td name="<?php echo $value['prenom']; ?>"><?php echo $value['prenom']; ?></td>
                                            <td name="<?php echo $value['datenaissance']; ?>"><?php echo $value['datenaissance']; ?></td>
                                            <td name="<?php echo $value['email']; ?>"><?php echo $value['email']; ?></td>
                                            <td name="<?php echo $value['mdp']; ?>"><?php echo $value['mdp']; ?></td>
                                            <td name="<?php echo $value['rang']; ?>"><?php echo $value['rang']; ?></td>
                                            <td><input class="btn btn-primary" type="submit" value="Supprimer" /></td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </form>
                                    <form method="post" action="../traitement/tr_inscr_admin.php">
                                        <tr>
                                            <td></td>
                                            <td><input type="text" name="nom" placeholder="Nom"></td>
                                            <td><input type="text" name="prenom" placeholder="Prénom"></td>
                                            <td><input type="text" name="datenaissance" placeholder="Date de naissance"></td>
                                            <td><input type="email" name="email" placeholder="E-mail"></td>
                                              <td><input type="password" name="mdp" placeholder="Mot de passe"></td>
                                            <td>
                                                <select name="rang">
                                                    <option name="USR" value="USR">USR</option>
                                                    <option name="ADM" value="ADM">ADM</option>
                                                </select>
                                            </td>
                                            <td><input class="btn btn-primary" type="submit" value="Ajouter" /></td>
                                        </tr>
                                    </form>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <p class="text-danger form-text text-center">
                        <?php
                        if (isset($_SESSION['erreur'])) {
                          echo $_SESSION['erreur'];
                        }
                        ?>
                    </p>
                <!-- Fin Tableau -->
                </div>
            <!-- Footer -->
            <?php include('../include/footer.php'); ?>
            <!-- Fin Footer -->
            </div>
        </div>
        <!-- Fin Content Wrapper -->
        <!-- JS -->
        <?php include('../include/javascript.php'); ?>
        <!-- Fin JS -->
    </body>
</html>
